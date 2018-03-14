<?php
	
	include 'connect.php';
	$usernm=$email="";
	$errors=array();
	if(isset($_POST['submit'])){
		$usernm=$_POST['user'];
		$email=$_POST['email'];
		$password1=$_POST['password1'];
		$password2=$_POST['password2'];
		if(empty($usernm)){
			array_push($errors,"username required");
		}
		if(empty($email)){
			array_push($errors,"email required");
		}
		if(empty($password1)){
			array_push($errors,"password required");
		}
		if($password1!=$password2){
			array_push($errors,"passwords do not match");
		}
		if(count($errors)==0){
			$password=md5($password1);
			$sql="INSERT INTO `regg`( `username`, `password`, `email`) VALUES('$usernm', '$password', '$email')";
			$res=mysqli_query($db,$sql);
			header("location:loginp.php");
		}
		else{
			foreach ($errors as $err){
				echo "$err<br>";
			}
			
		}

	}	
?>
<!DOCTYPE html>

<html>

<head>
    <title>Online Stall Bidding System</title>
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <div class="top">

        <h1>Online Stall Bidding System</h1>

    </div>

    <div class="totalform">
        <form class="middle" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <br><br>
            <label class="us" for="name"><b>Username:</b></label>
            <input type="text" placeholder="Your name" id="name" name="user">
            <br><br>
            <label class="us" for="mail"><b>Email:</b></label>
            <input type="text" placeholder="Your email" name="email" id="mail">
            <br><br>
            <label class="us" for="psd2"><b>Password:</b></label>
            <input type="password" placeholder="password" name="password1" id="psd1">
            <br><br>
            <label class="us" for="psd2"><b> Confirm Password:</b></label>
            <input type="password" placeholder="password" name="password2" id="psd2">
            <br><br>
            <center class="loginbutton">
			    <input type="submit" name="submit" value="register">
            </center>
        </form>
    </div>

    <div class="bottom">
        <p>If you have any problems regarding this online stall bidding or unable to login please contact us 9849xxxxxx</p>
    </div>

</body>

</html>


