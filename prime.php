<!DOCTYPE html>
<html>
<head>
    <title>Prime Number Checker</title>
</head>
<body>

<h2>Check if a Number is Prime</h2>

<form method="post">
    <input type="number" name="number" required>
    <button type="submit" name="check">Check</button>
</form>

<?php
function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;

    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) return false;
    }

    return true;
}

if (isset($_POST['check'])) {
    $number = intval($_POST['number']);
    if (isPrime($number)) {
        echo "<p>$number is a <strong>prime</strong> number.</p>";
    } else {
        echo "<p>$number is <strong>not</strong> a prime number.</p>";
    }
}
?>

</body>
</html>
