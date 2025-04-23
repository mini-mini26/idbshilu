<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Maximum and Minimum Numbers</title>
</head>
<body>

    <h2>Find the Maximum and Minimum Numbers</h2>

    <!-- Form to input numbers -->
    <form method="POST">
        <input type="text" name="numbers" placeholder="Enter numbers separated by commas (e.g., 12, 32, 54)" />
        <button type="submit">Find Max and Min</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input from the user
        $input = $_POST['numbers'];

        // Split the input into an array and remove extra spaces
        $numbers = array_map('trim', explode(',', $input));

        // Convert strings to integers
        $numbers = array_map('intval', $numbers);

        // Calculate the maximum and minimum values
        $maxNumber = max($numbers);
        $minNumber = min($numbers);

        // Display the results
        echo "<p>The maximum number is: $maxNumber</p>";
        echo "<p>The minimum number is: $minNumber</p>";
    }
    ?>

</body>
</html>
