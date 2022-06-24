<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: product');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include '../../config/Database.php';
include '../../models/product.php';

$database = new Database();
$db = $database->connect();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->product_id = $data->product_id;
$product->user_id = $data->user_id;

if ($product->create()) {
    echo json_encode(
        array('message' => 'Order Created')
    );
} else {
    echo json_encode(
        array('message' => 'Order Not Created')
    );
}
