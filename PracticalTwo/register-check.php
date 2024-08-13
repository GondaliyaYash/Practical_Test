<?php 

include "connection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $email = $conn->real_escape_string(trim($_POST['email']));
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = trim($_POST['password']);

	if (empty($email)) {
        header("Location: register.php?message=Email cannot be empty&type=error");
        exit();
    }
	if (empty($username)) {
        header("Location: register.php?message=Name cannot be empty&type=error");
        exit();
    }
	if (empty($password)) {
        header("Location: register.php?message=Password cannot be empty&type=error");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?message=Invalid email format&type=error");
        exit();
    }

    $sql = "SELECT * FROM registration WHERE Email='$email' OR UserName='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: register.php?message=Username or email already exists&type=error");
        exit();
    }

    $sql = "INSERT INTO registration (Email, UserName, Password) VALUES ('$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: register.php?message=Registration successful&type=success");
    } else {
        header("Location: register.php?message=Error: " . $conn->error . "&type=error");
    }

    $conn->close();
}
else{
	header("Location: register.php");
	exit();
}
?>

