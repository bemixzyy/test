<?php
// Kiểm tra nếu có yêu cầu POST từ form chỉnh sửa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Cập nhật thông tin liên hệ trong cơ sở dữ liệu
    $stmt = $mysqli->prepare("UPDATE contacts_table SET Name = ?, PhoneNumber = ? WHERE ID = ?");
    $stmt->bind_param("ssi", $name, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}

// Kiểm tra nếu có tham số truyền vào ID từ URL
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
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        Phone Number: <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>