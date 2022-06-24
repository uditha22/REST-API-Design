<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include '../../config/Database.php';
include '../../models/product.php';

$database = new Database();
$db = $database->connect();

$product = new Product($db);

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

$product->read_single();

$product_arr = array(
    'name' => $product->name,
    'description' => $product->description,
    'price' => $product->price,
);

print_r(json_encode($product_arr));
