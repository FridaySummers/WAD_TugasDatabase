<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    if (!empty($name) && !empty($email) && !empty($mobile)) {
        $stmt = $mysqli->prepare("INSERT INTO users (name, email, mobile) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $mobile);
        if ($stmt->execute()) {
            echo "User added successfully. <a href='index.php'>View Users</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
?>

<html>
<head><title>Add User</title></head>
<body>
    <a href="index.php">Go to Home</a>
    <form method="post" action="add.php">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="mobile" placeholder="Mobile" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>