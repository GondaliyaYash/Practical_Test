<?php 
include "connection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = $conn->real_escape_string(trim($_POST['username'])); 
    $password = trim($_POST['password']);

	if (empty($user_input)) {
        header("Location: login.php?message=Name cannot be empty&type=error");
        exit();
    }
	if (empty($password)) {
        header("Location: login.php?message=Password cannot be empty&type=error");
        exit();
    }

    
    if (filter_var($user_input, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM registration WHERE Email='$user_input'";
    } else {
        $sql = "SELECT * FROM registration WHERE UserName='$user_input'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ((trim($password) == trim($row['Password']))) {
            setcookie("user", trim($row['Id']), time() + (86400 * 30), "/");
            header("Location: profile.php");
        } else {
            header("Location: login.php?message=Invalid password&type=error");
        }
    } else {
        header("Location: login.php?message=Please enter valid cridential&type=error");
    }

    $conn->close();
}
else{
	header("Location: login.php");
	exit();
}
?>