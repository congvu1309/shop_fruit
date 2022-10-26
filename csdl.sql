--bang admin
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `admin` ADD PRIMARY KEY (`admin_id`);
ALTER TABLE `admin` MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `admin` (`admin_id`,`admin_name`,`admin_phone`,`admin_address`,`admin_email`,`admin_username`,`admin_password`)
VALUES ('1','Admin','123456789','Hà Nội','congvu@gmail.com','admin','1');


--bang danh muc
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `category` ADD PRIMARY KEY (`category_id`);
ALTER TABLE `category` MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;


--bang san pham
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_info` tinytext NOT NULL,
  `product_content` text NOT NULL,
  `product_status` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `product` ADD PRIMARY KEY (`product_id`);
ALTER TABLE `product` MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;


--bang khach hang
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

ALTER TABLE `customer` ADD PRIMARY KEY (`customer_id`);
ALTER TABLE `customer` MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;


--bang bai viet
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL,
  `post_name` tinytext NOT NULL,
  `post_img` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

ALTER TABLE `post` ADD PRIMARY KEY (`post_id`);
ALTER TABLE `post` MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;


--bang nhan su
CREATE TABLE IF NOT EXISTS `personnel` (
  `personnel_id` int(11) NOT NULL,
  `personnel_name` varchar(50) NOT NULL,
  `personnel_img` varchar(50) NOT NULL,
  `personnel_sex` int(11) NOT NULL,
  `personnel_phone` varchar(11) NOT NULL,
  `personnel_address` varchar(200) NOT NULL,
  `personnel_email` varchar(50) NOT NULL,
  `personnel_location` int(11) NOT NULL,
  `personnel_branch` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

ALTER TABLE `personnel` ADD PRIMARY KEY (`personnel_id`);
ALTER TABLE `personnel` MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT;


--bang lien he
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_phone` varchar(11) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_address` varchar(11) NOT NULL,
  `contact_content` varchar(50) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

ALTER TABLE `contact` ADD PRIMARY KEY (`contact_id`);
ALTER TABLE `contact` MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;


--bang gio hang
CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `quanity` int(30) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cart` ADD PRIMARY KEY (`cart_id`);
ALTER TABLE `cart` MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;


