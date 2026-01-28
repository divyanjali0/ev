<?php
header('Content-Type: application/json');
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success'=>false, 'error'=>'Invalid JSON']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT MAX(version) as max_version FROM costing WHERE itinerary_id = ?");
    $stmt->execute([$data['itinerary_id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $newVersion = ($row['max_version'] ?? 0) + 1;

    $stmt = $conn->prepare("
        INSERT INTO costing (
            itinerary_id, version, agent_name, group_name, costing_by, costing_date, exchange_rate,
            entrance_fees, cost_sheet, hotel_total, explore_commission, grand_total,
            lunch_dinner, cost_per_pax, transport_json, transport_total, discount, trip_full_total
        ) VALUES (
            ?,?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?
        )
    ");

    $stmt->execute([
        $data['itinerary_id'],
        $newVersion,
        $data['agent_name'] ?? '',
        $data['group_name'] ?? '',
        $data['costing_by'] ?? '',
        $data['costing_date'] ?? '',
        $data['exchange_rate'] ?? 1,
        json_encode($data['entrance_fees'] ?? []),
        json_encode($data['cost_sheet'] ?? []),
        $data['hotel_total'] ?? 0,
        $data['explore_commission'] ?? 0,
        $data['grand_total'] ?? 0,
        $data['lunch_dinner'] ?? 0,
        $data['cost_per_pax'] ?? 0,
        json_encode($data['transport_json'] ?? []),
        $data['transport_total'] ?? 0,
        $data['discount'] ?? 0,
        $data['trip_full_total'] ?? 0
    ]);

    echo json_encode(['success'=>true,'version'=>$newVersion]);

} catch(PDOException $e) {
    echo json_encode(['success'=>false,'error'=>$e->getMessage()]);
}
