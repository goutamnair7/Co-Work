<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "config_sql.php" );

$tbl_name1="admins"; //tablename 1.
$tbl_name2="desks"; //tablename 2.
$tbl_name3="desk_log"; //tablename 3.
$tbl_name4="rooms"; //tablename 4.
$tbl_name5="room_log"; //tablename 5.
$tbl_name6="startups"; //tablename 6.
$tbl_name7="startup_members"; //tablename 7.
$tbl_name8="spaces"; //tablename 8.

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

//Creating table "desks".
$sql_tbl_2 = "CREATE TABLE `$tbl_name2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `space` varchar(20) NOT NULL,
  `side` varchar(15) NOT NULL,
  `row_no` int(11) NOT NULL,
  `desk_no` int(11) NOT NULL,
  `leased_to` int(11) NOT NULL,
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
  `length` varchar(5) NOT NULL,
  `width` varchar(5) NOT NULL,
  `area` varchar(5) NOT NULL,
  `desks` int(11) NOT NULL,
  `space` varchar(20) NOT NULL,
  `side` varchar(20) NOT NULL,
  `leased_to` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_4 = $mysqli->query( $sql_tbl_4 );

//Creating table "rooms_log".
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
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result_tbl_8 = $mysqli->query( $sql_tbl_8 );

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
?>
