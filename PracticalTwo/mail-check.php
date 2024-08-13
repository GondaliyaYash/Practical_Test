<?php 

include "connection.php";

if (!isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_COOKIE['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to_user_id = $conn->real_escape_string($_POST['to_user']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);


    if (empty($to_user_id) || $to_user_id == $user_id) {
        header("Location: mailform.php?message=Invalid recipient&type=error");
        exit();
    }

    $sql = "INSERT INTO emaildetails (FromUserId, ToUserId, Subject, Message) 
            VALUES ('$user_id', '$to_user_id', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: mailform.php?message=Mail sent successfully&type=success");
    } else {
        header("Location: mailform.php?message=Error: " . $conn->error . "&type=error");
    }

    $conn->close();
}
?>