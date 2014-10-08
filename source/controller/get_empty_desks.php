<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

function print_layout($space, $sp_id)
{
	global $mysqli;

	$sql_left = $mysqli->query("SELECT * FROM desks WHERE space='{$space}' AND side ='left'");
	$sql_right = $mysqli->query("SELECT * FROM desks WHERE space='{$space}' AND side ='right'");

	$free_left = array();
	$free_right = array();

	$rmax = 0;
	$cmax_left = 0;
	$cmax_right = 0;

	while($row = $sql_left->fetch_assoc())
	{
		$rno = $row['row_no'];
		$cno = $row['desk_no'];

		if(!isset($free_left[$rno]))
			$free_left[$rno] = array();
		if($row['leased_to'] == 0)
			$free_left[$rno][$cno] = 1;
		else
			$free_left[$rno][$cno] = 0;
		
		$rmax = max($rmax, $rno);
		$cmax_left = max($cmax_left, $cno);
	}

	while($row = $sql_right->fetch_assoc())
	{
		$rno = $row['row_no'];
		$cno = $row['desk_no'];

		if(!isset($free_right[$rno]))
			$free_right[$rno] = array();
		if($row['leased_to'] == 0)
			$free_right[$rno][$cno] = 1;
		else
			$free_right[$rno][$cno] = 0;
		
		$rmax = max($rmax, $rno);
		$cmax_right = max($cmax_right, $cno);
	}


	for($i=1; $i<=$rmax; $i++)
	{
		for($j=1; $j<=$cmax_left; $j++)
		{
			$id = $sp_id."-left-".$i."-".$j;
			if(!isset($free_left[$i][$j]))
				echo '<img src="../asset/img/not_available.png" class="not_available" id="'.$id.'"></img>';
			else if($free_left[$i][$j] == 1)
				echo '<img src="../asset/img/not_selected.png" class="not_selected" onclick="changeimage(\''.$id.'\')" id="'.$id.'"></img>';
			else
				echo '<img src="../asset/img/booked.png" class="booked" id="'.$id.'"></img>';
		}
		
		echo "&nbsp&nbsp&nbsp&nbsp";

		for($j=1; $j<=$cmax_right; $j++)
		{
			$id = $sp_id."-right-".$i."-".$j;;
			if(!isset($free_right[$i][$j]))
				echo '<img src="../asset/img/not_available.png" class="not_available" id="'.$id.'"></img>';
			else if($free_right[$i][$j] == 1)
				echo '<img src="../asset/img/not_selected.png" class="not_selected" onclick="changeimage(\''.$id.'\')" id="'.$id.'"></img>';
			else
				echo '<img src="../asset/img/booked.png" class="booked" id="'.$id.'"></img>';
		}
		echo "<br />";

	}
}

print_layout('Launchpad A', 1);
echo "<br />";
print_layout('Launchpad B', 2);
?>