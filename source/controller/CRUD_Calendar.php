<?php

	require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );
	$operation = @$_POST["operation"];
	
	if($operation == 'c')
	{
		$start_date = @$_POST["start_date"];
		$finish_date = @$_POST["finish_date"];
		$start_time = @$_POST["start_time"];
		$finish_time = @$_POST["finish_time"];
		$mysqli->query("INSERT INTO Calendar VALUES('','$start_date', '$finish_date', '$start_time', '$finish_time');");
		echo "Event Created!!\n";
	}

	else if($operation == 'r')
	{
		$result = $mysqli->query("SELECT * from Calendar;");
		while($row = $result->fetch_array())
			echo $row["start_date"]," - ",$row["finish_date"]," : ",$row["start_time"],"-",$row["finish_time"]."\n";
	}

	else if($operation == 'u')
	{
		$start_date = @$_POST["start_date"];
		$finish_date = @$_POST["finish_date"];
		$start_time = @$_POST["start_time"];
		$finish_time = @$_POST["finish_time"];
		
		$new_start_date = @$_POST["new_start_date"];
		$new_finish_date = @$_POST["new_finish_date"];
		$new_start_time = @$_POST["new_start_time"];
		$new_finish_time = @$_POST["new_finish_time"];
		
		$result = $mysqli->query("SELECT id from Calendar WHERE start_date='$start_date' and finish_date='$finish_date' and start_time='$start_time' and finish_time='$finish_time';");
		
		while($row = $result->fetch_array())
			$id = $row["id"];

		$mysqli->query("UPDATE Calendar SET start_date='$new_start_date',finish_date='$new_finish_date',start_time='$new_start_time',finish_time='$new_finish_time' WHERE id='$id';");

		echo "Event Updated!!\n";
	}

	else if($operation == 'd')
	{
		$start_date = @$_POST["start_date"];
		$finish_date = @$_POST["finish_date"];
		$start_time = @$_POST["start_time"];
		$finish_time = @$_POST["finish_time"];
		
		$mysqli->query("DELETE from Calendar WHERE start_date='$start_date' and finish_date='$finish_date' and start_time='$start_time' and finish_time='$finish_time';");
		
		echo "Event Deleted!!\n";
	}
?>
