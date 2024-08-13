
<?php 
include("header.php"); 
include "connection.php";


if (!isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_COOKIE['user'];


$sql = "SELECT * FROM (
    SELECT e.Id, u.UserName AS from_name, u.Email AS from_email, e.Subject, e.Message, e.SentAt
    FROM emaildetails e
    JOIN registration u ON e.FromUserId = u.Id
    WHERE e.ToUserId = $user_id
    
    UNION ALL
    
    SELECT e.Id, u.UserName AS from_name, u.Email AS from_email, e.Subject, e.Message, e.SentAt
    FROM emaildetails e
    JOIN registration u ON e.ToUserId = u.Id
    WHERE e.FromUserId = $user_id
) AS combined_results
ORDER BY SentAt DESC;

";
$result = $conn->query($sql);

$emails = [];
while ($row = $result->fetch_assoc()) {
    $emails[] = $row;
}

?>

<htm>
<head>
    <title>Mail Inbox</title>
</head>
<body>
<div id="form" style="width: 50% !important;">

<h2>Mail Inbox</h2><br>

<?php if (count($emails) > 0): ?>
        <table border="1">
            <tr>
                <th>From</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Sent At</th>
                <!-- <th>Action</th> -->
            </tr>
            <?php foreach ($emails as $email): ?>
                <tr>
                    <td><?php echo htmlspecialchars($email['from_name']) . ' (' . htmlspecialchars($email['from_email']) . ')'; ?></td>
                    <td><?php echo htmlspecialchars($email['Subject']); ?></td>
                    <td><?php echo htmlspecialchars($email['Message']); ?></td>
                    <td><?php echo htmlspecialchars($email['SentAt']); ?></td>
                    <!-- <td>
                        <a href="profile.php?delete=<?php echo htmlspecialchars($email['Id']); ?>" onclick="return confirm('Are you sure you want to delete this email?');">Delete</a>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No emails found.</p>
    <?php endif; ?>
<br>
    <a href="profile.php">Go to your Profile</a>  &nbsp;&nbsp;&nbsp;&nbsp; OR &nbsp;&nbsp;&nbsp;&nbsp;   <a href="mailform.php">Sent Mail</a> 
</div>
	
</body>
</htm>