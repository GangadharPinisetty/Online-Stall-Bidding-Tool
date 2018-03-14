<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Main Page</title>
        <link href="mainpage.css" rel="stylesheet">
    </head>

    <body>
      <div class="total">
        <div class="logout">
                <a href="logout.php">Logout</a>
        </div>
        <div class="top">
            <h1>ONLINE STALL BIDDING</h1>
        </div>

        <ul class="middle">
            <li><a href="mainpage.php">Home</a></li>
            <li><a href="info.html">Information of Stalls</a></li>
        </ul>

        <div class="bottom">
            <h3>Stalls Category </h3>
            <a class="f" href="foodstall.php">Food Stalls</a>
            <a class="g" href="gamesstall.php">Games Stalls</a>
        </div>
      </div>
    </body>
</html>