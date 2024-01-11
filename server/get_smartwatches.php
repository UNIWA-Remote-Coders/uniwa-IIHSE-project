<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products where product_category = 'Smartwatch'");
$stmt->execute();
$smartwatches = $stmt->get_result();//[]

?>