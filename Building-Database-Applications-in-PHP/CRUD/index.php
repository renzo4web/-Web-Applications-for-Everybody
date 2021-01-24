<?php
require_once "pdo.php";
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renzo Barrios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
   if(isset($_SESSION['success'])){
       echo "<h3 style='color: green'>{$_SESSION['success']}</h3>";
       unset($_SESSION['success']);
   }
?>

<?php
        if(!isset($_SESSION['account'])){
            //
            echo "<div class='container'> <h1>Welcome to the database</h1>";
            echo "<a href='login.php' class='btn btn-login'>Please Log in</a></div>";
        }else{
            echo "<h1>Tracking Autos for ".htmlentities($_SESSION['account'])."</h1>";
            echo "<h3 class='accent-color'>Automobiles</h3>";
            $sqlShow = "SELECT * FROM autos ";
            $stmtShow = $pdo->query($sqlShow);
            while ($row = $stmtShow->fetch(PDO::FETCH_ASSOC)) {
                if ($row){
                $mke = htmlentities($row['make']);
                $getEdit = "autos_id=".$row['autos_id'];
                echo "<table><tr><td>{$mke}</td><td>{$row['year']}</td><td>{$row['mileage']}</td><td><a href='delete.php?{$getEdit}'>Delete
</a></td><td><a href='edit.php?{$getEdit}'>Edit
</a></td></tr> </table>";}else{
                    echo "No rows found";
                }
                }
            echo "<a href='add.php'>Add New Entry</a> || <a href='logout.php'>Logout</a>";
        }
?>




</body>
</html>