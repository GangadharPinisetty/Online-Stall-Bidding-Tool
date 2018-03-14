<?php
	session_start();
?>
<!doctype HTML>
<html>
<head></head>
<body>
	<h3>Home</h3>
	<a href="loginp.php">logout</a>
	<?php session_destroy(); ?>
</body>