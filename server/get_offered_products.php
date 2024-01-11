<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products where product_image like '%offer%'");
$stmt->execute();
$offered_products = $stmt->get_result();//[]

?>