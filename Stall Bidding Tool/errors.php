<?php
	include 'register.php';
	if(count($errors) > 0){
		foreach ($errors as $err){
			echo $err;
		}
	}
	
?>