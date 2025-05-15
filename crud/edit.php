<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("UPDATE users SET email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>

<h2>Edit User</h2>
<form method="POST">
    <label>Email:</label>
    <input type="text" name="email" value="<?= $user['email'] ?>" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?= $user['phone'] ?>" required><br><br>

    <input type="submit" value="Update">
    <a href="create.php">Cancel</a>
</form>
