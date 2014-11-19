<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "config_sql.php" );

$tbl_name1 = "admins"; //tablename 1.
$tbl_name2 = "desks"; //tablename 2.
$tbl_name3 = "desk_log"; //tablename 3.
$tbl_name4 = "rooms"; //tablename 4.
$tbl_name5 = "room_log"; //tablename 5.
$tbl_name6 = "startups"; //tablename 6.
$tbl_name7 = "startup_members"; //tablename 7.
$tbl_name8 = "spaces"; //tablename 8.
$tbl_name9 = "sign_auth"; //tablename 9.
$tbl_name10 = "invoice"; //tablename 10.
$tbl_name11 = "purchase_order"; //tablename 11.
$tbl_name12 = "receipt"; //tablename 12.
$tbl_name13 = "general"; //tablename 13.
//$tbl_name14 = "reimbursement_invoice"; //tablename 14.

//Creating table "admins".
$sql_tbl_1 = "CREATE TABLE `$tbl_name1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_1 = $mysqli->query( $sql_tbl_1 );

$pass = md5('password');
$mysqli->query("INSERT INTO $tbl_name1 values ('', 'admin@example.com', '{$pass}', 'Test', 'User')");

//Creating table "desks".
$sql_tbl_2 = "CREATE TABLE `$tbl_name2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `space` varchar(20) NOT NULL,
  `row` int(11) NOT NULL,
  `column` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_2 = $mysqli->query( $sql_tbl_2 );

//Creating table "desk_log".
$sql_tbl_3 = "CREATE TABLE `$tbl_name3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desk_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_3 = $mysqli->query( $sql_tbl_3 );

//Creating table "rooms".
$sql_tbl_4 = "CREATE TABLE `$tbl_name4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `length` varchar(15) NOT NULL,
  `width` varchar(15) NOT NULL,
  `area` varchar(15) NOT NULL,
  `desks` int(11) NOT NULL,
  `space` varchar(20) NOT NULL,
  `side` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_4 = $mysqli->query( $sql_tbl_4 );

//Creating table "room_log".
$sql_tbl_5 = "CREATE TABLE `$tbl_name5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `startup_id` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_5 = $mysqli->query( $sql_tbl_5 );

//Creating table "startups".
$sql_tbl_6 = "CREATE TABLE `$tbl_name6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `space` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `joining_date` varchar(15) NOT NULL,
  `ending_date` varchar(15) NOT NULL,
  `employees` int(11) NOT NULL,
  `domain` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `web_address` varchar(60) NOT NULL,
  `p1_id` int(11) NOT NULL,
  `p2_id` int(11) NOT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_6 = $mysqli->query( $sql_tbl_6 );

//Creating table "startup_members".
$sql_tbl_7 = "CREATE TABLE `$tbl_name7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `startup_id` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_7 = $mysqli->query( $sql_tbl_7 );

//Creating table "spaces".
$sql_tbl_8 = "CREATE TABLE `$tbl_name8` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rows` int(11) NOT NULL,
  `floor` varchar(15) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_8 = $mysqli->query( $sql_tbl_8 );

//Creating table "sign_auth".
$sql_tbl_9 = "CREATE TABLE `$tbl_name9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_9 = $mysqli->query( $sql_tbl_9 );

$mysqli->query("INSERT INTO $tbl_name9 values ('', 'Vasu Deva Verma', 'CEO', 'Banyan Intellectual Initiatives')");
$mysqli->query("INSERT INTO $tbl_name9 values ('', 'Srinivas Kollipara', 'COO', 'Banyan Intellectual Initiatives')");
$mysqli->query("INSERT INTO $tbl_name9 values ('', 'Raghu Prodduturi', 'Manager', 'Banyan Intellectual Initiatives')");
$mysqli->query("INSERT INTO $tbl_name9 values ('', 'Manoj Surya', 'Manager', 'Banyan Intellectual Initiatives')");
$mysqli->query("INSERT INTO $tbl_name9 values ('', 'Manikiran', 'Manager', 'Banyan Intellectual Initiatives')");

//Creating table "invoice".
$sql_tbl_10 = "CREATE TABLE `$tbl_name10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `designation` varchar(30),
  `company` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` DATE NOT NULL,
  `left_auth` varchar(60) NOT NULL,
  `right_auth` varchar(60) NOT NULL,
  `checkto` varchar(200),
  `status` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_10 = $mysqli->query( $sql_tbl_10 );

//Creating table "purchase_order_invoice".
$sql_tbl_11 = "CREATE TABLE `$tbl_name11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `noofunit` int(11) NOT NULL,
  `rateperunit` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_11 = $mysqli->query( $sql_tbl_11 );

//Creating table "reciept_invoice".
$sql_tbl_12 = "CREATE TABLE `$tbl_name12` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `total` int(11) NOT NULL,
  `from_date` DATE NOT NULL,
  `to_date` DATE NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_12 = $mysqli->query( $sql_tbl_12 );

//Creating table "general_invoice".
$sql_tbl_13 = "CREATE TABLE `$tbl_name13` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `noofdesk` int(11) NOT NULL,
  `rateperdesk` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_13 = $mysqli->query( $sql_tbl_13 );

if ($result_tbl_1) {
	echo "Table $tbl_name1 succesfully created. \r\n";
} else {
	echo "Table $tbl_name1 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_2) {
	echo "Table $tbl_name2 succesfully created. \r\n";
} else {
	echo "Table $tbl_name2 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_3) {
	echo "Table $tbl_name3 succesfully created. \r\n";
} else {
	echo "Table $tbl_name3 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_4) {
	echo "Table $tbl_name4 succesfully created. \r\n";
} else {
	echo "Table $tbl_name4 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_5) {
	echo "Table $tbl_name5 succesfully created. \r\n";
} else {
	echo "Table $tbl_name5 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_6) {
	echo "Table $tbl_name6 succesfully created. \r\n";
} else {
	echo "Table $tbl_name6 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_7) {
	echo "Table $tbl_name7 succesfully created. \r\n";
} else {
	echo "Table $tbl_name7 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_8) {
  echo "Table $tbl_name8 succesfully created. \r\n";
} else {
  echo "Table $tbl_name8 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_9) {
  echo "Table $tbl_name9 succesfully created. \r\n";
} else {
  echo "Table $tbl_name9 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_10) {
  echo "Table $tbl_name10 succesfully created. \r\n";
} else {
  echo "Table $tbl_name10 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_11) {
  echo "Table $tbl_name11 succesfully created. \r\n";
} else {
  echo "Table $tbl_name11 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_12) {
  echo "Table $tbl_name12 succesfully created. \r\n";
} else {
  echo "Table $tbl_name12 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}

if ($result_tbl_13) {
  echo "Table $tbl_name13 succesfully created. \r\n";
} else {
  echo "Table $tbl_name13 couldnt be created. Check the hostname,username,password,database_name. Maybe another table of the same name already exists \r\n";
}
?>
