<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the Largest Number</title>
</head>
<body>

    <h2>Enter Numbers to Find the Largest One</h2>

   
    <form method="POST">
        <input type="text" name="numbers" placeholder="" />
        <button type="submit">Find Largest Number</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $input = $_POST['numbers'];

       
        $numbers = array_map('trim', explode(',', $input));

     
        $numbers = array_map('intval', $numbers);

        
        $maxNumber = max($numbers);

        echo "<p>The largest number is: $maxNumber</p>";
    }
    ?>

</body>
</html>
