<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if(!isset($_SESSION['user_id'])){
    echo json_encode(['success'=>false,'error'=>'Not logged in']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

try {
    $stmt = $conn->prepare("
        INSERT INTO costing (
            itinerary_id, agent_name, group_name, costing_by, costing_date, exchange_rate,
            entrance_fees, cost_sheet, hotel_total, explore_commission, grand_total,
            lunch_dinner, cost_per_pax, transport_json, transport_total, discount, trip_full_total
        ) VALUES (
            ?,?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?
        )
    ");
    $stmt->execute([
        $data['itinerary_id'],
        $data['agent_name'],
        $data['group_name'],
        $data['costing_by'],
        $data['costing_date'],
        $data['exchange_rate'],
        json_encode($data['entrance_fees']),
        json_encode($data['cost_sheet']),
        $data['hotel_total'],
        $data['explore_commission'],
        $data['grand_total'],
        $data['lunch_dinner'],
        $data['cost_per_pax'],
        json_encode($data['transport_json']),
        $data['transport_total'],
        $data['discount'],
        $data['trip_full_total']
    ]);

    echo json_encode(['success'=>true]);

} catch (PDOException $e){
    echo json_encode(['success'=>false, 'error'=>$e->getMessage()]);
}
