<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prime</title>
</head>
<body>
    <from method ="post">
        <input type="number" name ="number" id="prime" require>
        <button type ="submit" namr="submit"> submit </button>
</from>
<?php

if(isset($_post['submit']))
{
    $num=intval($_post['number']);
    $checkprime=true;

    if($num==1){
        echo" 1 is a prime number";
    }
    else( $num>1)
    {
        for($i=2; $i<$num;$i++)
        {
            if($num%$i==0){
                $checkprime=false;
                break;
            }
            if ($checkprime)
             
            {
                echo "<p>$number is a prime number.</p>";
            } 
            else 
            {
                echo "<p>$number is not a prime number.</p>";
            }
            
        } 
        else 
        {
            echo "<p>Zero or negative numbers cannot be prime.</p>"
        }
    }

}
?>
    
</body>
</html>