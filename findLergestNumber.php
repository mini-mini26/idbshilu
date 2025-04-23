<!DOCTYPE html>
<html>
<head>
    <title>Find Largest Number</title>
</head>
<body>

<h2>Enter Two Numbers:</h2>
<form method="post">
    <input type="text" name="number1" placeholder="Enter first number" required>
    <input type="text" name="number2" placeholder="Enter second number" required>
    <button type="submit">Find Largest Number</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number1']) && isset($_POST['number2'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    // Check if both inputs are numbers
    if (is_numeric($number1) && is_numeric($number2)) {
        // Find the largest number
        $largest = ($number1 > $number2) ? $number1 : $number2;
        echo "<p>The largest number is: $largest</p>";
    } else {
        echo "<p style='color:red;'>Please enter valid numbers.</p>";
    }
}
?>

</body>
</html>
