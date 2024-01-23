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
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) NOT NULL,
    `user_email` varchar(100) NOT NULL,
    `user_password` varchar(100) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_Constraint` (`user_email`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Insert products into DB
INSERT INTO `products` VALUES (NULL, 'Apple iPhone 15 Pro Max 1TB - Blue Titanium', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2023</li> <li>Super Retina XDR OLED 6.7" 120Hz</li> <li>NFC Support</li> <li>New A17 Pro Bionic processor</li> <li>Triple rear camera 48MP/4K 60 FPS</li> <li>4852 mAh battery (50% in 30min)</li> </ul> <br> iPhone, forged from titanium<br> The iPhone 15 Pro Max is the first iPhone to feature a titanium aerospace-grade design, using the same alloy used by spaceships for missions to Mars.<br> Titanium has one of the best strength-to-weight ratios of any metal, making these Pro models the lightest ever. You will notice the difference from the moment you get one of these.<br> The beautiful, slim brushed finish on the titanium bands is achieved through precision processing, polishing, brushing, and sandblasting.<br> The new contoured edges and slimmest margins ever on the iPhone make it even more comfortable to hold in your hand.<br> The titanium band is connected to a new internal aluminum frame through solid-state diffusion. This is a groundbreaking innovation in the industry, using a thermomechanical process that joins these two metals with incredible strength. The internal frame is also made from 100% recycled aluminum, which contributes to overall use of recycled materials and helps us achieve our climate goals for 2030.', 
'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/featured1.png', 
'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/2.png', 
'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/3.png', 
'assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/4.png', 2018.99, 0, 'Blue Titanium');

INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Z Fold5 5G 1TB - Phantom Black', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2023</li> <li>Screen 7.6"/2176 x 1812/120 Hz</li> <li>NFC Support</li> <li>Snapdragon 8 Gen 2 Processor</li> <li>Triple Rear Camera 50MP/8K 24 fps</li> <li>Battery 4400mAh (50% in 30min)</li> </ul> <br> With an innovative shape factor enhanced by the new Flex Hinge for a balanced design and professional camera capabilities with the unique FlexCam, the Galaxy Z series offers unparalleled experiences in foldable devices.<br> Take the big screen with you Unfold an amazing, immersive 7.6" display redesigned to offer you gaming like never before, cinematic viewing, and enhanced productivity.<br> Keep it bright, even in the sunlight Enjoy a cinematic experience on the bright main screen 7.6" without direct sunlight ruining the view<br> Multiple applications. One screen.<br> Multi-window view takes your multitasking to the next level. Keep three windows open on one screen so you can stream, shop, browse, and play more.<br> The product line can accommodate up to twelve applications simultaneously, allowing you to seamlessly switch between your favorites.<br> Large screen, meet the thinnest S Pen.<br> Precision meets portability with the S Pen capability on the Galaxy Z Fold5. Write directly on the large screen and make your work even easier. Additionally, use Samsung Notes for a canvas that syncs across all Galaxy devices.<br> The S Pen is sold separately, compatible only with the main screen. Requires S Pen Fold Edition or S Pen Pro.<br>', 
'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/featured2.png', 
'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/1.png', 
'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/2.png', 
'assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/3.png', 2339.00, 0, 'Phantom Black');

INSERT INTO `products` VALUES (NULL, 'Xiaomi 13 5G 256GB Dual Sim - Black', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2023</li> <li>Screen 6.36"/2400 x 1080/120Hz</li> <li>NFC Support</li> <li>Processor Snapdragon 8 Gen 2</li> <li>Triple Rear Camera 50MP</li> <li>Battery 4500mAh/100% in 48 min</li> </ul> <br> Enjoy your next photographic masterpiece, thanks to the Xiaomi 13 series. Behind the masterpiece is a camera system co-designed with Leica, seamlessly tuned to incorporate iconic features such as the Leica 75mm telephoto lens that shapes the classic Leica style and aesthetic.<br> Masterful design<br> Polished flat design<br> Convenient handle<br> Strikingly immersive screen design<br> Convenient handle<br> Activate the screen to enjoy an unparalleled experience. Ultra-thin 1.61mm bezels offer unlimited visuals.<br> Built for unlimited scenarios<br> Water and dust resistance IP68<br> "It s waterproof and water-resistant, thanks to precision manufacturing. Capture special memories anytime, anywhere.<br> Masterpiece camera<br> Leica Professional Camera System<br> Capturing important circumstances as well as extraordinary details<br>.', 
'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/featured3.png', 
'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/1.png', 
'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/2.png', 
'assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/4.png', 999.99, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Huawei Mate X3 512GB Dual Sim - Dark Green', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2023</li> <li>Screen 7.85/2496 x 2224/120 Hz</li> <li>NFC Support</li> <li>Processor Snapdragon 8+ Gen 1 4G</li> <li>Triple Rear Camera 50MP/4Κ 60 FPS</li> <li>Battery 4800 mAh</li> </ul> <br> The worlds first quad-curved foldable smartphone, a future-forward design that ushers in a revolutionary form factor. As sturdy as it is, the phones four edges are soft-rounded for comfortable handling, enhancing an outstanding feel that lasts over time.<br> Slimmed Down, Spruced Up<br> HUAWEI Mate X3s slim and light foldable design takes full advantage of its new-gen multi-dimensional hinge, ensuring compactness when folded and ultra-thinness when unfolded. To further reduce weight, it uses an ultra-slim design around Type-C component, ultra light and strong aluminium and carbon fibre.<br> Two Screens to Savour<br> As the first foldable smartphone to garner two TÜV Rheinland certifications (Colour Accuracy & Precise Colour Projection)⁠, HUAWEI Mate X3 brings true-to-life details right in front of you, supporting 1.07 billion colours and groundbreaking HUAWEI X-True technology. Thanks to its Intelligent Light-Sensitive Display, the screens deliver a consistent viewing experience, whatever the occasion is. The interior screens anti-reflection layer keeps the view clear, even under direct sunlight.<br>', 
'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/featured4.png', 
'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/1.png', 
'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/2.png', 
'assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/3.png', 2199.00, 0, 'Dark Green');

INSERT INTO `products` VALUES (NULL, 'Bluetooth Beats Powerbeats Pro - Black', 'Audio Accessories', 
'Description:<br> The Beats Powerbeats Pro headphones are designed for athletes and demanding users who are looking for headphones with high sound quality and stability during exercise and activities. These headphones feature a revolutionary design that keeps the headphones in your ears while you work out, while also providing sweat and moisture resistance.<br><br> They also offer excellent sound quality, with powerful bass and clear highs. They have a long battery life and are extremely user-friendly, with touch controls on the headphones for easy access to music playback and answering phone calls. The Powerbeats Pro are ideal for athletes and those who want to listen to music during exercise or their activities without worrying about the headphones falling out or being bothered by cables.', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/offer1.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/5.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/6.png', 209.30, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Fenix 7X Pro Solar Edition 51mm - Slate Gray', 'Wearable Technology', 
'Descriptions: <ul> <li>Model 2022</li> <li>MIP Touchscreen</li> <li>Up to 37 days autonomy</li> <li>NFC, Wi-Fi, Bluetooth, GPS</li> <li>Suitable for swimming</li> </ul>', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/offer2.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/2.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/3.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/5.png', 580.30, 0, 'Slate Gray');

INSERT INTO `products` VALUES (NULL, 'Apple iPad Pro 12.9" 2022 (6th Gen) WiFi - 256GB Silver Grey', 'Tablets', 
'Descriptions: <ul> <li>2022 Model</li> <li>Liquid Retina 11" Display</li> <li>Apple M2 Chip</li> <li>7538 mAh Battery</li> <li>Up to 10 hours browsing with Wi-Fi</li> <li>468 g Weight</li> </ul>', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/offer3.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/1.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/4.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/2.png', 1133.29, 0, 'Silver Grey');

INSERT INTO `products` VALUES (NULL, 'Smartphone Huawei Mate 50 Pro 256GB - Silver', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2022</li> <li>Screen 6.74"/2616 x 1212/120 Hz</li> <li>NFC support</li> <li>Processor Snapdragon 8+ Gen 1</li> <li>Triple Rear Camera 50MP/4K 60fps</li> <li>Battery 4700 mAh Fast Charge 66W</li> <ul> <br> A sense of symmetry, a sophisticated Clous de Paris pattern, 6m water resistance and an XMAGE camera with an ultra-wide variable F1.4 aperture.<br> Design that becomes an instant classic<br> Arm yourself with the smartphone that radiates charm in every way, with its iconic symmetrical shape and the intricate Clous de Paris pyramidal pattern that draws you into the sophisticated camera module.<br> Clear as crystal<br> Come for the technology, but stay for the view! The 120Hz curved screen and individually calibrated colours make every frame a sight to behold. And the 1440 Hz PWM brightness reduction, which reduces flicker, gives your eyes the breathing room they deserve.', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/offer4.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/2.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/4.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/5.png', 622.29, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold', 'Tablet', 
'The iPad Air offers Apples most powerful technologies to more people than ever. Like the A12 Bionic chip with Neural Engine. A 10.5-inch Retina display with True Tone. Support for Apple Pencil and Smart Keyboard. And with a weight of less than half a kilogram and a thickness of just 6.1mm, all this power easily follows you everywhere.', 
'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/1.png', 
'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/2.png', 
'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/3.png', 
'assets/imgs/offers/Apple iPad Air 2019 10.5 με WiFi (3GB64GB) gold/4.png', 587.00, 0, 'Gold');

INSERT INTO `products` VALUES (NULL, 'Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey', 'Tablet', 
'Descriptions: <ul> <li>AMOLED 2K 12.6" display</li> <li>Octa-core processor 3.2GHz</li> <li>6GB RAM memory</li> <li>13MP rear camera</li> <li>Includes Precision Pen 3</li> <li>USB Type C to 3.5mm adapter included</li> </ul> Enjoy movies from wherever you want<br> Screen<br> The Lenovo Tab P12 Pro features a 12.6-inch AMOLED Dolby Vision touchscreen display, narrow Bezels on all sides, 2K resolution, and a refresh rate of 120 Hz. Additionally, with a brightness of up to 600nits, you can use the device even in outdoor spaces.<br> Sound<br> With the four built-in JBL speakers and the help of Dolby Atmos technology, you feel the sound surrounding you.<br> Gaming without limits<br> The combination of a 120Hz refresh rate with the speed provided by WiFi 6 and the Snapdragon 870 processor, gives you the ability to enjoy games with demanding requirements.', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/2.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/1.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/3.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi & 5G (8GB256GB) Storm Grey/4.png', 828.43, 0, 'Storm Grey');

INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver', 'Tablet', 
'Descriptions: <ul> <li>Model 2022</li> <li>Super Amoled 12.4" 2800x1752 display</li> <li>Snapdragon 8 Gen 1 processor</li> <li>10090 mAh battery</li> <li>Superfast charging 45W</li> <li>Weight 572 gr</li> </ul> <br> The Samsung Galaxy Tab S8+ is primarily aimed at those who need a versatile tablet with a large screen for entertainment, work, and media consumption.<br> It also caters to those who desire powerful performance, as it features an advanced processor and ample RAM. It is also suitable for users who want access to high-quality images and sound, as it boasts a high-resolution 12.4-inch OLED display and a system of four AKG speakers.<br> Lastly, it has a large battery for extended battery life of the device.', 
'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/1.png', 
'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/2.png', 
'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/3.png', 
'assets/imgs/offers/Samsung Galaxy Tab S8+ 12.4 με WiFi (8GB256GB) Silver/4.png', 983.00, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Microsoft Surface Pro 12.3 (m34GB128GB) Platinum', 'Tablet', 
'Descriptions:<br> SCREEN.<br> The screen of the Surface Pro 12.3 is the best I have personally seen so far (it is the fourth tablet I have). It has a high resolution (2736 x 1824, with 267 pixels per inch) with a 3:2 aspect ratio, as well as high brightness. At 50% brightness, it covers most lighting situations, even in strong sunlight if you are in the shade. I conducted various tests to see how it looks from the sides, how it looks tilted from above or below. And of course, the best test for me was how it looks when there is sunlight, which was my issue with the previous (last) tablet I had, constantly searching for shaded areas. The test was done with strong sunlight and the suns rays directly hitting the screen. It is a shame that the description doesnt allow us to upload photos for you to understand what I mean, but I can comfortably see and read everything. This was, after all, the main reason why, after a lot of research, I ended up with this tablet. Adding the following links on 1-9-2018. Note that I not only did not try to hide the reflections and mirror effect of the screen, but I tried to highlight them as best as possible.<br><br> KEYBOARD.<br> Very good! Especially for those like me who have large hands. I didnt measure the dimensions of the keys, but I have the feeling that they must be almost like those of a regular keyboard, just thinner. However, this doesnt create any problems while typing. The Caps Lock and Fn keys have built-in LEDs that light up when active. The base is made of a metal alloy and is quite rigid and compact, so it doesnt create any flexibility or oscillation issues during use, while also being lightweight. The feeling of the keyboard being covered in suede is also very nice. Another thing I liked is the adjustable brightness of the keys in three levels, according to each persons preference, as well as the automatic shutdown after 20 seconds to save battery. Of course, as soon as you touch a key, the letters, symbols, and keys light up. It also provides very good screen protection during transportation. Finally, it weighs only 295 grams.<br><br> BATTERY.<br> Here, Microsoft has done a very good job as well. With some internet browsing and a few videos, it consumes the battery at a rate of approximately 10 to 12% per hour, depending on the brightness setting. Charging takes place at a rate of approximately 33% per hour. However, what annoys me and is unacceptable for a tablet of this price, quality, and reputation is that when it is closed, you cannot see how much longer it will take to reach 100% charge. There is no indication in percentages or any symbol, as other much cheaper tablets have. You simply connect it to power and estimate how much battery is left and how long it will take to fully charge.<br><br> SOUND.<br> The sound is loud and clear, and no matter how noisy the environment is, I can comfortably hear what the tablet is playing. Of course, I am not referring to exceptional cases, such as working next to a compressor or being in a bar with the music at full volume.', 
'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/3.png', 
'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/1.png', 
'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/2.png', 
'assets/imgs/offers/Microsoft Surface Pro 12.3 (m34GB128GB) Platinum/4.png', 1044.00, 0, 'Platinum');

INSERT INTO `products` VALUES (NULL, 'Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray', 'Tablet', 
'Descriptions: <ul> <li>Model 2022</li> <li>OLED Display 12.6" 2K 2560 x 1600</li> <li>Intel Core i5-1130G7 Processor</li> <li>Battery 42Wh</li> <li>Fast Charging 65W</li> <li>Weight 709 gr</li> </ul> <br> Enjoy the flexibility offered by the Huawei MateBook E, which allows you to use it as a laptop. Immerse yourself in your favorite content with the 12.6" OLED Real Colour FullView display and make video calls easier than ever with the four microphones that support AI Noise Cancellation.<br><br> The Huawei MateBook E is mainly aimed at people looking for a lightweight, portable, and versatile tablet with a keyboard for professional and everyday use at home or in the office. It is also aimed at people who need a laptop that can be used as a tablet for note-taking and drawing with the use of a stylus. In addition, its sleek design and integrated security technology make it an attractive choice for those who want a premium tablet.', 
'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/3.png', 
'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/2.png', 
'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/1.png', 
'assets/imgs/offers/Huawei MateBook E 12.6 Tablet με WiFi (16GB512GB) Nebula Gray/5.png', 1233.00, 0, 'Nebula Gray');

INSERT INTO `products` VALUES (NULL, 'Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey', 'Tablet', 
'Descriptions: <ul> <li>AMOLED 2K 12.6" display</li> <li>Octa-core processor 3.2GHz</li> <li>6GB RAM memory</li> <li>13MP rear camera</li> <li>Includes Precision Pen 3</li> <li>USB Type C to 3.5mm adapter included</li> </ul> <br> Enjoy movies from wherever you want<br> Screen<br> The Lenovo Tab P12 Pro features a 12.6-inch AMOLED Dolby Vision touchscreen display, narrow Bezels on all sides, 2K resolution, and a refresh rate of 120 Hz. Additionally, with a brightness of up to 600nits, you can use the device even in outdoor spaces.<br> Sound<br> With the four built-in JBL speakers and the help of Dolby Atmos technology, you feel the sound surrounding you. <br> Gaming without limits<br> The combination of a 120Hz refresh rate with the speed provided by WiFi 6 and the Snapdragon 870 processor gives you the ability to enjoy games with demanding requirements.', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/1.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/2.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/3.png', 
'assets/imgs/offers/Lenovo Tab P12 Pro 12.6 με WiFi+5G και Μνήμη 128GB Storm Grey/6.png', 1271.00, 0, 'Storm Grey');

INSERT INTO `products` VALUES (NULL, 'Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) black', 'Tablet', 
'Descriptions: <ul> <li>FHD IPS 32" Screen</li> <li>Ethernet Port, HDMI</li> <li>Card Reader</li> <li>Weight: 8.6 kg</li> </ul> <br>', 
'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/1.png', 
'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/2.png', 
'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/3.png', 
'assets/imgs/offers/Xoro MegaPAD 3204 V4 32 Tablet με WiFi (2GB16GB) Μαύρο/4.png', 1350.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Tab S9 11 with WiFi (8GB256GB) Graphite', 'Tablet', 
'Descriptions: <ul> <li>Model 2023</li> <li>Dynamic AMOLED 2X 11" display</li> <li>Snapdragon 8 Gen 2 processor</li> <li>8400mAh battery</li> <li>Fast charging 15W</li> <li>Weight 498gr</li> </ul> <br> The Samsung Galaxy Tab S9 is aimed at users who are looking for a powerful and versatile tablet. It is ideal for those who want to play games, watch videos, create content, and work. The 11'' Dynamic AMOLED 2X display with a resolution of 2560 x 1600 pixels is huge and perfect for watching videos, reading books, or working.<br> In addition, the Galaxy Tab S9 series features the powerful Snapdragon® 8 Gen 2 processor, offering stunning performance in gaming, while also innovating with the first water and dust resistant tablet with IP68 certification.<br> Finally, the series is complemented by the Samsung S Pen, also certified with an IP68 rating, which offers high responsiveness.', 
'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/1.png', 
'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/2.png', 
'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/3.png', 
'assets/imgs/offers/Samsung Galaxy Tab S9 11 με WiFi (8GB256GB) Graphite/4.png', 1545.00, 0, 'Graphite');

INSERT INTO `products` VALUES (NULL, 'Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 6 hours</li> <li>Charging Time 3.5 hours</li> <li>Sweat Resistance with IPX4</li> <li>Bluetooth 5.2</li> <li>Active Noise Cancellation</li> <li>Wireless Charging</li> </ul> The Audio Technica ATH-TWX9 headphones are designed for anyone looking for a pair of headphones with reliable sound quality and comfortable fit. They are ideal for listening to music, videos, games, and for use in phone calls or other platforms. They are suitable for people who travel frequently, as they are relatively small and lightweight. Finally, the ATH-TWX9 are also suitable for use in the gym, as they have a durable construction and IPX4 waterproof technology for protection against sweat and water.<br><br> The TWS ATH-TWX9 offer the freedom to customize your audio space for an advanced sound experience. These headphones create an immersive sound experience and feature digital hybrid noise cancellation technology. With unique features such as UV deep sterilization, 360 Reality Audio for realistic 3D soundscapes, and Snapdragon Sound™ platform for higher quality music, videos, and calls, the ATH-TWX9 stand out from the rest as the best true wireless headphones.', 
'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/5.png', 
'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Audio Technica ATH-TWX9 In-ear Bluetooth Handsfree/7.png', 299.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Apple AirPods (2016) Earbud Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 2 hours</li> <li>Standby Time 19 hours</li> <li>Operation with Charging Case 24 hours</li> <li>Fast Charging</li> <li>Microphone Noise Reduction</li> </ul> Battery life of more than 24 hours with the charging case.<br> Ready to use with all devices by removing them from their case.<br> Automatically activated and always stay connected.<br> They recognize speech and filter out external noise, focusing on the sound of the voice.<br> They understand when they are placed in the ears and stop playing when they come out.<br> Charged in just 15 minutes, they offer up to 3 hours of listening time.<br> AirPods are compatible with any Bluetooth-enabled device. However, some of their key features do not work on Android devices and generally those that do not have iOS. For example, you cant use Siri, you cant listen from one earpiece only and you cant control their battery. Also, pairing requires a few extra steps.', 
'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Apple AirPods (2016) Earbud Bluetooth Handsfree/4.png', 310.44, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 10 hours</li> <li>Charging Time 2.5 hours</li> <li>Bluetooth: 5.0</li> <li>Sweatproof</li> <li>Active Noise Cancellation</li> <li>Fast Charging</li> </ul> <br><br> The Logitech Zone True headphones are designed for professionals who need to communicate in various work environments, such as offices, conference rooms, and retail stores. These headphones feature advanced noise cancellation functions and allow the user to communicate with clear sound even in crowded environments. Additionally, the Logitech Zone True provides comfort and flexibility as they can be connected to both wireless and wired systems, while also featuring touch sensors for easy control of sound and calls.<br><br> Crystal clear sound, excellent connectivity, and reliability Bring your personal style to video conferences with the Zone True Wireless Bluetooth headphones. The certified microphone with noise-cancellation technology, ANC technology, and exciting sound are perfect for crowded workspaces. Connect your computer and smartphone simultaneously and then customize and control the headphones with the Logi Tune app.', 
'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/1.png', 
'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/2.png', 
'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/3.png', 
'assets/imgs/offers/Logitech Zone True Wireless In-ear Bluetooth Handsfree Graphite/4.png', 349.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 8 hours</li> <li>Operating with Charging Case 20 hours</li> <li>Bluetooth 5.2</li> <li>Active Noise Cancellation</li> <li>Sweat Resistance with IP57</li> <li>Wireless Charging</li> </ul>', 
'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/5.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree/4.png', 319.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 7 hours</li> <li>Operating with Charging Case 30 hours</li> <li>Charging Time 2 hours</li> <li>Passive Noise Cancelling</li> <li>Sweat Resistance with IP57</li> <li>Wireless Charging</li> </ul> The Bang & Olufsen Beoplay E8 Sport headphones are designed for people looking for high-quality in-ear headphones for sports and outdoor use. They are designed to withstand sweat, rain, and dust, while providing high-quality sound and comfort. The Beoplay E8 Sport also has shock and drop resistance, making them ideal for people who exercise outdoors or on the go.<br> Signed sound by Bang & Olufsen<br> Enhance your workouts with the powerful and precise sound of the Beoplay E8 Sport, specially tuned for sports. Customize your music experience using BeoSonic* and activate Transparency Mode when you want to hear the world around you. Four built-in microphones ensure crystal-clear clarity wherever you make your calls.<br>', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Bang & Olufsen Beoplay E8 Sport In-ear Bluetooth Handsfree/4.png', 349.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Sony WF-1000XM4 In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions:<br> Without noise, cables, and distractions. Only exceptional sound, top noise cancellation, and countless hours of absolute audio freedom.<br><br> Top noise cancellation feature<br> The noise cancellation technology in the WF-1000XM3 headphones is Sonys most advanced in truly wireless headphones, thanks to Sonys HD QN1e noise cancellation processor.<br><br> All-day battery life<br> The full charge offers 6 hours of power and the charging case provides 3 additional charges for all-day operation. With noise cancellation disabled, it lasts even longer, with 8 hours of power with full charge, plus the 3 charges from the charging case, for up to 32 hours of playback. Also, with a quick 10-minute charge in the magnetic charging case, you can enjoy up to 90 minutes of playback time.<br><br> Hands-free calls with clearer sound<br> Speak freely, with easy hands-free calls. The WF-1000XM3 headphones offer higher voice clarity, and you can answer calls using either one or both earbuds. This way, you can charge them alternately or listen to calls clearly in noisy environments.', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Sony WF-1000XM4 In-ear Bluetooth Handsfree/4.png', 350.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 8 hours</li> <li>Operating with Charging Case 33 hours</li> <li>Charging Time 2 hours</li> <li>Active Noise Cancellation</li> <li>Wireless Charging</li> <li>Bluetooth 5.2</li> </ul> <br><br> The Jabra Evolve2 Buds are noise-canceling headphones designed for professionals who need a reliable and high-quality audio accessory for their everyday business communications. Their design is specifically tailored for use in teleconferences, voice calls, and other business communications, while the noise cancellation helps neutralize interference and improve voice quality. Additionally, they offer a stable Bluetooth connection and are compatible with various communication platforms and applications, such as Microsoft Teams and Zoom.', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/Jabra Evolve2 USB-A UC - Wireless Charging Pad In-ear Bluetooth Handsfree/4.png', 377.85, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree', 'Handsfree', 
'Description:<br> The BeyerDynamic Xelento Wireless are specifically designed for listeners who want to enjoy their music with accuracy and detail, while also wanting to enjoy the wireless freedom of movement and convenience provided by Bluetooth connectivity. They are also aimed at listeners who work in the music, sound, or cinema industry, as they offer reliable and precise sound reproduction, making them suitable for professional use.<br> Tesla in-ear headphones Audiophile headphones with Bluetooth connection<br> First-class Bluetooth connection (Qualcomm® aptX™ HD and AAC) meets extremely efficient microscopically small Tesla technology drivers<br> High-resolution sound for an on-the-go headphone lifestyle<br> Ergonomically shaped housings combined with perfectly shaped headphones (10 sizes) for perfect comfort during use<br> Exclusive materials such as silver-plated cables, aluminum battery housing, and engraved fronts<br> Handmade "Made in Germany"', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/offers/BeyerDynamic Xelento Wireless In-ear Bluetooth Handsfree/4.png', 1100.00, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver', 'Mobile Phones', 
'Descriptions: <ul> <li>Model 2022</li> <li>Screen 6.74"/2616 x 1212/120 Hz</li> <li>NFC support</li> <li>Processor Snapdragon 8+ Gen 1</li> <li>Triple Rear Camera 50MP/4K 60fps</li> <li>Battery 4700 mAh Fast Charge 66W</li> <ul> <br> A sense of symmetry, a sophisticated Clous de Paris pattern, 6m water resistance and an XMAGE camera with an ultra-wide variable F1.4 aperture.<br> Design that becomes an instant classic<br> Arm yourself with the smartphone that radiates charm in every way, with its iconic symmetrical shape and the intricate Clous de Paris pyramidal pattern that draws you into the sophisticated camera module.<br> Clear as crystal<br> Come for the technology, but stay for the view! The 120Hz curved screen and individually calibrated colours make every frame a sight to behold. And the 1440 Hz PWM brightness reduction, which reduces flicker, gives your eyes the breathing room they deserve.', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/1.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/2.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/3.png', 
'assets/imgs/offers/Huawei Mate 50 Pro Dual SIM (8GB256GB) Silver/4.png', 1212.87, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray', 'Tablet', 
'Descriptions: <ul> <li>2022 Model</li> <li>Liquid Retina 11" Display</li> <li>Apple M2 Chip</li> <li>7538 mAh Battery</li> <li>Up to 10 hours browsing with Wi-Fi</li> <li>468 g Weight</li> </ul>', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/5.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/1.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/2.png', 
'assets/imgs/offers/Apple iPad Pro 2022 12.9 με WiFi & 5G (8GB256GB) Space Gray/4.png', 1699.99, 0, 'SiSpace Graylver');

INSERT INTO `products` VALUES (NULL, 'Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)', 'Tablet', 
'Descriptions: <ul> <li>Model 2022</li> <li>MIP Touchscreen</li> <li>Up to 37 days autonomy</li> <li>NFC, Wi-Fi, Bluetooth, GPS</li> <li>Suitable for swimming</li> </ul>', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/1.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/2.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/3.png', 
'assets/imgs/offers/Garmin Fenix 7X Solar Stainless Steel 51mm (Slate Grey with Black Band)/5.png', 639.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Beats Powerbeats Pro In-ear Bluetooth Handsfree', 'Handsfree', 
'Description:<br> The Beats Powerbeats Pro headphones are designed for athletes and demanding users who are looking for headphones with high sound quality and stability during exercise and activities. These headphones feature a revolutionary design that keeps the headphones in your ears while you work out, while also providing sweat and moisture resistance.<br><br> They also offer excellent sound quality, with powerful bass and clear highs. They have a long battery life and are extremely user-friendly, with touch controls on the headphones for easy access to music playback and answering phone calls. The Powerbeats Pro are ideal for athletes and those who want to listen to music during exercise or their activities without worrying about the headphones falling out or being bothered by cables.', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/offer1.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/5.png', 
'assets/imgs/offers/Beats Powerbeats Pro In-ear Bluetooth Handsfree/6.png', 282.56, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Polar Grit X (M-L) 47mm - Black', 'Smartwatch', 
'Descriptions: <ul> <li>Model 2021</li> <li>Touchscreen</li> <li>Battery life up to 2 days</li> <li>GPS, Bluetooth</li> <li>Suitable for swimming</li> </ul> <br> Designed to allow athletes of all levels to exceed every expectation, the Polar Vantage V2 features minimalist design and innovative technology.<br> The Polar smartwatch is primarily aimed at athletes and those interested in improving their physical condition and developing their athletic performance.<br> With its multiple sensors, the Polar Vantage V2 provides detailed measurements of your heart rate, sleep, endurance, and performance during exercise, and can help you improve your athletic performance and overall lifestyle.', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/1.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/2.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/3.png', 
'assets/imgs/offers/Smartwatch Polar Grit X (M-L) 47mm - Black/4.png', 432.77, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate', 'Smartwatch', 
'The most powerful and high-performance GPS multisport watch by Suunto.<br> A combination of durability and style.<br> The Suunto 9 Peak Pro is our most powerful multisport watch to date, with incredible battery life and military-grade durability.<br> Its exceptionally slim and timeless design makes it beautiful and stylish.', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/1.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/2.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/3.png', 
'assets/imgs/offers/Smartwatch Suunto 9 Peak Pro 43mm - Titanium Slate/4.png', 1167.61, 0, 'Titanium Slate');

INSERT INTO `products` VALUES (NULL, 'Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium', 'Smartwatch', 
'Descriptions: <ul> <li>Model 2023</li> <li>Retina OLED Always-On touchscreen display</li> <li>Battery life up to 18 hours</li> <li>NFC, Wi-Fi, GPS, Bluetooth</li> <li>Suitable for swimming</li> </ul> The Apple Watch Series 9 is more powerful than ever with the new S9 SiP, which enhances performance and capabilities, a new magical double-tap gesture, a brighter display, faster Siri on the device, now with the ability to access and record health data, precise finding for iPhone, and much more.<br> The Apple Watch Series 9 runs watchOS 10, which offers redesigned apps, the new Smart Stack, new watch faces, new cycling and hiking features, and tools to support mental health.<br> S9 SiP<br> The custom silicon of Apple makes the Apple Watch Series 9 more capable, intuitive, and faster. The new dual-core CPU features 5.6 billion transistors - 60 percent more than the S8 chip. A new quad-core Neural Engine processes machine learning tasks up to two times faster.<br> It enables a range of innovations, including a new gesture - double tap.<br> Double Tap<br> Gestures make the Apple Watch even easier to use at any time, especially when your hands are full. Simply double tap your index finger and thumb together to answer a call, open a notification, play and pause music, and much more.<br> 2x brighter display<br> The advanced display system of the Series 9 increases the maximum brightness to 2000 nits - double that of the Series 8 - for easier reading in full sunlight conditions. It is also better in low-light conditions, such as in cinemas, as it dims to just 1 nit.<br> Siri<br> With Series 9, the Siri requests processed by your device are faster and more secure. In addition, Siri dictation is up to 25 percent more accurate. And later this year, you ll be able to ask Siri about your health data, such as how much sleep you got last night. Or use it to track information like your weight or menstrual cycle.', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/1.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/2.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/3.png', 
'assets/imgs/offers/Apple Watch Series 9 Aluminium Midnight GPS 45mm - Midnight SmallMedium/4.png', 488.99, 0, 'Midnight SmallMedium');

INSERT INTO `products` VALUES (NULL, 'Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium', 'Smartwatch', 
'Descriptions: <ul> <li>Model 2023</li> <li>OLED touchscreen</li> <li>Battery life up to 36 hours</li> <li>NFC, Wi-Fi, GPS, Bluetooth</li> <li>Suitable for swimming</li> </ul> The most durable and capable Apple Watch exceeds the limits once again. It features the brand new S9 SiP. A magical new way to use your watch without touching the screen. The brightest display ever from Apple. Now you can choose a case and strap combination that is carbon-neutral.<br> The Apple Watch Ultra 2 is designed for unparalleled performance. The lightweight titanium case is sturdy and resistant to corrosion, and it is raised to protect the sapphire crystal from impacts on the edges.<br> The largest and brightest display Apple Watch With the support of the brand new S9 SiP, the Always-On Retina display has 3000 nits at its peak, making it even more readable in bright sunlight.<br> In low-light conditions, it reduces to 1 nit. Night mode is now automatically activated in the dark. The large display gives you space to customize your view to fit almost any activity. And a new watch face displays dynamic information like altitude, depth, or seconds.<br>', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/1.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/2.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/3.png', 
'assets/imgs/offers/Apple Watch Ultra Titanium 49mm GPS + Cellular - Green Alpine Loop Medium/4.png', 798.99, 0, 'Green Alpine Loop Medium');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver', 'Smartwatch', 
'Descriptions: <ul> <li>Model 2023</li> <li>MIP touchscreen</li> <li>Battery life up to 14 days</li> <li>NFC, Wi-Fi, GPS, Bluetooth</li> <li>Suitable for swimming</li> </ul> <br> Conquer every hour of the day with advanced workout features, 24/7 health and wellness monitoring, and over a month of battery life with the Power Sapphire solar charging lens, all combined in a durable watch frame designed for smaller wrists.<br> You have up to 14 days of operation on a smartwatch with 3 hours of solar charging in direct sunlight (50,000 lux) per day, and up to 46 hours of operation with GPS and solar charging (requires continuous use for the entire period under 50,000 lux conditions).<br> Variable lens intensities and a red safety light provide you with greater awareness while training in the dark, giving you sufficient illumination when you need it. The lens flashing function can even match your running pace.', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/1.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/2.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/3.png', 
'assets/imgs/offers/Smartwatch Garmin Fenix 7S Pro Solar Edition 42mm - Silver/4.png', 719.00, 0, 'Silver');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Garmin Instinct 2X Solar 50mm - Graphite', 'Smartwatch', 
'Descriptions:<br> The The Garmin Instinct 2X Solar is a smartwatch with a 1.1-inch screen that can be connected to a mobile (smartphone) Android or iOS. It has NFC for contactless payments (where supported) or pairing between devices. It is mainly aimed at those interested in a smartwatch with multiple functions and capabilities for monitoring their health and physical condition. It can be used for swimming in the sea και between its capabilities, it stands out for its GPS, step and distance tracking, and built-in heart rate monitor.<br><br> With the heart rate monitor, the Instinct 2X Solar will be able to accurately detect your heart rate 24 hours a day and identify even small changes, knowing each of your heartbeats well.<br> With the step tracking sensor, you will be able to know the distance you have traveled as well as the steps you have taken. Additionally, GPS allows for satellite-based tracking of your geographical position, so you can accurately monitor your route.<br><br> Its waterproofing provides protection in all challenging conditions. It can be worn carefree for everyday use or when swimming, as it has the same waterproof capability as traditional high-end sports watches.<br> Finally, it can be used in various activities such as running, cycling, swimming, and hiking as it has pre-loaded sports profiles, each of which includes specialized measurements and indicators.', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/1.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/2.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/3.png', 
'assets/imgs/offers/Smartwatch Garmin Instinct 2X Solar 50mm - Graphite/4.png', 450.00, 0, 'Graphite');

INSERT INTO `products` VALUES (NULL, 'Smartwatch Huawei Watch GT 4 41mm Gold', 'Smartwatch', 
'Descriptions: <ul> <li>Model 2023</li> <li>466x466 AMOLED touch screen</li> <li>HUAWEI TruSeen 5.5+</li> <li>Battery life up to 14 days</li> <li>Bluetooth 5.2</li> </ul> <br> Fashion never stops. The new Huawei Watch GT 4 with its brand new octagonal design and floating pearl design, larger AMOLED screen, is suitable for most occasions.<br> With improved 24/7 health management, battery life up to 2 weeks, and a scientific exercise coach, it sets new limits in the smartwatch category.<br> Perfectly rounded and innovative - you wont be able to do without this watch! With an octagonal design in the 46 mm watches and a hanging design in the 41 mm watches, wearing the Huawei Watch GT 4 will draw attention wherever you go<br> With its lightweight design and 13% higher screen-to-body ratio, surrounded by a slim frame, this watch has the perfect fit and beautiful appearance.', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/1.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/2.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/3.png', 
'assets/imgs/offers/Smartwatch Huawei Watch GT 4 41mm Gold/4.png', 299.00, 0, 'Gold');

INSERT INTO `products` VALUES (NULL, 'Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black', 'Smartphone', 
'Descriptions: <ul> <li>Display AMOLED 6,7 " 120 Hz</li> <li>Dual rear camera 100MP/4K 30 FPS</li> <li>Battery 5000mAh (18mins/50%)</li> <li>Fast Charging 67W</li> Model 2023 with NFC support, MediaTek Dimensity 7050 processor, 100MP OIS ProLight Camera, Dolby Atmos speakers. </ul>', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/1.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/2.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/3.png', 
'assets/imgs/offers/!Smartphone Realme 11 Pro 5G 256GB Dual Sim - Astral Black/4.png', 379.90, 0, 'Astral Black');

INSERT INTO `products` VALUES (NULL, 'Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black', 'Smartphone', 
'Descriptions: <ul> <li>Release Date 2022</li> <li>Screen 6.1''/2340 x 1080/120 Hz</li> <li>NFC Connectivity</li> <li>Exynos 2200 Processor</li> <li>Triple Rear Camera 50MP/8K 24fps</li> <li>Battery 3700mAh/25W</li> </ul>', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/1.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/2.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/3.png', 
'assets/imgs/offers/!Smartphone Samsung Galaxy S22 5G 256GB - Phantom Black/4.png', 749.00, 0, 'Phantom Black');

INSERT INTO `products` VALUES (NULL, 'Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black', 'Smartphone', 
'Descriptions: <ul> <li>Model 2023</li> <li>6.1" OLED Display 2520x1080/120 Hz</li> <li>Snapdragon 8 Gen 2 Processor</li> <li>NFC Support</li> <li>Dual Rear Camera 48MP</li> <li>5000 mAh Battery</li> </ul>', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Sony Xperia 5 V 5G 128GB Dual Sim - Black/4.png', 899.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent', 'Smartphone', 
'Descriptions: <ul> <li>Model 2023</li> <li>6.78" IPS Display/2040 x 1080/90 Hz</li> <li>NFC Support</li> <li>Mediatek Helio G88 Processor</li> <li>Triple Rear Camera 50MP/1080p 30fps</li> <li>5010 mAh Battery</li> </ul>', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/1.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/2.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/3.png', 
'assets/imgs/offers/!Smartphone TCL 40 NxtPaper 256GB Dual Sim - Opalescent/4.png', 179.90, 0, 'Opalescent');

INSERT INTO `products` VALUES (NULL, 'Smartphone Ulefone Armor 12S 128GB Dual Sim - Black', 'Smartphone', 
'"X" Design The idea "X" representing exploration, technology, and the future evolved from the "fishbone" and integrated into the sides of the phone and the speaker grille, Ulefones cutting-edge new design philosophy. Quite slim<br> As a durable phone equipped with a large battery and stable performance, the Armor 12S offers a lightweight feel in the hand, just like popular smartphones. And it balances strong performance and long-lasting battery life, making the phone quite slim.<br> Great durability<br> Passed the strict MIL-STD-810H standard and IP68/IP69K protection, the Armor 12S is not afraid of tough situations, with drop resistance up to 1.5m height and waterproof for 30 minutes up to 1.5m depth, it will be by your side in any challenging environment.<br> Quad Camera 50MP<br> The quad rear camera allows you to capture every enjoyable moment of life. The main 50MP camera takes faithfully clear and detailed photos. Choose between the 8MP wide-angle camera for magnificent landscape shots, the 2MP macro lens for close-up shots, while the depth sensor takes your photography to new levels.<br> Powerful processor<br> It comes with the MediaTek Helio G99 chipset combined with an octa-core CPU with 2*Cortex-A76 clocked up to 2.2 GHz and 6*Cortex-A55 clocked up to 2.0 GHz. The powerful ARM G57-MC2 GPU provides you with a smooth gaming experience. Such a powerful chipset supports online chats, video playback, professional document management, games, and photos.<br> Storage Space & RAM<br> It includes 8GB of RAM and can reach up to 5GB of virtual memory, thus reaching a total memory of 13GB, making the phone quite fast and able to run music, video, games, and whatever else you need to complete your day smoothly. All of this is stored in the 128GB internal memory it has, but in case you need more space, there is the possibility of expanding it up to 1TB through the SD Card slot.<br> Large battery<br> The Armor 12S with a 5180mAh battery lasts all day without any problem, supports wired fast charging of 18W and wireless charging of 15W.<br> <ul> <li>Package Contents</li> <li>Ulefone Armor 12s</li> <li>15W Charger</li> <li>USB Type-A to Type-C Cable</li> <li>Screen Protector</li> <li>Strap</li> <li>User Manual</li> </ul>', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Ulefone Armor 12S 128GB Dual Sim - Black/4.png', 319.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black', 'Smartphone', 
'Descriptions: <ul> <li>Model 2023</li> <li>Screen 6.67"/2712 x 1220/144Hz</li> <li>NFC Support</li> <li>Mediatek Dimensity 820 Processor</li> <li>Triple Rear Camera 50MP</li> <li>5000mAh Battery</li> </ul> Professional Leica optical lens<br> Carefully tuned for enhanced clarity<br> Inheriting the professional quality of Leica, the lens optical quality has been adjusted and improved at the source, offering richer colors, extremely high resolution, effectively solving ghosting and reflection, and producing excellent performance even in extreme environments.<br> Main camera Leica<br> In combination with an oversized sensor to give a smoother texture to your photos and to beautifully preserve the stories in every moment of light and shadow.<br> Leica Telephoto Lens<br> Equivalent to a 50mm focal length, the extremely large f/1.9 aperture creates a bokeh comparable to that of professional SLRs to capture people more vividly.<br> Ultra-wide camera Leica<br> The equivalent focal distance of 15mm creates an amazing sense of space, capturing more wonders and presenting a greater intensity of character in every shot.<br> Two Leica camera styles<br> Two tones for excellent choices<br> The Leica image quality is highly appreciated in the photography communities, and we continue that here with the wide range of P3 colors, which can capture 25% more colors, transforming the aesthetics of the photos.<br> Authentic Leica appearance<br> The authentic style of Leica with clear light and shadow in three-dimensional images makes you feel like you are really there.<br> Leica Vibrant Look<br> Cutting-edge expression based on tradition, with bright tones and vibrant and colorful overflowing with vitality.<br> Customized Leica photographic styles<br> To enjoy even greater freedom with your creations<br> Inspired by two photographic styles, you can adjust the tones, hue, and texture yourself for better image quality and unlock more creative image capabilities with the aesthetics of Leica.<br> Main Camera System<br> Unique optical angles and enhanced support for blur adjustment<br> 35mm Documentary lens<br> Close to the human eye s field of view, taking into account both the subject and the environment.<br> 50mm Swirly bokeh lens<br> Can clearly describe the subject<br> Slightly swirling background for a romantic feel<br> 90mm Soft focus lens<br> Portraits with a wide aperture highlight the subject and are better suited for close-ups.', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/1.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/2.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/3.png', 
'assets/imgs/offers/!Smartphone Xiaomi 13T 5G 256GB Dual Sim - Black/4.png', 699.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black', 'Smartphone', 
'Description: The thinnest Note ever made<br> Sensor 50MP Sony IMX766<br> Bring out your inner professional photographer with the top-of-the-line IMX766 sensor<br> Blur-free image blurring with optical image stabilization<br> Take stunning low-light photos<br> 8MP Extremely wide<br> With 120° field of view<br> 16MP Front camera<br> Put your best face forward!<br> Experience stunning graphics on the 120Hz Pro AMOLED Screen with variable refresh rate that automatically changes to match the content on the screen<br> Turn up the sound!<br> Dual Stereo Speakers<br> Strong performance<br> MediaTek Dimensity 1080 5G<br> All-day energy in just 15 minutes!<br> 5000 mAh Battery<br> Video playback 17 hours<br> VoLTE calling 29 hours<br> Music playback 134 hours<br> Web surfing  18,5 hours<br> Package Contents<br> Redmi Note 12 Pro 5G<br> Charger 67W<br> USB Type-C cable<br> SIM extraction tool<br> Protection Case<br> Quick Start Guide<br> Warranty card<br>', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/1.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/2.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/3.png', 
'assets/imgs/offers/!Smartphone Xiaomi Redmi Note 12 Pro 5G 128GB - Midnight Black/4.png', 299.89, 0, 'Midnight Black');


INSERT INTO `products` VALUES (NULL, 'Apple iPhone 13 512GB - Midnight', 'Smartphone', 
'Descriptions: <ul> <li>2021 Model</li> <li>Super Retina XDR OLED 6.1" Display</li> <li>NFC Support</li> <li>Apple A15 Bionic chip</li> <li>12MP/4K 60fps Dual Rear Camera</li> <li>3240mAh Battery (50% in 30min)</li> </ul>', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/1.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/2.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/3.png', 
'assets/imgs/offers/!Apple iPhone 13 512GB - Midnight/4.png', 1088.99, 0, 'Midnight');

-- handsfree
INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay E8 3rd Gen In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 7 hours</li> <li>Operating with Charging Case 35 hours</li> <li>Wireless Charging</li> <li>Passive Noise Cancelling</li> <li>Sweat and Water Resistant</li> <li>Bluetooth 5.1</li> </ul> <br> The Bang & Olufsen Beoplay E8 headphones are designed for people who are looking for high-quality audio performance and style. They are designed for people who demand the best possible sound quality from their headphones and have a high level of aesthetics and aesthetic value.<br> In terms of price, the Beoplay E8 series is aimed at a more demanding and exclusive audience who are willing to pay for the ultimate listening experience and their refined style.<br> They provide fast wireless charging and microphone noise reduction during calls, as well as high fidelity sound.<br> Up to 35 hours of gameplay<br> The Beoplay E8 3rd Gen offers top battery performance in the market. With 7 hours of playback from the earphones and four additional charges in the case, the Beoplay E8 3rd Gen provides up to 35 hours* of playback at moderate listening levels.', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay E8 3rd Gen In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay E8 3rd Gen In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay E8 3rd Gen In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay E8 3rd Gen In-ear Bluetooth Handsfree/6.png', 349.99, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay EQ In-ear Bluetooth Handsfree Nordic Ice', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 8 hours</li> <li>Operating with Charging Case 20 hours</li> <li>Bluetooth 5.2</li> <li>Active Noise Cancellation</li> <li>Sweat Resistance with IP57</li> <li>Wireless Charging</li> </ul> <br> The Bang & Olufsen Beoplay EX headphones are designed for people looking for high-quality and high-performance headphones. They are suitable for listening to music and other audio applications, such as games or movies, in noisy environments.<br> In addition, the Beoplay EX offers exceptional appearance and style, and is suitable for people looking for reliable headphones that provide high-quality performance.<br> The Beoplay EX features Active Noise Cancellation to eliminate any unwanted noise. Their waterproof construction and comfortable fit bring you closer to the moment, regardless of the weather or your activity.<br>', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EQ In-ear Bluetooth Handsfree Nordic Ice/1.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EQ In-ear Bluetooth Handsfree Nordic Ice/2.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EQ In-ear Bluetooth Handsfree Nordic Ice/3.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EQ In-ear Bluetooth Handsfree Nordic Ice/4.png', 419.00, 0, 'Nordic Ice');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Anthracite Oxygen', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 8 hours</li> <li>Operating with Charging Case 20 hours</li> <li>Bluetooth 5.2</li> <li>Active Noise Cancellation</li> <li>Sweat Resistance with IP57</li> <li>Wireless Charging</li> </ul> <br> The Bang & Olufsen Beoplay EX headphones are designed for people looking for high-quality and high-performance headphones. They are suitable for listening to music and other audio applications, such as games or movies, in noisy environments.<br> In addition, the Beoplay EX offers exceptional appearance and style, and is suitable for people looking for reliable headphones that provide high-quality performance.<br> The Beoplay EX features Active Noise Cancellation to eliminate any unwanted noise. Their waterproof construction and comfortable fit bring you closer to the moment, regardless of the weather or your activity.<br>', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Anthracite Oxygen/1.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Anthracite Oxygen/2.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Anthracite Oxygen/3.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Anthracite Oxygen/4.png', 319.00, 0, 'Anthracite Oxygen');

INSERT INTO `products` VALUES (NULL, 'Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Gold Tone', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 8 hours</li> <li>Operating with Charging Case 20 hours</li> <li>Bluetooth 5.2</li> <li>Active Noise Cancellation</li> <li>Sweat Resistance with IP57</li> <li>Wireless Charging</li> </ul> <br> The Bang & Olufsen Beoplay EX headphones are designed for people looking for high-quality and high-performance headphones. They are suitable for listening to music and other audio applications, such as games or movies, in noisy environments.<br> In addition, the Beoplay EX offers exceptional appearance and style, and is suitable for people looking for reliable headphones that provide high-quality performance.<br> The Beoplay EX features Active Noise Cancellation to eliminate any unwanted noise. Their waterproof construction and comfortable fit bring you closer to the moment, regardless of the weather or your activity.<br>', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Gold Tone/5.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Gold Tone/1.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Gold Tone/2.png', 
'assets/imgs/products/handsfree/Bang & Olufsen Beoplay EX In-ear Bluetooth Handsfree Gold Tone/3.png', 319.00, 0, 'Gold Tone');

INSERT INTO `products` VALUES (NULL, 'Beats Powerbeats Pro In-ear Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 9 hours</li> <li>Operating with Charging Case 24 hours</li> <li>Sweat Resistance</li> <li>Fast Charging</li> <li>Apple H1 chip</li> </ul> <br> The Beats Powerbeats Pro headphones are designed for athletes and demanding users who are looking for headphones with high sound quality and stability during exercise and activities. These headphones feature a revolutionary design that keeps the headphones in your ears while you work out, while also providing sweat and moisture resistance.<br> They also offer excellent sound quality, with powerful bass and clear highs. They have a long battery life and are extremely user-friendly, with touch controls on the headphones for easy access to music playback and answering phone calls. The Powerbeats Pro are ideal for athletes and those who want to listen to music during exercise or their activities without worrying about the headphones falling out or being bothered by cables.<br> High-performance headphones<br> The adjustable and fixed ear loops are customizable for greater comfort and stability. Additionally, they are built to withstand sweat and water, so you can take it to the next level. Another voice accelerometer and multiple microphones target your voice and filter out background noise.<br> Professional Sound<br> The Powerbeats Pro features powerful, balanced sound thanks to a fully redesigned audio system that offers clear sound reproduction, improved clarity, and enhanced dynamic range. Additionally, its design is ergonomic.', 
'assets/imgs/products/handsfree/Beats Powerbeats Pro In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Beats Powerbeats Pro In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Beats Powerbeats Pro In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Beats Powerbeats Pro In-ear Bluetooth Handsfree/5.png', 282.56, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bose QuietComfort Earbud Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 6 hours</li> <li>Operating with Charging Case 18 hours</li> <li>Sweat Resistance with IPX4</li> <li>Active Noise Cancellation</li> <li>Fast Charging</li> <li>Bluetooth 5.1</li> </ul> The Bose QuietComfort headphones are designed for those seeking exceptional sound performance and want to isolate sound from their surroundings. They are ideal for professionals who travel frequently and need to work or relax in a noisy environment. They are also suitable for music listeners who seek high-quality sound and want to enjoy their music without the annoyance of noise from their surroundings.<br> They produce clear sound and rich, deep bass, allowing you to hear all the details of your favorite music, even the singer s sharp breath while performing the piece. They offer you an immersive listening experience unlike any other wireless headphone, even when it comes to podcasts, videos, or calls.<br> Noise cancellation headphones<br> Using a combination of patented active and passive noise cancellation innovations, the Bose QuietComfort Earbuds feature all the noise cancellation capabilities, so you can listen to your favorite music or talk without interference from external noise!',
'assets/imgs/products/handsfree/Bose QuietComfort Earbud Bluetooth Handsfree/6.png', 
'assets/imgs/products/handsfree/Bose QuietComfort Earbud Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Bose QuietComfort Earbud Bluetooth Handsfree/2.png',
'assets/imgs/products/handsfree/Bose QuietComfort Earbud Bluetooth Handsfree/5.png', 416.56, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Bose QuietComfort Ultra Earbuds Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 6 hours</li> <li>Operating with Charging Case 18 hours</li> <li>Sweat Resistance with IPX4</li> <li>Active Noise Cancellation</li> <li>Fast Charging</li> <li>Bluetooth 5.1</li> </ul> <br> The Bose QuietComfort headphones are designed for those seeking exceptional sound performance and want to isolate sound from their surroundings. They are ideal for professionals who travel frequently and need to work or relax in a noisy environment. They are also suitable for music listeners who seek high-quality sound and want to enjoy their music without the annoyance of noise from their surroundings.<br> They produce clear sound and rich, deep bass, allowing you to hear all the details of your favorite music, even the singer s sharp breath while performing the piece. They offer you an immersive listening experience unlike any other wireless headphone, even when it comes to podcasts, videos, or calls.<br> Noise cancellation headphones<br> Using a combination of patented active and passive noise cancellation innovations, the Bose QuietComfort Earbuds feature all the noise cancellation capabilities, so you can listen to your favorite music or talk without interference from external noise!',
'assets/imgs/products/handsfree/Bose QuietComfort Ultra Earbuds Bluetooth Handsfree/6.png', 
'assets/imgs/products/handsfree/Bose QuietComfort Ultra Earbuds Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Bose QuietComfort Ultra Earbuds Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Bose QuietComfort Ultra Earbuds Bluetooth Handsfree/5.png', 416.56, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bose SoundSport Free In-ear Bluetooth Handsfree', 'Handsfree', 
'Description<br><br> Completely wireless, for enjoying absolute freedom of movement.<br> Full and balanced sound, no matter how noisy the gym is.<br> Maximum Bluetooth signal strength, thanks to the modified antenna position.<br> Sweat and rain resistant, using a waterproof mesh on the open ports.<br> The StayHear+ Sport covers on each earbud stay comfortable and secure in place throughout your workout.<br> The "Find My Buds" app helps you locate your earbuds even if you ve misplaced them.',
'assets/imgs/products/handsfree/Bose SoundSport Free In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Bose SoundSport Free In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Bose SoundSport Free In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Bose SoundSport Free In-ear Bluetooth Handsfree/6.png', 390.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree black', 'Handsfree', 
'Description<br><br> The in-ear wireless earphones Bowers & Wilkins Pi7 S2 connect to any device that has bluetooth. They have Active Noise Cancellation (ANC) which blocks external noise in environments such as Mass Transit, so you can hear your music or calls better.<br> Bluetooth headphones have many benefits for their users, including the following:<br> 1. Freedom of movement: You can move freely without having to hold your phone in your hand, allowing you to work, exercise, and engage in other activities or even drive while on a call.<br> 2. Ease of use: Connecting Bluetooth headphones to your device is very simple and quick. Simply enable Bluetooth on your device and connect your headphones. Additionally, most Bluetooth headphones have control buttons on the headphone itself, allowing the user to control their music or answer calls without needing to touch their device.<br> 3. Time-saving: With Bluetooth handsfree, you can perform multiple activities without interrupting your call, allowing you to be more productive.<br> 4. Long battery life: Bluetooth headphones usually have a built-in battery that can provide several hours of continuous use with just one charge. This means you dont have to worry about having to charge your headphones frequently.',
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree black/1.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree black/2.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree black/3.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree black/4.png', 389.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree white', 'Handsfree', 
'Description<br><br> The in-ear wireless earphones Bowers & Wilkins Pi7 S2 connect to any device that has bluetooth. They have Active Noise Cancellation (ANC) which blocks external noise in environments such as Mass Transit, so you can hear your music or calls better.<br> Bluetooth headphones have many benefits for their users, including the following:<br> 1. Freedom of movement: You can move freely without having to hold your phone in your hand, allowing you to work, exercise, and engage in other activities or even drive while on a call.<br> 2. Ease of use: Connecting Bluetooth headphones to your device is very simple and quick. Simply enable Bluetooth on your device and connect your headphones. Additionally, most Bluetooth headphones have control buttons on the headphone itself, allowing the user to control their music or answer calls without needing to touch their device.<br> 3. Time-saving: With Bluetooth handsfree, you can perform multiple activities without interrupting your call, allowing you to be more productive.<br> 4. Long battery life: Bluetooth headphones usually have a built-in battery that can provide several hours of continuous use with just one charge. This means you dont have to worry about having to charge your headphones frequently.',
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree white/1.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree white/2.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree white/3.png', 
'assets/imgs/products/handsfree/Bowers & Wilkins Pi7 S2 In-ear Bluetooth Handsfree white/4.png', 389.00, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Denon PerL Pro In-ear Bluetooth Handsfree', 'Handsfree', 
'Description:<br> The in-ear wireless earphones Denon PerL Pro connect to any device that has bluetooth. They are a suitable choice for running or other sports activities, as they have protection against sweat and rain. <br> They can be connected to 2 devices simultaneously, allowing for easy switching between them. They have Active Noise Cancellation (ANC) which blocks external noise in environments such as Mass Transit, so you can hear your music or calls better, while the microphone noise reduction function helps your conversation partners hear you clearly. They come with a carrying and charging case for the earphones.<br> Bluetooth headphones have many benefits for their users, including the following:<br> 1. Freedom of movement: You can move freely without having to hold your phone in your hand, allowing you to work, exercise, and engage in other activities or even drive while on a call.<br> 2. Ease of use: Connecting Bluetooth headphones to your device is very simple and quick. Simply enable Bluetooth on your device and connect your headphones. Additionally, most Bluetooth headphones have control buttons on the headphone itself, allowing the user to control their music or answer calls without needing to touch their device.<br> 3. Time-saving: With Bluetooth handsfree, you can perform multiple activities without interrupting your call, allowing you to be more productive.<br> 4. Long battery life: Bluetooth headphones usually have a built-in battery that can provide several hours of continuous use with just one charge. This means you dont have to worry about having to charge your headphones frequently.<br> Operating Time: 8hrs<br> Operation Time with Charging Case: 32hrs<br> Fast Charging',
'assets/imgs/products/handsfree/Denon PerL Pro In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Denon PerL Pro In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Denon PerL Pro In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Denon PerL Pro In-ear Bluetooth Handsfree/4.png', 349.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Huawei FreeBuds Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time 9 hours</li> <li>Operating with Charging Case 40 hours</li> <li>Bluetooth® 5.3</li> <li>10min Charging - 3 hours playtime</li> </ul> <br> With impressive finish and ergonomic design, the HUAWEI FreeBuds SE 2 Bluetooth® 5.3 headphones offer a unique True Wireless user experience.<br> Featuring dynamic 10mm drivers that achieve exceptional distortion elimination, a weight of no more than 3.8 grams (± 0.2g) per earphone, and a battery life of up to 40 hours with the case, they are ideal for everyday use - even under adverse conditions - as they carry an IP54 certification. Thinner than ever, they fit easily in your ear and stay there, thanks to their proven design.<br> Environmentally friendly (SGS Grade), with Touch Controls and compatible with the HUAWEI AI Life app, they automatically connect to your HUAWEI smartphone (applies to devices with EMUI10 or later), covering all your communication and entertainment needs!<br> Wireless for ultimate peace<br> Charge the headphones for 10 minutes before your travels and listen for up to 3 hours. With a full charge, the headphones can last for up to 9 hours of listening, and with repeated charges in the case, they can support up to 40 hours of listening. The dynamic Bluetooth® 5.3 connections keep the sound and image in sync. The dust and splash resistance IP54 keeps the headphones durable during workouts and outdoors.',
'assets/imgs/products/handsfree/Huawei FreeBuds Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Huawei FreeBuds Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Huawei FreeBuds Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Huawei FreeBuds Bluetooth Handsfree/4.png', 302.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Meters Linx Set In-ear Bluetooth Handsfree', 'Handsfree', 
'Description:<br><br> The in-ear wireless earphones Meters Linx Set connect to any device that has bluetooth. They are a suitable choice for running or other sports activities, as they have protection against sweat and rain. They come with a carrying and charging case for the earphones.<br> Bluetooth headphones have many benefits for their users, including the following:<br> 1. Freedom of movement: You can move freely without having to hold your phone in your hand, allowing you to work, exercise, and engage in other activities or even drive while on a call.<br> 2. Ease of use: Connecting Bluetooth headphones to your device is very simple and quick. Simply enable Bluetooth on your device and connect your headphones. Additionally, most Bluetooth headphones have control buttons on the headphone itself, allowing the user to control their music or answer calls without needing to touch their device.<br> 3. Time-saving: With Bluetooth handsfree, you can perform multiple activities without interrupting your call, allowing you to be more productive.<br> 4. Long battery life: Bluetooth headphones usually have a built-in battery that can provide several hours of continuous use with just one charge. This means you dont have to worry about having to charge your headphones frequently.<br> Operating Time: 6hrs<br> Operation Time with Charging Case: 24hrs',
'assets/imgs/products/handsfree/Meters Linx Set In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Meters Linx Set In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Meters Linx Set In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Meters Linx Set In-ear Bluetooth Handsfree/4.png', 330.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Plantronics 60+ UC (USB-A) In-ear Bluetooth Handsfree', 'Handsfree', 
'Description:<br><br> The Voyager Free 60 Series is a hybrid work solution. With ANC and a three-microphone array for voice isolation, you can be sure that both sides of the call are crystal clear. The touch screen charging case (Voyager Free 60+ UC) puts control in your hands, so you can instantly connect with your team, playlists, podcasts, and even in-flight entertainment.<br> Your IT department will also approve it because it is certified to work with the latest conferencing platforms, including Microsoft Teams and Zoom, and can be centrally managed from anywhere in the world.<br> With a array of three microphones in each earphone that triangulate your voice and minimize ambient noise, you are powerful and clear wherever you make your calls. With WindSmart technology, you can continue your conversations as you go about your day without interruption.<br> Whether it s a busy café or a busy commute, forget the chaos around you. The adaptive hybrid ANC automatically adjusts to your usage style and cancels out just the right amount of noise for a quiet and comfortable experience. With the two-setting transparency mode, you can tune back into your natural environment without taking off your headphones.',
'assets/imgs/products/handsfree/Plantronics 60+ UC (USB-A) In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Plantronics 60+ UC (USB-A) In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Plantronics 60+ UC (USB-A) In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Plantronics 60+ UC (USB-A) In-ear Bluetooth Handsfree/4.png', 345.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Plantronics Voyager Free 60+ UC (USB-ATeams) In-ear Bluetooth Handsfree', 'Handsfree', 
'Description<br><br> The Voyager Free 60 Series is a hybrid work solution. With ANC and a three-microphone array for voice isolation, you can be sure that both sides of the call are crystal clear. The touch screen charging case (Voyager Free 60+ UC) puts control in your hands, so you can instantly connect with your team, playlists, podcasts, and even in-flight entertainment.<br> Your IT department will also approve it because it is certified to work with the latest conferencing platforms, including Microsoft Teams and Zoom, and can be centrally managed from anywhere in the world.<br> With a array of three microphones in each earphone that triangulate your voice and minimize ambient noise, you are powerful and clear wherever you make your calls. With WindSmart technology, you can continue your conversations as you go about your day without interruption.<br> Whether it s a busy café or a busy commute, forget the chaos around you. The adaptive hybrid ANC automatically adjusts to your usage style and cancels out just the right amount of noise for a quiet and comfortable experience. With the two-setting transparency mode, you can tune back into your natural environment without taking off your headphones.',
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC (USB-ATeams) In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC (USB-ATeams) In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC (USB-ATeams) In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC (USB-ATeams) In-ear Bluetooth Handsfree/4.png', 397.00, 0, 'White');

INSERT INTO `products` VALUES (NULL, 'Plantronics Voyager Free 60+ UC In-ear Bluetooth Handsfree', 'Handsfree', 
'Description<br><br> The Voyager Free 60 Series is a hybrid work solution. With ANC and a three-microphone array for voice isolation, you can be sure that both sides of the call are crystal clear. The touch screen charging case (Voyager Free 60+ UC) puts control in your hands, so you can instantly connect with your team, playlists, podcasts, and even in-flight entertainment.<br> Your IT department will also approve it because it is certified to work with the latest conferencing platforms, including Microsoft Teams and Zoom, and can be centrally managed from anywhere in the world.<br> With a array of three microphones in each earphone that triangulate your voice and minimize ambient noise, you are powerful and clear wherever you make your calls. With WindSmart technology, you can continue your conversations as you go about your day without interruption.<br> Whether it s a busy café or a busy commute, forget the chaos around you. The adaptive hybrid ANC automatically adjusts to your usage style and cancels out just the right amount of noise for a quiet and comfortable experience. With the two-setting transparency mode, you can tune back into your natural environment without taking off your headphones.',
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC In-ear Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC In-ear Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC In-ear Bluetooth Handsfree/3.png', 
'assets/imgs/products/handsfree/Plantronics Voyager Free 60+ UC In-ear Bluetooth Handsfree/4.png', 374.00, 0, 'Black');

INSERT INTO `products` VALUES (NULL, 'Samsung Galaxy Buds Bluetooth Handsfree', 'Handsfree', 
'Descriptions: <ul> <li>Operating Time: 5hrs</li> <li>Operation with Charging Case: 18hrs</li> <li>Active Noise Cancellation</li> <li>Fast Charging</li> <li>Wireless Charging (Qi)</li> </ul> <br> The Samsung Galaxy Buds2 Pro are aimed at users looking for a wireless headset with advanced features and excellent sound quality. They are built using voice startup technologies, active noise cancellation (ANC) and touch mode.<br> Amazing Hi-Fi sound in your ear<br> Seamless connectivity<br> Comfortable fit<br> 24-bit Hi-Fi Sound<br> Hear sound as it should be, wirelessly.<br> 2 way speakers for wide frequency response<br> Woofer delivers deeper bass<br> Tweeter produces intense treble<br> The Samsung Galaxy Buds2 Pro are aimed at users looking for a wireless headset with advanced features and excellent sound quality. They are built using voice startup technologies, active noise cancellation (ANC) and touch mode.<br> Amazing Hi-Fi sound in your ear<br> Seamless connectivity<br> Comfortable fit<br>',
'assets/imgs/products/handsfree/Samsung Galaxy Buds Bluetooth Handsfree/1.png', 
'assets/imgs/products/handsfree/Samsung Galaxy Buds Bluetooth Handsfree/2.png', 
'assets/imgs/products/handsfree/Samsung Galaxy Buds Bluetooth Handsfree/6.png', 
'assets/imgs/products/handsfree/Samsung Galaxy Buds Bluetooth Handsfree/7.png', 353.00, 0, 'Black');

--  Smartphones
INSERT INTO `products` VALUES (NULL, 'Apple iPhone 12 5G 128GB - Black', 'Smartphone', 
'Descriptions: <ul> <li>Model: 2023</li> <li>Super Retina XDR 6.1" Display</li> <li>NFC Support</li> <li>A16 Bionic Processor</li> <li>Dual Rear Camera 48MP/4K 60fps</li> </ul> <br> Dynamic Island<br> When things emerge.<br> The Dynamic Island displays notifications and activities happening now - so you don t miss them while doing something else. You can track the location of your Taxi, see who is calling you, check the status of your flight, and much more.<br> Creating color through chemistry.<br> The extremely thin metallic ions incorporate color into the glass — with a unique composition for each color. Then, the glass is polished with nanocrystalline particles and etched to create a textured matte finish.<br> A design that feels right.<br> The high-quality aerodynamic aluminum frame is extremely durable, and the newly shaped edges feel even better in your hand.<br> 75% recycled aluminum in the casing', 
'assets/imgs/products/smartphones/!Apple iPhone 12 5G 128GB - Black/1.png', 
'assets/imgs/products/smartphones/!Apple iPhone 12 5G 128GB - Black/2.png', 
'assets/imgs/products/smartphones/!Apple iPhone 12 5G 128GB - Black/3.png', 
'assets/imgs/products/smartphones/!Apple iPhone 12 5G 128GB - Black/4.png', 890.00, 0, 'Black');