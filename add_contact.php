<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Insert new contact into the database
    $stmt = $mysqli->prepare("INSERT INTO contacts_table (Name, PhoneNumber) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>
    <form method="post" action="">
        Name: <input type="text" name="name"><br>
        Phone Number: <input type="text" name="phone"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
