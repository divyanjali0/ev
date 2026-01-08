<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Base URL for PDF / WhatsApp links
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];

// Fetch latest itineraries with latest PDF path
$itineraries = $conn->query("
    SELECT ic.id as itinerary_id, ic.reference_no, ic.full_name, ic.email,
           ich.pdf_path
    FROM itinerary_customer ic
    LEFT JOIN itinerary_customer_history ich
        ON ich.itinerary_id = ic.id
        AND ich.version_number = (
            SELECT MAX(version_number)
            FROM itinerary_customer_history
            WHERE itinerary_id = ic.id
        )
    ORDER BY ic.id DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Itinerary Requests | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<style>
    body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
    .container { max-width: 95%; }
    .dashboard-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 20px; margin-top: 40px; }
</style>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
    <div class="flex-grow-1 container mt-4">
        <div class="dashboard-card">
            <h2 class="mb-4 text-center fw-bold">Updated Itineraries</h2>
            <table class="table table-bordered table-striped" id="itineraryTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itineraries as $index => $it): ?>
                        <?php
                            $pdfLink = $it['pdf_path'] ?? '#';
                            $whatsappLink = $it['pdf_path'] 
                                ? 'https://api.whatsapp.com/send?text=' . urlencode("Check this Itinerary PDF: " . $baseUrl . '/' . $it['pdf_path'])
                                : '#';
                        ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($it['reference_no']); ?></td>
                            <td><?= htmlspecialchars($it['full_name']); ?></td>
                            <td><?= htmlspecialchars($it['email']); ?></td>
                            <td>
                                <?php if ($it['pdf_path']): ?>
                                    <a href="<?= htmlspecialchars($pdfLink) ?>" target="_blank" class="btn btn-sm btn-success mb-1">
                                        <i class="bi bi-file-earmark-pdf"></i> PDF
                                    </a>
                                    <a href="<?= htmlspecialchars($whatsappLink) ?>" target="_blank" class="btn btn-sm mb-1" style="background:#25D366;border:none;color:white;">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm view-history-btn" data-id="<?= $it['itinerary_id']; ?>">
                                    View History
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="historyModalLabel">Itinerary History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table table-bordered" id="historyTable">
              <thead>
                  <tr>
                      <th>Version</th>
                      <th>Edited By</th>
                      <th>Edit Reason</th>
                      <th>Edited At</th>
                      <th>PDF</th>
                  </tr>
              </thead>
              <tbody></tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script>
const baseUrl = '<?= $baseUrl ?>';

$(document).ready(function() {
    $('#itineraryTable').DataTable();

    $('.view-history-btn').click(function() {
        const itineraryId = $(this).data('id');
        $('#historyTable tbody').html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');

        $.ajax({
            url: 'fetch_itinerary_history.php',
            method: 'POST',
            data: { itinerary_id: itineraryId },
            dataType: 'json',
            success: function(response) {
                if (!response || response.length === 0) {
                    $('#historyTable tbody').html('<tr><td colspan="5" class="text-center">No history found</td></tr>');
                } else {
                    let rows = '';
                    response.forEach(function(item) {
                        const pdfLink = item.pdf_path ? baseUrl + '/' + item.pdf_path : '#';
                        const whatsappLink = item.pdf_path 
                            ? 'https://api.whatsapp.com/send?text=' + encodeURIComponent('Check this Itinerary PDF: ' + pdfLink)
                            : '#';

                        rows += `
                            <tr>
                                <td>${item.version_number}</td>
                                <td>${item.edited_by_name || 'N/A'}</td>
                                <td>${item.edit_reason || ''}</td>
                                <td>${item.edited_at}</td>
                                <td>
                                    <a href="${pdfLink}" target="_blank" class="btn btn-sm btn-success mb-1">
                                        <i class="bi bi-file-earmark-pdf"></i> PDF
                                    </a>
                                    <a href="${whatsappLink}" target="_blank" class="btn btn-sm mb-1" style="background:#25D366;border:none;color:white;">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                    $('#historyTable tbody').html(rows);
                }

                // Show the modal
                var historyModal = new bootstrap.Modal(document.getElementById('historyModal'));
                historyModal.show();
            },
            error: function(xhr, status, error) {
                alert('Error fetching history: ' + error);
            }
        });
    });
});
</script>



</body>
</html>
