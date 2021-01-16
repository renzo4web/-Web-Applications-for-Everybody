<?php
require_once "pdo.php";
$failure  = false;
$name = "";
if(!isset($_GET['name'])){
    die("Name parameter missing");
}else if (isset($_POST['logout'])){
    header("Location: login.php");
}else{
    $name = $_GET['name'];
    if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) ){
        if( strlen($_POST['make']) < 1  ){
            $failure = "Make is required";


        }else{

            if( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ){
                $failure = "Mileage and year must be numeric";
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
                    $failure = "Record inserted";

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
    <title>Tracking Autos</title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if ( $failure !== false ) {
    echo('<h2 class="warning">'.htmlentities($failure)."</h2>\n");
}
?>
            <h1>Tracking Autos for :<?php echo(' <span class="accent-color">'.htmlentities($name)."</span>\n"); ?></h1>
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
        </div>

</body>
</html>
