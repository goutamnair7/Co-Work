<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$space = @$_GET['space'];

function print_layout($space)
{
	global $mysqli;
	$sql = $mysqli->query("SELECT * FROM desks WHERE space='{$space}'");
	$free = array();
	if($sql)
	{
		$rmax = 0;
		$cmax = 0;
		while($row = $sql->fetch_assoc())
		{
			$r = $row['row'];
			$c = $row['column'];

			if(!isset($free[$r-1]))
				$free[$r-1] = array();

			$free[$r-1][$c-1] = $row['leased_to'];

			$rmax = max($rmax, $r);
			$cmax = max($cmax, $c);
		}

		for($i=0; $i<$rmax; $i++)
			for($j=0; $j<$cmax; $j++)
				if(!isset($free[$i][$j]))
					$free[$i][$j] = -1;		//Not available
	}

print_layout('Launchpad A', 1);
echo "<br />";
print_layout('Launchpad B', 2);
?>
