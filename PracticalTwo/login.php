<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 	include("header.php"); ?>	
</head>
<body>
<div id="form">
	<h2>Login</h2><br>

	<?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $messageType = $_GET['type'];
        echo "<div class='message $messageType'>$message</div>";
    }
    ?>

     <form action="login-check.php" method="post">     	
 
     	<label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
     	<input type="text" name="username" id="username" required><br><br>

     	<label>Password </label>
     	<input type="password" name="password" id="password" required><br><br>

     	<button type="submit"  id="btn" >Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="register.php" class="ca">Create an account</a>
     </form>
</div>
</body>
</html>