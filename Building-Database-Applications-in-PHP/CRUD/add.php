<?php
session_start();
require_once  "pdo.php";

if(!isset($_SESSION['account'])){
    die("ACCESS DENIED");
}

if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){

    // check input
    if(empty($_POST['make']) || empty($_POST['model'])  || empty($_POST['year']) ||empty($_POST['mileage'])  ){
        $_SESSION['error'] = "All fields are required";
        header("Location: add.php");
        return;
    }

    if(!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])){
        $_SESSION['error'] = "Year must be an integer";
        header("Location: add.php");
        return;
    }
    // Add entry

    $sqlQuery = "INSERT INTO `autos` (`make`,`model`, `year`, `mileage`) VALUES (:make, :model ,:year ,:mileage)";
    $stmt = $pdo->prepare($sqlQuery);
    $stmt->execute(array(
            ':make' => htmlentities($_POST['make']),
            ':model' => htmlentities($_POST['model']),
            ':year' => $_POST['year'],
            ':mileage' => $_POST['year'],
    ));
    $_SESSION['success'] = "Record added";
    header("Location: index.php");
    return;

}




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
if (isset($_SESSION['error'])) {
    echo("<h2 class='warning'>{$_SESSION['error']}</h2>");
    unset($_SESSION['error']);
}
?>

<div class="container">
    <form method="post">
        <label for="make-car">Make</label>
        <input class="input-bar" type="text" name="make" id="make-car" >
        <br>
        <label for="model-car">Model</label>
        <input class="input-bar" type="text" name="model" id="model-car" >
        <br>
        <label for="year-car">Year</label>
        <input class="input-bar" type="text" name="year" id="year-car" >
        <br>
        <label for="mileage-car">Mileage</label>
        <input class="input-bar" type="text" name="mileage" id="mileage-car" >
        <br>
        <input class="btn" type="submit" name="0" value="Add">
    </form>
    <a class="btn btn-logout" href="logout.php">Logout</a>
</div>


</body>
</html>
