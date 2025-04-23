<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorialnumber</title>
</head>
<body>
<h2>Calculate Factorial</h2>

<form method="POST">
<input type="number" name="number" placeholder="">
<button type="submit">Find Factorial</button>
</form>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $num=$_POST["number"];

    if($num >=0)
    {
        function fact($n)
        {
            if($n==0||$n==1)
            {
                return 1;
            }
            return $n*fact($n-1);
        }
        $result = fact ($num);

        echo "<p> factorial is :$result </p>";
    }
}
?>
    
</body>
</html>