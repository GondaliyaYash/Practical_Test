<?php

$conn = mysqli_connect("localhost","root","","testdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>