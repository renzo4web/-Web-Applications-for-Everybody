<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renzo PHP </title>
</head>
<body>

   <h1>Renzo Barrios PHP</h1>

<?php 
echo "<p> The SHA256 hash of 'Renzo Barrios' is ".hash('sha256', 'Renzo Barrios')."</p>" 
?>
<p>ASCII ART:</p>
<pre>
    ██████  
    ██   ██ 
    ██████  
    ██   ██ 
    ██   ██ 
</pre>
<a href="./check.php">Click here to check the error setting</a>
<br>
<a href="./fail.php">Click here to cause a traceback</a>
</body>
</html>