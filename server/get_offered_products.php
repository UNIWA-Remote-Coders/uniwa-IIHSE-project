<?php

    include('connection.php');

    // if offers button pressed then find all offers and make an extra column in order to sort them
    if (isset($_GET['offers_page'])) {

        $page = $_GET['offers_page'];
        $products_id = (intval($page)-1) * 16;

        $stmt = $conn->prepare("
        WITH MyCte AS 
        (
            SELECT   *,
                    ROW_NUMBER() OVER(order by product_id) AS row_num 
            FROM     products
            WHERE    product_image like '%offer%'
        )
        SELECT  *
        FROM    MyCte
        WHERE   row_num > ?
        LIMIT 16
        ");

        $stmt->bind_param('i', $products_id);
        $stmt->execute();
        $offered_products = $stmt->get_result();
    }
    // find all offers
    else {
        $stmt = $conn->prepare("SELECT * FROM products where product_image like '%offer%'");
        $stmt->execute();
        $offered_products = $stmt->get_result();
    }

?>




