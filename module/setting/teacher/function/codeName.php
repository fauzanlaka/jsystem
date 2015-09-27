<?php 
	function codeName(){
		$t_codeName = mysqli_query($con, "SELECT max(t_code) AS mx FROM teachers");
		$row = mysqli_fetch_assoc($t_codeName);
		$mem_old = $row['mx'];// gives the highest id

		$tmp1=substr($mem_old,1);
		$tmp2=$tmp1+1;

		if($tmp2 <= 9){
		    $tmp3='000'.$tmp2;
		}

		$a = "Fauzan";
?>