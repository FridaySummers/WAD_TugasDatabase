<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    $stmt = $mysqli->prepare("UPDATE users SET name=?, email=?, mobile=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $mobile, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>

<html>
<head><title>Edit User</title></head>
<body>
    <a href="index.php">Home</a>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="name" value="<?php echo $result['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $result['email']; ?>" required>
        <input type="text" name="mobile" value="<?php echo $result['mobile']; ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>