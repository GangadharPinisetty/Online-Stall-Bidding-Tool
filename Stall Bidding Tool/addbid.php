<?php
	include 'connect.php';
	$errors=array();
    if(isset($_POST['addbid'])){

		$stall=$_POST['onlinestall'];
		$bidamt=$_POST['bidamt'];
		if(empty($stall)){
			array_push($errors,"please select your stall");
		}
		if(empty($bidamt)){
			array_push($errors,"please enter your bid amount");
		}
		if(count($errors)==0){
			$sql="INSERT INTO 'bids'( `username`, `stall`, `bidamnt`) VALUES('pa', '$stall', '$bidamt')";
			$res=mysqli_query($db,$sql);
        }
        else{
			foreach ($errors as $err){
				echo "$err<br>";
		    }
        }
    }

?>