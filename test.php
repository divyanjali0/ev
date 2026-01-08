<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

$itinerary_id = 1;
$desired_version = 2;

$sql = "SELECT full_name FROM itinerary_customer_history
        WHERE itinerary_id = :itinerary_id
          AND version_number = :version";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':itinerary_id' => $itinerary_id,
    ':version' => $desired_version
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo "Full name in version 2: " . $result['full_name'];
} else {
    echo "Version not found!";
}


$itinerary_id = 1;
$desired_version = 2; // the version you want to check

$stmt = $conn->prepare("SELECT * FROM itinerary_customer_history WHERE itinerary_id = :itinerary_id ORDER BY version_number ASC");
$stmt->execute([':itinerary_id' => $itinerary_id]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($rows); // check all versions
echo "</pre>";
