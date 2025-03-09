<?php
include_once("config.php");
$result = $mysqli->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head><title>Homepage</title></head>
<body>
    <a href="add.php">Add New User</a>
    <table border="1">
        <tr><th>Name</th><th>Email</th><th>Mobile</th><th>Actions</th></tr>
        <?php while ($user = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $user['id']; ?>'>Edit</a> |
                    <a href='delete.php?id=<?php echo $user['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>