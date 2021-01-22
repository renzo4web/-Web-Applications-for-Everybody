<?php
session_start();
require_once "pdo.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renzo Barrios 892c2238</title>
</head>
<body>
<?php

if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

if(isset($_SESSION['name'])){
    echo "<h1>Tracking Autos for ".htmlentities($_SESSION['name'])."</h1>";
    echo "<h3 class='accent-color'>Automobiles</h3>";
    $sqlShow = "SELECT * FROM autos ";
    $stmtShow = $pdo->query($sqlShow);
    while ($row = $stmtShow->fetch(PDO::FETCH_ASSOC)) {
    $mke = htmlentities($row['make']);
    echo "<table><tr><td>{$mke}</td><td>{$row['year']}</td><td>{$row['mileage']}</td></tr> </table>";}
    echo "<a href='add.php'>Add New</a> || <a href='logout.php'>Logout</a>";

}else{
    //Flash message
    die('Not logged in');
}

?>


</body>
</html>
