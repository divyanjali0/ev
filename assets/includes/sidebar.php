<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white">
    <?php if (isset($_SESSION['user_name'])): ?>
        <div class="text-white mb-4 ps-1">
            <i class="bi bi-person-circle me-2"></i>
            Welcome, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
        </div>
    <?php endif; ?>

    <a href="./dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="assets/images/sidebar.png" alt="Logo" style="width: 200px;">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="./dashboard.php" class="nav-link text-white <?= $currentPage === 'dashboard.php' ? 'active' : '' ?>" aria-current="page">
                <i class="bi-journal-check me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="./itenary-request.php" class="nav-link text-white <?= $currentPage === 'itenary-request.php' ? 'active' : '' ?>" aria-current="page">
                <i class="bi bi-calendar-check me-2"></i> Itenaries
            </a>
        </li>
        <li class="nav-item">
            <a href="./revised-itenary.php" class="nav-link text-white <?= $currentPage === 'revised-itenary.php' ? 'active' : '' ?>" aria-current="page">
                <i class="bi bi-calendar-check me-2"></i> Revised Itenary
            </a>
        </li>
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <li>
                <a href="./users.php" class="nav-link text-white <?= $currentPage === 'users.php' ? 'active' : '' ?>">
                    <i class="bi bi-people me-2"></i> Users
                </a>
            </li>
        <?php endif; ?>
    </ul>
    <hr>
    <div class="mt-auto">
        <a href="./logout.php" class="nav-link text-white">
            <i class="bi bi-box-arrow-right me-4"></i> Logout
        </a>
    </div>
</div>
