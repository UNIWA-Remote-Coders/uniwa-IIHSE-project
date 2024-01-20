<?php

include('connection.php');

$stmt_sw = $conn->prepare("SELECT * FROM products where product_category = 'Smartwatch'");
$stmt_sw->execute();
$smartwatches = $stmt_sw->get_result();

$stmt_sp = $conn->prepare("SELECT * FROM products where product_category = 'Smartphone'");
$stmt_sp->execute();
$smartphones = $stmt_sp->get_result();

$stmt_tbl = $conn->prepare("SELECT * FROM products where product_category = 'Tablet'");
$stmt_tbl->execute();
$tablets = $stmt_tbl->get_result();

$stmt_hf = $conn->prepare("SELECT * FROM products where product_category = 'Handsfree'");
$stmt_hf->execute();
$handsfree = $stmt_hf->get_result();

?>	