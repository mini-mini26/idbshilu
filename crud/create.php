<?php
 error_reporting(1);
include 'db.php'; // Ensure $conn is a mysqli connection

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    // Email validation using regex
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/i", $email)) {
        $errors[] = "Invalid email format.";
    }


    // Phone validation (only digits, 10 to 15 characters)
    if (!preg_match('/^[0-9]{11}$/', $phone)) {
        $errors[] = "Phone must be 11 digits.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (email, phone) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $stmt->close();

        // Refresh to show updated list
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}

// Delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
</head>
<body>

<div class="container">
    <h2>Add User</h2>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
        <br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
        <br><br>

        <div class="button-container">
            <input type="submit" name="add_user" value="Add" class="submit-btn">
        </div>
    </form>
</div>

<hr>

<h2>User Table</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Show all users from database
        $result = $conn->query("SELECT * FROM users ORDER BY id DESC");

        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
