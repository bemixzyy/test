<?php
// Database connection
$mysqli = new mysqli("localhost", "username", "password", "test");

// Fetch contacts from the database
$result = $mysqli->query("SELECT * FROM contacts_table");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Phone Book</title>
</head>
<body>
    <h1>Phone Book Contacts</h1>
    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['Name']} - {$row['PhoneNumber']}</li>";
        }
        ?>
    </ul>
    <a href="add_contact.php">Add Contact</a>
</body>
</html>