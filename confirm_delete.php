<?php
// Kiểm tra nếu có tham số ID được truyền qua URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn thông tin liên hệ từ cơ sở dữ liệu dựa trên ID
    $stmt = $mysqli->prepare("SELECT Name, PhoneNumber FROM contacts_table WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $phone);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete Contact</title>
</head>
<body>
    <h1>Confirm Delete Contact</h1>
    <p>Are you sure you want to delete contact: <?php echo $name; ?> - <?php echo $phone; ?>?</p>
    <form method="post" action="delete_contact.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
