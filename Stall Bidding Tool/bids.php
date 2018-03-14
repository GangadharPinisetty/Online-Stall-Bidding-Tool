<?php
    include 'connect.php';
    include 'foodstall.php';
?>
<!doctype HTML>
<html>
<head></head>
<body>
    <table>
        <tr>
            <th>USER NAME:</th>
            <th>STALL NAME:</th>
            <th>AMOUNT:</th>
        </tr>
        <?php
            session_start();
            $result=$_SESSION['rows'];
            if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_array($result)) {
        ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td> 
                        <td><?php echo $row['stall']; ?></td> 
                        <td><?php echo $row['amount']; ?></td> 
                    </tr>
                }
            }
    </table>
</body>
</html>