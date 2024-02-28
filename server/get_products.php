<?php

    include('connection.php');
    
    // products button is pressed
    if (isset($_GET['products_page'])) {
        
        // it uses this search query at home page buttons
        if (isset($_GET['search'])) {
            $products_name = "%". $_GET['search'] . "%";
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_name like ?");
            $stmt->bind_param('s', $products_name);
            $stmt->execute();
            $products = $stmt->get_result();

        }
        // find 20 products each time depending on number of page (GET method)
        else {
            $page = $_GET['products_page'];
            $products_id = (intval($page)-1) * 20;

            $stmt_pr = $conn->prepare("SELECT * FROM products WHERE product_id > ? ORDER BY product_id LIMIT 20");
            $stmt_pr->bind_param('i', $products_id);
            $stmt_pr->execute();
            $products = $stmt_pr->get_result();
        }
    }

    // category button is pressed
    if (isset($_GET['smartwatches_page']) || isset($_GET['smartphones_page']) || isset($_GET['tablets_page']) || isset($_GET['handsfree_page'])) {

        // fing category and number of page with get method    
        if (isset($_GET['smartwatches_page'])) {
            $page = $_GET['smartwatches_page'];
            $products_id = (intval($page)-1) * 12;
            $category = 'Smartwatch';
        }
        else if (isset($_GET['smartphones_page'])) {
            $page = $_GET['smartphones_page'];
            $products_id = (intval($page)-1) * 12;
            $category = 'Smartphone';
        }
        else if (isset($_GET['tablets_page'])) {
            $page = $_GET['tablets_page'];
            $products_id = (intval($page)-1) * 12;
            $category = 'Tablet';
        }
        else {
            $page = $_GET['handsfree_page'];
            $products_id = (intval($page)-1) * 12;
            $category = 'Handsfree';
        }

        // it uses this search query at home page buttons
        if (isset($_GET['search'])) {
            $products_name = "%". $_GET['search'] . "%";
            $stmt = $conn->prepare("
            WITH MyCte AS 
            (
                SELECT   *,
                        ROW_NUMBER() OVER(order by product_id) AS row_num 
                FROM     products
                WHERE    product_category = ? AND product_name like ?
            )
            SELECT  *
            FROM    MyCte
            WHERE   row_num > ?
            LIMIT 12
            ");
            $stmt->bind_param('ssi', $category, $products_name, $products_id);
            $stmt->execute();
            $products = $stmt->get_result();

        }
        // find 12 products each time depending on number of page (get method) and make an extra column in order to sort them
        else {
            $stmt = $conn->prepare("
            WITH MyCte AS 
            (
                SELECT   *,
                        ROW_NUMBER() OVER(order by product_id) AS row_num 
                FROM     products
                WHERE    product_category = ?
            )
            SELECT  *
            FROM    MyCte
            WHERE   row_num > ?
            LIMIT 12
            ");
            $stmt->bind_param('si', $category, $products_id);
            $stmt->execute();
            $products = $stmt->get_result();
        }
    }
?>	