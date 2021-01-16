<?php
require_once "pdo.php";
$notification  = false;
$showCars = false;
$name = "";
if(!isset($_GET['name'])){
    die("Name parameter missing");
}else if (isset($_POST['logout'])){
    header("Location: login.php");
}else{
    $name = $_GET['name'];
    if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ){
        if( strlen($_POST['make']) < 1  ){
            $notification = "Make is required";


        }else{

            if( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ){
                $notification = "Mileage and year must be numeric";
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
                $notification = "Record inserted";

            }
        }



    }


}

$showCars =true;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracking Autos Renzo Barrios 2eee6c2a</title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>

            <h1>Tracking Autos for :<?php echo('<span class="accent-color">'.htmlentities($name)."</span>\n"); ?></h1>
            <?php
            if ( $notification !== false && $notification != "Record inserted" ) {
                echo('<h2 class="warning">'.htmlentities($notification)."</h2>\n");
            }else if ($notification == "Record inserted" ){
                echo("<h2 class='success'>Record inserted</h2>");
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
                <input class="btn btn-logout" type="submit" value="logout" name="logout">
            </form>
            <?php
                if($showCars !== false){
                    echo "<h3 class='accent-color'>Automobiles</h3>";
                    $sqlShow = "SELECT * FROM autos ";
                    $stmtShow = $pdo->query($sqlShow);
                    while ($row = $stmtShow->fetch(PDO::FETCH_ASSOC)){
                        $mke = htmlentities($row['make']);
                        echo "<table><tr><td>{$mke}</td><td>{$row['year']}</td><td>{$row['mileage']}</td></tr> </table>";
                    }

                }
            ?>
        </div>

</body>
</html>
