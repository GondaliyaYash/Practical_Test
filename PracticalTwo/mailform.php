
<htm>
<head>
    <title>Send Mail</title>
    <?php 	include("header.php"); ?>	
</head>
<body>
<div id="form">

<h2>Send Mail</h2><br>

    <?php

    if (!isset($_COOKIE['user'])) {
        header("Location: login.php");
        exit();
    }


    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $messageType = $_GET['type'];     
        
        if($message == "Mail sent successfully" && $messageType == "success") 
        {
            echo "<div class='message $messageType'>$message <a href='maildetails.php'><b>Check your mail inbox</b></a></div>";

        }
        else{
            echo "<div class='message $messageType'>$message</div>";
        }    
      
    }
    ?>

<form action="mail-check.php" method="post">     
     	
         <label>To Email&nbsp;&nbsp;&nbsp;</label>
         <select id="to_user"  name="to_user" required style="padding:5px; width:170px;">
             <option value="">Select User</option>
             <?php
             include 'connection.php';
         
            if (!isset($_COOKIE['user'])) {
                header("Location: login.php");
                exit();
            }
            
            $user_id = $_COOKIE['user'];
           
            $sql = "SELECT * FROM registration WHERE Id != $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row['Id']) . "\">" . htmlspecialchars($row['UserName']) . "</option>";
                }
            } else {
                echo "<option value=\"\">No users available</option>";
            }

            $conn->close();
            ?>
         </select>
         
         <br><br>
    
         <label>Subject&nbsp;&nbsp;&nbsp;&nbsp;</label>
         <input type="text" name="subject" id="subject" required><br><br>
    
         <label>Message&nbsp;</label>
         <textarea  name="message" rows="5" required></textarea><br><br>     	
    
             <button type="submit"  id="btn" >Send Mail</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="profile.php" class="ca">Go to profile</a>
         </form>

</div>
	
</body>
</htm>