<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

function print_layout($space, $sp_id)
{
	global $mysqli;

	$sql = $mysqli->query("SELECT * FROM desks WHERE space='{$space}'");

	$free = array();

	$max = 0;

	while($row = $sql->fetch_assoc())
	{
		$number = $row['desk_no'];
		
		if($row['leased_to'] == 0)
			$free[$number] = 1;
		else
			$free[$number] = 0;
		
		$max = max($max, $number);
	}

	for($i=1; $i<=$max; $i++)
	{
		if(!isset($free[$i]))
		{
			$free[$i] = -1;
			echo "NOT AVAILABLE ";
		}
		else if($free[$i])
			echo "FREE ";
		else
			echo "OCCUPIED ";
	}
}

print_layout('Launchpad A', 1);
echo "<br />";
print_layout('Launchpad B', 2);
?>