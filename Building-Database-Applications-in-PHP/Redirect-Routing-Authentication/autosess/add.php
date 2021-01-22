<?php
session_start();
require_once "pdo.php";
$notification  = false;
$name = "";
if(!isset($_SESSION['name'])){
    die("Not logged in");
}else if (isset($_POST['logout'])){
    header("Location: login.php");
    return;
}else{
    if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ){
        if( strlen($_POST['make']) < 1  ){
            $_SESSION['error'] = "Make is required";
            header("Location: add.php");
            return;
        }else{

            if( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ){
                $_SESSION['error'] = "Mileage and year must be numeric";
                header("Location: add.php");
                return;
            }else{


                $make = $_POST['make'];
                $year = $_POST['year'];
                $mileage = $_POST['mileage'];

                $sql_insert = "INSERT INTO `autos` (`make`, `year`, `mileage`) VALUES (:make,:year,:mileage )";
                $stmt = $pdo->prepare($sql_insert);
                $stmt->execute(array(
                    ':make'=> $make,
                    ':year'=> $year,
                    ':mileage'=>$mileage
                ));
                $_SESSION['success'] = "Record inserted";
                header("Location: view.php");
                return;
            }
        }



    }


}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracking Autos Renzo Barrios 892c2238</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Tracking Autos for :<?php echo('<span class="accent-color">'.htmlentities($_SESSION['name'])."</span>\n"); ?></h1>
<?php
if ( isset($_SESSION['error'])) {
    echo('<h2 class="warning">'.htmlentities($_SESSION['error'])."</h2>\n");
    unset($_SESSION['error']);
}
?>
<div class="container">
    <form method="post">
        <label for="make-car">Make</label>
        <input class="input-bar" type="text" name="make" id="make-car" >
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
