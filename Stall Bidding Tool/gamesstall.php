<!DOCTYPE HTML>
<?php
    session_start();
	require_once('connect.php'); 
    $errors=array();
    $user=$_SESSION['username'];
    if(isset($_POST['submit'])){
		$stall=$_POST['onlinestall1'];
		$bidamt=$_POST['bidamt'];
		if(empty($stall)){
			array_push($errors,"please select your stall");
		}
		if(empty($bidamt)){
			array_push($errors,"please enter your bid amount");
		}
		if(count($errors)==0){
            $sql="INSERT INTO `bidding` (`username`, `stall`, `amount`) VALUES ('$user', '$stall', '$bidamt')"; 
            $res=mysqli_query($db,$sql);

        }
        else{
			foreach ($errors as $err){
				echo "$err<br>";
		    }
        }
    }
    if(isset($_POST['allbids1'])){
        $sql1="SELECT * FROM `bidding` ORDER BY `bidding`.`stall` ASC, `bidding`.`amount` DESC";   
        $res1=mysqli_query($db,$sql1);
        $_SESSION['rows']=$res1;
        if(mysqli_num_rows($res1)>0){
            while($row=mysqli_fetch_array($res1)){
                echo $row['username']."   ".$row['stall']."   ".$row['amount']."<br>";
            }
        }

    }
    if(isset($_POST['changebid1'])){
        $stall1=$_POST['onlinestall1'];
        $bidamt1=$_POST['bidamt'];
        if(empty($stall1)){
			array_push($errors,"please select your stall to update");
		}
		if(empty($bidamt1)){
			array_push($errors,"please enter your bid amount to update");
		}
		if(count($errors)==0){
            echo $bidamt1;
            echo $stall1;
            echo $user;
            $sql2="UPDATE `bidding` SET `stall` = '$stall1', amount = '$bidamt1' WHERE `bidding`.`username` = '$user';"; 
            $res=mysqli_query($db,$sql2);
            echo 'your bid is updated';
        }
        else{
			foreach ($errors as $err){
				echo "$err<br>";
		    }
        }
    }
?>

<html>

<head>
  <title>Games stall</title>
  <link href="gamesstall.css" rel="stylesheet">
<style>
p {
  font-size: 20px;
  margin-top:0px;
  float:right;
  color:#F5FFFA;
  background-color: red;
}
</style>
</head>

<body>
    <div class="total">
        <div class="top">
            <h1>Online Stall Bidding</h1>
            <h3>Games Stalls</h3>
        </div>

        <br><br>

        <a href="mainpage.php"><button class="button">Go Back</button></a>

        <br><br>

        <p id="demo"></p>

        <br><br>

        <script>
            var countDownDate = new Date("feb 23, 2018 15:37:25").getTime();
            var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>

        <label class="label">Click On the Below images to see the STALLS INFORMATION</label>

        <br><br>

        <div class="middle">
            <a href="dartballoon.html"><img src="dartballoon.jpeg" alt="dartballoon image" width=250px height=200px></a>
            <a href="sharpshooter.html"><img src="sharpshooter.jpg" alt="sharpshooter image"  width=250px height=200px></a>
            <a href="highscoreroller.html"><img src="highscoreroller.JPG" alt="highscoreroller image"  width=250px height=200px></a>
            <a href="blackhole.html"><img src="blackhole.jpg" alt="blackhole image"  width=250px height=200px></a>
             <a href="angrybird.html"><img src="angrybird.jpg" alt="angrybird image"  width=250px height=200px></a>
        </div>

        <br><br>
        <br><br>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <lable class="form">Select Your Games Stall : </lable> <input list="gamesstall" name="onlinestall1">
            <datalist id="gamesstall">
                <option value="Dart Balloon">
                <option value="Sharpshooter">
                <option value="High Score Roller">
                <option value="Black Hole">
                <option value="Angry Birds">
            </datalist>

            <br><br>

            <lable class="form">Minimum Bid : 10,000</lable>

            <br><br>

            <lable class="form">Your Bid : </lable> 
            <input type="number" name="bidamt"min="10000" step="100">

            <br><br>

            <button class="button" type="submit" name="allbids1">All Bids</button>

            <br><br>

            <center>
                <button class="button" type="submit" name="changebid1">Change Bid</button>
            </center>

            <br><br>

            <input  type="submit" class="button" name="submit" value="submit">

        </form>
    </div>
</body>

</html>