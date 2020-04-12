<?php 
include 'connection.php';
include 'index_controller.php';
//dd($products);
header('Content-Type: application/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.'quarantine_stock_'.date('d-m-Y').'.csv'.'";');
ob_clean();
$fp = fopen('php://output', 'w');
//$fp = fopen('quarantine_stock_'.date('d-m-Y').'.csv', 'w');
fputcsv($fp, $fields,';');
foreach ($products as $product) {
    fputcsv($fp, $product,';');
}
fclose($fp);