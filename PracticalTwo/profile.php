
<?php
	include("header.php");
	include "connection.php";
	
	
		if (!isset($_COOKIE['user'])) {
			header("Location: login.php");
			exit();
		}


$userId = $_COOKIE['user'];
$sql = "SELECT * FROM registration WHERE Id=$userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<head>
	<title>Profile</title>
</head>
<body>
<div id="form">

	<h2>Profile</h2><br>
    <p>Name: <?php echo htmlspecialchars($row['UserName']); ?></p>
    <p>Email: <?php echo htmlspecialchars($row['Email']); ?></p>    
	<br>
	<a href="mailform.php">Send New Mail</a>
	<br>
	<a href="maildetails.php">Check Mail Inbox</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	
    <a href="logout.php">Logout</a>

</div>
	
</body>
	