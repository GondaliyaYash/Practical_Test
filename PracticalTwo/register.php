<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<?php 	include("header.php"); ?>	
</head>
<body>
<div id="form">
     <h2>Register</h2>
     <br>

     <?php
          if (isset($_GET['message'])) {
               $message = $_GET['message'];
               $messageType = $_GET['type'];

               if($message == "Registration successful" && $messageType == "success") 
                {
                    echo "<div class='message $messageType'>$message <a href='login.php'><b>Login here</b></a></div>";
    
                }
                else{
                    echo "<div class='message $messageType'>$message</div>";
                }    
              
          }
     ?>

     <form action="register-check.php" method="post">     
     	
     <label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <input type="text" name="username" id="username" required><br><br>

     <label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <input type="email" name="email" id="email" required><br><br>

     <label>Password&nbsp;</label>
     <input type="password" name="password" required><br><br>     	

     	<button type="submit"  id="btn" >Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="login.php" class="ca">Already have an account?</a>
     </form>
</div>     
</body>
</html>