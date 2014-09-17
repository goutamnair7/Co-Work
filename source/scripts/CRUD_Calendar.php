<?php
	include "connect_to_mysql.php";
	
	$operation = $_GET["operation"];
	
	if($operation == 'c')
	{
		$start_date = $_GET["start_date"];
		$finish_date = $_GET["finish_date"];
		$start_time = $_GET["start_time"];
		$finish_time = $_GET["finish_time"];
		mysql_query("INSERT INTO Calendar VALUES('','$start_date', '$finish_date', '$start_time', '$finish_time');");
		echo "Event Created!!\n";
	}

	else if($operation == 'r')
	{
		$result = mysql_query("SELECT * from Calendar;");
		while($row = mysql_fetch_array($result))
			echo $row["start_date"]," - ",$row["finish_date"]," : ",$row["start_time"],"-",$row["finish_time"]."\n";
	}

	else if($operation == 'u')
	{
		$start_date = $_GET["start_date"];
		$finish_date = $_GET["finish_date"];
		$start_time = $_GET["start_time"];
		$finish_time = $_GET["finish_time"];
		
		$new_start_date = $_GET["new_start_date"];
		$new_finish_date = $_GET["new_finish_date"];
		$new_start_time = $_GET["new_start_time"];
		$new_finish_time = $_GET["new_finish_time"];
		
		$result = mysql_query("SELECT id from Calendar WHERE start_date='$start_date' and finish_date='$finish_date' and start_time='$start_time' and finish_time='$finish_time';");
		
		while($row = mysql_fetch_array($result))
			$id = $row["id"];

		mysql_query("UPDATE Calendar SET start_date='$new_start_date',finish_date='$new_finish_date',start_time='$new_start_time',finish_time='$new_finish_time' WHERE id='$id';");

		echo "Event Updated!!\n";
	}

	else if($operation == 'd')
	{
		$start_date = $_GET["start_date"];
		$finish_date = $_GET["finish_date"];
		$start_time = $_GET["start_time"];
		$finish_time = $_GET["finish_time"];
		
		mysql_query("DELETE from Calendar WHERE start_date='$start_date' and finish_date='$finish_date' and start_time='$start_time' and finish_time='$finish_time';");
		
		echo "Event Deleted!!\n";
	}
?>
