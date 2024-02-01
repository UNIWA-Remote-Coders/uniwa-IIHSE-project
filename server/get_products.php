<?php

    include('connection.php');

    if (isset($_GET['products_page'])) {
        $page = $_GET['products_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt_pr = $conn->prepare("SELECT * FROM products WHERE product_id > ? ORDER BY product_id LIMIT 16");
        $stmt_pr->bind_param('i', $products_id);
        $stmt_pr->execute();
        $products = $stmt_pr->get_result();
    }

    if (isset($_GET['smartwatches_page'])) {
        $page = $_GET['smartwatches_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt_sw = $conn->prepare("SELECT * FROM products where product_category = 'Smartwatch' AND product_id > ? ORDER BY product_id LIMIT 16");
        $stmt_sw->bind_param('i', $products_id);
        $stmt_sw->execute();
        $smartwatches = $stmt_sw->get_result();
    }

    if (isset($_GET['smartphones_page'])) {
        $page = $_GET['smartphones_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt_sp = $conn->prepare("SELECT * FROM products where product_category = 'Smartphone' AND product_id > ? ORDER BY product_id LIMIT 16");
//         $stmt_sp = $conn->prepare("SELECT * FROM (SELECT Row_Number() OVER (ORDER BY product_id) AS RowNum, * FROM products) t2 WHERE RowNum > ? LIMIT 16");

// WITH MyCte AS 
// (
//     SELECT   *,
//              ROW_NUMBER() OVER(order by product_id) AS row_num 
//     FROM     products
//     ORDER BY product_id
// )
// SELECT  *
// FROM    MyCte
// WHERE   row_num > 0

        $stmt_sp->bind_param('i', $products_id);
        $stmt_sp->execute();
        $smartphones = $stmt_sp->get_result();
    }

    if (isset($_GET['tablets_page'])) {
        $page = $_GET['tablets_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt_tbl = $conn->prepare("SELECT * FROM products where product_category = 'Tablet' AND product_id > ? ORDER BY product_id LIMIT 16");
        $stmt_tbl->bind_param('i', $products_id);
        $stmt_tbl->execute();
        $tablets = $stmt_tbl->get_result();
    }

    if (isset($_GET['handsfree_page'])) {
        $page = $_GET['handsfree_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt_hf = $conn->prepare("SELECT * FROM products where product_category = 'Handsfree' AND product_id > ? ORDER BY product_id LIMIT 16");
        $stmt_hf->bind_param('i', $products_id);
        $stmt_hf->execute();
        $handsfree = $stmt_hf->get_result();
    }

?>	