<!DOCTYPE html>

<html>

<head>
    <style>.error {color:red;}</style>
    <title>Online Stall Bidding System</title>
    <link href="loginpage.css" rel="stylesheet">
</head>
<html>
	<body>
	<?php
		session_start();
		include 'connect.php';
		$usernm=$psd="";
		$errors=array();
		if(isset($_SESSION['username'])){
			if($_SESSION['username']=="admin")
				header('location:admin.php');
			else
				header('location:mainpage.php');
		}
		if(isset($_POST['login'])){
			$usernm=$_POST['username'];
			$password1=$_POST['password1'];
			if(empty($usernm)){
				array_push($errors,"username required");
			}
			if(empty($password1)){
				array_push($errors,"password required");
			}
			if(count($errors)==0){
				$password=md5($password1);
				$sql="SELECT `password` FROM `regg` WHERE  username='$usernm' and `password`='$password'";
				$res=mysqli_query($db,$sql);

				if (mysqli_num_rows($res)==1) {
					
					if($usernm=="admin"){
						$_SESSION['username'] =$usernm;
						header("location:adminpage.php");
					}
					else{
						$_SESSION['username'] =$usernm;
						header("location:mainpage.php");
					}
				}
				else{
					echo "username or password invalid";
				}
			}
			else{
				foreach ($errors as $err){
					echo "$err<br>";
				}
				
			}
		}
	?>
		<div class="background">
        <button class="button"> <a href="index.php" ><span>Register </span></a></button>
        <br><br>
        <form class="middle" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label id="us" for="user"><b>Username:</b></label>
            <input type="text" name="username" id="user"placeholder="enter username"><span class="error">*</span>
            <br><br>
            <label id="us" for="psd"><b>Password:</b></label>
            <input type="password" name="password1" id="psd" placeholder="enter password"><span class="error">*</span>
            <br><br>
            <center>
			<input class="loginbutton" type="submit" name="login" value="login">
            </center>
        </form>
    </div>

    <div class="bottom">
        <p>If you have any problems regarding this online stall bidding or unable to login please contact us Stalls incharge:<div class="number">7891444416</div></p>
        
    </div>

</body>

</html>