<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$space = @$_GET['space'];
$side = @$_GET['side'];

$sql = $mysqli->query("SELECT * FROM desks WHERE space='{$space}' AND side ='{$side}'");

$free = array();

$rmax = 0;
$cmax = 0;

while($row = $sql->fetch_assoc())
{
	$rno = $row['row_no'];
	$cno = $row['desk_no'];

	if(!isset($free[$rno]))
		$free[$rno] = array();
	if($row['leased_to'] == 0)
		$free[$rno][$cno] = 1;
	else
		$free[$rno][$cno] = 0;
	
	$rmax = max($rmax, $rno);
	$cmax = max($cmax, $cno);
}

for($i=1; $i<=$rmax; $i++)
{
	for($j=1; $j<=$cmax; $j++)
	{
		$b = 100*$i + $j;
		if(!isset($free[$i][$j]))
			echo "NOT AVAILABLE: ".$b."\n";
		else if($free[$i][$j] == 1)
			echo "FREE: ".$b."\n";
		else
			echo "BOOKED: ".$b."\n";
	}
}

?>