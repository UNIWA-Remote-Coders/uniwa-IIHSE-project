-- Create products table if not exists
CREATE TABLE IF NOT EXISTS `products`(
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_image3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_image4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
    `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `user_id` int(11) NOT NULL,
    `oreder_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`item_id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create users table if not exists
CREATE TABLE IF NOT EXISTS `users`(
    `user_id` int(50) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(50) NOT NULL,
    `user_email` varchar(50) NOT NULL,
    `user_address` text NOT NULL,
    `user_password` varchar(50) NOT NULL,
    `date` timestamp,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_Constraint` (`user_email`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Insert products into DB
INSERT INTO `products` VALUES (NULL, 'Apple iPhone 15 Pro Max 1TB - Blue Titanium', 'Mobile Phones', 'High-end iPhone with 1TB storage in Blue Titanium color.', 'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/featured1.png', 'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/2.png', 'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/3.png', 'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/4.png', 2018.99, 0, 'Blue Titanium');
INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Z Fold5 5G 1TB - Phantom Black', 'Mobile Phones', 'Cutting-edge Samsung Galaxy Fold with 5G, 1TB storage in Phantom Black color.', 'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/featured2.png', 'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/1.png', 'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/2.png', 'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/3.png', 2339.00, 0, 'Phantom Black');
INSERT INTO `products` VALUES (NULL, 'Xiaomi 13 5G 256GB Dual Sim - Black', 'Mobile Phones', 'Xiaomi 13 with 5G, 256GB storage, Dual Sim in Black color.', 'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/featured3.png', 'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/1.png', 'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/2.png', 'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/4.png', 999.99, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Huawei Mate X3 512GB Dual Sim - Dark Green', 'Mobile Phones', 'Powerful Huawei Mate X3 with 512GB storage, Dual Sim in Dark Green color.', 'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/featured4.png', 'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/1.png', 'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/2.png', 'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/3.png', 2199.00, 0, 'Dark Green');
INSERT INTO `products` VALUES (NULL, 'Bluetooth Beats Powerbeats Pro - Black', 'Audio Accessories', 'High-quality Bluetooth Beats Powerbeats Pro in Black color.', 'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/offer1.png', 'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/2.png', 'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/5.png', 'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/6.png', 209.30, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Fenix 7X Pro Solar Edition 51mm - Slate Gray', 'Wearable Technology', 'Advanced Smartwatch Garmin Fenix 7X Pro Solar Edition in Slate Gray color.', 'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/offer2.png', 'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/2.png', 'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/3.png', 'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/5.png', 580.30, 0, 'Slate Gray');
INSERT INTO `products` VALUES (NULL, 'Apple iPad Pro 12.9" 2022 (6th Gen) WiFi - 256GB Silver Grey', 'Tablets', 'Latest Apple iPad Pro 12.9" 2022 (6th Gen) WiFi with 256GB storage in Silver Grey color.', 'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/offer3.png', 'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/1.png', 'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/4.png', 'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/2.png', 1133.29, 0, 'Silver Grey');
INSERT INTO `products` VALUES (NULL, 'Smartphone Huawei Mate 50 Pro 256GB - Silver', 'Mobile Phones', 'High-performance Huawei Mate 50 Pro with 256GB storage in Silver color.', 'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/offer4.png', 'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/2.png', 'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/4.png', 'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/5.png', 622.29, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold', 'Tablet', 'Apple iPad Air 2019 64GB and 3GB RAM, Camera 8MP, color Gold.', 'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/1.png', 'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/2.png', 'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/3.png', 'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/4.png', 587.00, 0, 'Gold');
INSERT INTO `products` VALUES (NULL, 'Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey', 'Tablet', 'Lenovo P12 Pro 12.6 with WiFi & 5G, 256GB and 8GB RAM, color Storm Grey', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/2.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/1.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/3.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/4.png', 828.43, 0, 'Storm Grey');
INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver', 'Tablet', 'Samsung Galaxy Tab S8+ 12.4 with WiFi, 256GB and 8GB RAM, color Silver', 'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/1.png', 'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/2.png', 'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/3.png', 'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/4.png', 983.00, 0, 'Silver');
INSERT INTO `products` VALUES (NULL, 'Microsoft Surface Pro 12.3 (m34GB128GB) Platinum', 'Tablet', 'Microsoft Surface Pro 12.3 with 128GB and 4GB RAM, Camera 8MP, color Platinum', 'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/3.png', 'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/1.png', 'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/2.png', 'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/4.png', 1044.00, 0, 'Platinum');
INSERT INTO `products` VALUES (NULL, 'Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray', 'Tablet', ' Huawei MateBook E 12.6 Tablet with WiFi,5 12GB and 16GB RAM, Camera 13MP, color Nebula Gray', 'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/3.png', 'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/2.png', 'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/1.png', 'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/5.png', 1233.00, 0, 'Nebula Gray');
INSERT INTO `products` VALUES (NULL, 'Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey', 'Tablet', ' Lenovo Tab P12 Pro 12.6 with WiFi+5G, 128GB, 6GB RAM, Camera 13MP, color Storm Grey', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/1.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/2.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/3.png', 'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/6.png', 1271.00, 0, 'Storm Grey');
INSERT INTO `products` VALUES (NULL, 'Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο', 'Tablet', ' Xoro MegaPAD 3204 V4 32 Tablet WITH WiFi, 16GB, 2GB RAM, Camera 2MP, color Black', 'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/1.png', 'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/2.png', 'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/3.png', 'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/4.png', 1350.00, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite', 'Tablet', ' Samsung Galaxy Tab S9 11 with WiFi, 256GB, 8GB RAM, Camera 13MP, color Graphite', 'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/1.png', 'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/2.png', 'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/3.png', 'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/4.png', 1545.00, 0, 'Graphite');

INSERT INTO `products` VALUES (NULL, 'Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree', 'Handsfree', ' Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree, Smart Assistant (Built-in)Alexa, Google Assistant, color Black ', 'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/5.png', 'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/2.png', 'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/3.png', 'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/7.png', 299.00, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Apple AirPods (2016) Earbud Bluetooth Handsfree', 'Handsfree', ' Apple AirPods (2016) Earbud Bluetooth Handsfree, Smart Assistant (Built-in)Siri, color White ', 'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/1.png', 'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/2.png', 'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/3.png', 'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/4.png', 310.44, 0, 'White');
INSERT INTO `products` VALUES (NULL, 'Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite', 'Handsfree', ' Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite, Multipoint Pairing, color Black ', 'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/1.png', 'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/2.png', 'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/3.png', 'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/4.png', 349.00, 0, 'Black');
INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree', 'Handsfree', ' Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree,Operating Time 8hrs, color Black ', 'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/5.png', 'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/1.png', 'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/3.png', 'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/4.png', 319.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree', 'Handsfree', 
' Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree,Operating Time 7hrs, color Black ', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/4.png', 349.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Sony WF-1000XM4 In-ear Bluetooth Handsfree', 'Handsfree', 
' Sony WF-1000XM4 In-ear Bluetooth Handsfree,Operating Time 12hrs, color Black ', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/4.png', 350.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree', 'Handsfree', 
' Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree,Operating Time 8hrs, color Black ', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/4.png', 377.85, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree', 'Handsfree', 
' BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree,Operating Time 5hrs, Neck-band, color White ', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/4.png', 1100.00, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver', 'Mobile Phones', 
' Huawei Mate 50 Pro Dual SIM, 256GB, 8GB RAM,  Silver, Camera 50MP, color Silver ', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/1.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/2.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/3.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/4.png', 1212.87, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray', 'Tablet', 
' Apple iPad Pro 2022 12.9 με WiFi & 5G, 256GB, 8GB RAM, Camera 12MP, color Space Gray ', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/5.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/1.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/2.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/4.png', 1699.99, 0, 'SiSpace Graylver');

INSERT INTO `products` VALUES (NULL, 'Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)', 'Tablet', 
' Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band),16GB, Bluetooth, NFC, Wi-Fi, color Black ', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/1.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/2.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/3.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/5.png', 639.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Beats Powerbeats Pro In-ear Bluetooth Handsfree', 'Handsfree', 
' Beats Powerbeats Pro In-ear Bluetooth Handsfree,Smart Assistant (Built-in)Siri,Operating Time 9hrs, color Black ', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/offer1.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/5.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/6.png', 282.56, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Polar Grit X (M-L) 47mm - Black', 'Smartwatch', 
' Smartwatch Polar Grit X (M-L) 47mm, GPS ,GLONASS ,GALILEO ,QZSS, Operating Time 40hrs, color Black ', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/1.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/2.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/3.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/4.png', 432.77, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate', 'Smartwatch', 
' Smartwatch Suunto 9 Peak Pro 43mm, GPS ,GLONASS ,GALILEO ,QZSS,for Google Android & Apple iOS, Operating Time 1 year, color Titanium Slate ', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/1.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/2.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/3.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/4.png', 1167.61, 0, 'Titanium Slate');

INSERT INTO `products` VALUES (NULL, 'Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium', 'Smartwatch', 
' Apple Watch Series 9 Aluminium Midnight GPS 45mm, GPS ,Operating Time 18hrs, color Midnight SmallMedium ', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/1.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/2.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/3.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/4.png', 488.99, 0, 'Midnight SmallMedium');

INSERT INTO `products` VALUES (NULL, 'Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium', 'Smartwatch', 
' Apple Watch Ultra Titanium 49mm GPS + Cellular, GPS, Bluetooth 5.0, Operating Time 60hrs, color Green Alpine Loop Medium ', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/1.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/2.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/3.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/4.png', 798.99, 0, 'Green Alpine Loop Medium');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver', 'Smartwatch', 
'Garmin Fenix  Smartwatch 7S Pro Solar Edition 42mm, GPS, for Google Android & Apple iOS, 32GB, Operating Time 11 days, color Silver ', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/1.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/2.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/3.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/4.png', 719.00, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Instinct 2X Solar 50mm - Graphite', 'Smartwatch', 
'Smartwatch Garmin Instinct 2X Solar 50mm, GPS, for Google Android & Apple iOS, Power Glass, Operating Time 40 days, color Graphite ', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/1.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/2.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/3.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/4.png', 450.00, 0, 'Graphite');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Huawei Watch GT 4 41mm Gold', 'Smartwatch', 
'Smartwatch Huawei Watch GT 4 41mm, GPS, for Google Android, Apple iOS & Huawei HarmonyOS, Operating Time 7 days, color Gold ', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/1.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/2.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/3.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/4.png', 299.00, 0, 'Gold');

INSERT INTO `products` VALUES (NULL, '!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black', 'Smartphone', 
'Smartphone Realme 11 Pro 5G 256GB Dual Sim, 256GB, 8GB RAM, camera 100 MP f/1.8 26mm (wide) + 2 MP f/2.4 (depth), color Astral Black ', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/1.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/2.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/3.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/4.png', 379.90, 0, 'Astral Black');

INSERT INTO `products` VALUES (NULL, '!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black', 'Smartphone', 
'Smartphone Samsung Galaxy S22 5G, 256GB, 8GB RAM, camera 50 MP, f/1.8, 23mm (wide) + 10 MP, f/2.4, 70mm (telephoto) + 12 MP, f/2.2, 13mm, 120˚ (ultrawide), color Phantom Black ', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/1.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/2.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/3.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/4.png', 749.00, 0, 'Phantom Black');

INSERT INTO `products` VALUES (NULL, '!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black', 'Smartphone', 
'Smartphone Sony Xperia 5 V 5G Dual Sim, 128GB, 8GB RAM, camera 48 MP f/1.9 24mm (wide) + 12 MP f/2.2 16mm (ultrawide), color  Black ', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/4.png', 899.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, '!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent', 'Smartphone', 
'!Smartphone TCL 40 NxtPaper Dual Sim, 256GB, 8GB RAM, camera 50 MP f/1.8 (wide) + 5 MP f/2.2 (ultra wide) + 2 MP f/2.4 (macro), color  Opalescent ', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/1.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/2.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/3.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/4.png', 179.90, 0, 'Opalescent');

INSERT INTO `products` VALUES (NULL, '!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black', 'Smartphone', 
'!Smartphone Ulefone Armor 12S Dual Sim, 128GB, 8GB RAM, camera 50MP f/1.8 (wide) + 8MP 118.8° f/2.2 (ultrawide) + 2MP f/2.8 (macro) + 2MP (depth), color  Black ', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/4.png', 319.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, '!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black', 'Smartphone', 
'!Smartphone Xiaomi 13T 5G Dual Sim, 256GB, 8GB RAM, camera 50 MP f/1.9 24mm (wide) + 50 MP f/1.9 50mm (telephoto) + 12 MP f/2.2 15mm (ultrawide), color  Black ', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/4.png', 699.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, '!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black', 'Smartphone', 
'!Smartphone Xiaomi Redmi Note 12 Pro 5G, 128GB, 6GB RAM, camera 50 MP f/1.9 (wide) + 8 MP f/2.2 (ultrawide) + 2 MP f/2.4 (macro), color  Midnight Black ', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/1.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/2.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/3.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/4.png', 299.89, 0, 'Midnight Black');

INSERT INTO `products` VALUES (NULL, '!Apple iPhone 13 512GB - Midnight', 'Smartphone', 
'!Apple iPhone 13, 512GB, 4GB RAM, camera 12 MP, f/1.6, 26mm (wide) + 12 MP, f/2.4, 120˚, 13mm (ultrawide), color  Midnight ', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/1.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/2.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/3.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/4.png', 1088.99, 0, 'Midnight');