<h3>LOGIN</h3>
		<form action="<?php $_SERVER['PHP_SELF']; ?> " method="post">
			
			<label for="user">User name:</label>
			<input type="text" name="user" id="user" placeholder="Enter username"><br><br>
			 
			<label for="psd1">password:</label>
			<input type="password" name="password1" id='psd1' placeholder="Enter password"><br><br>
			
			<input type="submit" name="login" value="login">
			<a href="index.php">back to Register</a>
	    </form>
		
	</body>
</html>