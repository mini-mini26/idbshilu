<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Factorial</title>
</head>
<body>

    <h2>Calculate Factorial</h2>

    <!-- Form to input number -->
    <form method="POST">
        <input type="number" name="number" placeholder="Enter a number" required />
        <button type="submit">Find Factorial</button>
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the number from input
        $number = $_POST['number'];

        // Check if the number is a valid positive integer
        if ($number >= 0) {
            // Function to calculate the factorial
            function factorial($n) {
                if ($n == 0 || $n == 1) {
                    return 1; // Base case
                }
                return $n * factorial($n - 1); // Recursive case
            }

            // Calculate the factorial
            $result = factorial($number);

            // Display the result
            echo "<p>The factorial of $number is: $result</p>";
        } else {
            echo "<p>Please enter a valid non-negative integer.</p>";
        }
    }
    ?>

</body>
</html>
