<?php
require_once "pdo.php";
session_start();
$showTable = false;

if (isset($_SESSION['account'])) {
    $sqlShow = "SELECT * FROM autos ";
    $stmtShow = $pdo->query($sqlShow);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renzo Barrios 09ad6b97</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_SESSION['success'])) {
    echo "<h3 style='color: green'>{$_SESSION['success']}</h3>";
    unset($_SESSION['success']);
}
?>

<?php
if (!isset($_SESSION['account'])) {
    //
    echo "<div class='container'> <h1>Welcome to the database</h1>";
    echo "<a href='login.php' class='btn btn-login'>Please log in</a></div>";
} else {
    echo "<div class='container'>";
    echo "<h1>Tracking Autos for " . htmlentities($_SESSION['account']) . "</h1>";
    echo "<h3 class='accent-color'>Automobiles</h3>";
    while ($row = $stmtShow->fetch(PDO::FETCH_ASSOC)) {
        $mke = htmlentities($row['make']);
        $model = htmlentities($row['model']);
        $year = htmlentities($row['year']);
        $mileage = htmlentities($row['mileage']);
        $getEdit = "autos_id=" . $row['autos_id'];
        $showTable = true;
        echo "<table><tr><td>{$mke}</td><td>{$model}</td><td>{$year}</td><td>{$mileage}</td><td><a href='delete.php?{$getEdit}'>Delete
</a></td><td><a href='edit.php?{$getEdit}'>Edit
</a></td></tr></table>";
    }
    echo "<a href='add.php'>Add New Entry</a> || <a href='logout.php'>Logout</a>";
    echo "</div>";
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>