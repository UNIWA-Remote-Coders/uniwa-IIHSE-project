-- Create products table if not exists
CREATE TABLE IF NOT EXISTS `products`(
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_name` varchar(100) NOT NULL,
    `product_category` varchar(100) NOT NULL,
    `product_description`  varchar(255) NOT NULL,
    `product_image` varchar(255) NOT NULL,
    `product_image2` varchar(255) NOT NULL,
    `product_image3` varchar(255) NOT NULL,
    `product_image4` varchar(255) NOT NULL,
    `product_price` double(6,2) NOT NULL,/*9999.99*/
    `product_special_offer` integer(2) NOT NULL,
    `product_color` varchar(100) NOT NULL,
    PRIMARY KEY (`product_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create orders table if not exists
CREATE TABLE IF NOT EXISTS `orders`(
    `order_id` int(11)NOT NULL AUTO_INCREMENT,
    `order_cost` decimal(6,2) NOT NULL,
    `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
    `user_id` int(11) NOT NULL,
    `user_phone` int(11) NOT NULL,
    `user_city` varchar(255) NOT NULL,
    `user_address` varchar(255) NOT NULL,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create order items table if not exists
CREATE TABLE IF NOT EXISTS `order_items`(
    `item_id` int(11) NOT NULL AUTO_INCREMENT,
    `order_id` int(11) NOT NULL,
    `product_id` varchar(255) NOT NULL,
    `product_name` varchar(255) NOT NULL,
    `product_image` varchar(255) NOT NULL,
    `user_id` int(11) NOT NULL,
    `oreder_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`item_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create users table if not exists
CREATE TABLE IF NOT EXISTS `users`(
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) NOT NULL,
    `user_email` varchar(100) NOT NULL,
    `user_password` varchar(100) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_Constraint` (`user_email`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Insert products into DB
INSERT INTO `products` VALUES (NULL, 'Apple iPhone 15 Pro Max 1TB - Blue Titanium', 'Mobile Phones', 'High-end iPhone with 1TB storage in Blue Titanium color.', 'assets/imgs/featured1.png', '', '', '', 2018.99, 0, 'Blue');
INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Z Fold5 5G 1TB - Phantom Black', 'Mobile Phones', 'Cutting-edge Samsung Galaxy Fold with 5G, 1TB storage in Phantom Black color.', 'assets/imgs/featured2.png', '', '', '', 2339.00, 0, 'Phantom Black');
INSERT INTO `products` VALUES (NULL, 'Xiaomi 13 5G 256GB Dual Sim - Black', 'Mobile Phones', 'Xiaomi 13 with 5G, 256GB storage, Dual Sim in Black color.', 'assets/imgs/featured3.png', '', '', '', 999.99, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Huawei Mate X3 512GB Dual Sim - Dark Green', 'Mobile Phones', 'Powerful Huawei Mate X3 with 512GB storage, Dual Sim in Dark Green color.', 'assets/imgs/featured4.png', '', '', '', 2199.00, 0, 'Dark Green');
INSERT INTO `products` VALUES (NULL, 'Bluetooth Beats Powerbeats Pro - Black', 'Audio Accessories', 'High-quality Bluetooth Beats Powerbeats Pro in Black color.', 'assets/imgs/offer1.png', '', '', '', 209.30, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Fenix 7X Pro Solar Edition 51mm - Slate Gray', 'Wearable Technology', 'Advanced Smartwatch Garmin Fenix 7X Pro Solar Edition in Slate Gray color.', 'assets/imgs/offer2.png', '', '', '', 580.30, 0, 'Slate Gray');
INSERT INTO `products` VALUES (NULL, 'Apple iPad Pro 12.9" 2022 (6th Gen) WiFi - 256GB Silver Grey', 'Tablets', 'Latest Apple iPad Pro 12.9" 2022 (6th Gen) WiFi with 256GB storage in Silver Grey color.', 'assets/imgs/offer3.png', '', '', '', 1133.29, 0, 'Silver Grey');
INSERT INTO `products` VALUES (NULL, 'Smartphone Huawei Mate 50 Pro 256GB - Silver', 'Mobile Phones', 'High-performance Huawei Mate 50 Pro with 256GB storage in Silver color.', 'assets/imgs/offer4.png', '', '', '', 622.29, 0, 'Silver');
