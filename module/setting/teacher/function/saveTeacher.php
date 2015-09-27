<?php
	function saveTeacher($t_fnameRumi){
		$sql = mysqli_query($con, "INSERT INTO teachers (t_fnameRumi) VALUES ($t_fnameRumi)");
		//echo $t_fnameRumi;
		echo $t_fnameRumi;
	}
?>