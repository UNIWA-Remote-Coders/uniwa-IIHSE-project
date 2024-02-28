<?php

include('connection.php');

// get 4 products from the db
$stmt = $conn->prepare("SELECT * FROM products LIMIT 4");
$stmt->execute();
$featured_products = $stmt->get_result();

?>