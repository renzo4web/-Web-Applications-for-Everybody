<?php
session_start();
require_once "pdo.php";

if(!isset($_SESSION['account'])){
    die("ACCESS DENIED");
}

if(isset($_GET['autos_id'])){

    if(!is_numeric($_GET['autos_id'])){
        $_SESSION['error'] = "Bad value for id";
        header("Location: index.php");
        return;
    }
    try {

        $id = htmlentities($_GET['autos_id']);
        $sql = "SELECT * FROM autos WHERE (:id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        $row = ($stmt->fetch(PDO::FETCH_ASSOC));
            $makeVal = $row['make'];
            $modelVal = $row['model'];
            $yearVal = $row['year'];
            $mileageVal = $row['mileage'];

            echo "<div class='container'><form method='post'><label for='make-car'>Make</label><input class='input-bar' type='text' name='make' id='make-car' value='{$makeVal}'><br><label for='model-car'>Model</label><input class='input-bar' type='text' name='model' id='model-car' value='{$modelVal}'><br><label for='year-car'>Year</label><input class='input-bar' type='text' name='year' id='year-car' value='{$yearVal}'><br><label for='mileage-car'>Mileage</label><input class='input-bar' type='text' name='mileage' id='mileage-car' value='{$mileageVal}'><br><input class='btn' type='submit' name='0' value='Save'></form><a class='btn btn-logout' href='index.php'>Cancel</a></div>";

        // Try Catch only show the error and no secret information
    }catch (Exception $ex){
        error_log("Exception message: ".$ex->getMessage());
        $_SESSION['error'] = "Bad value for id";
        header("Location: index.php");
        return;
    }




}




if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage'])){

    // check input
    if(empty($_POST['make']) || empty($_POST['model'])  || empty($_POST['year']) ||empty($_POST['mileage'])  ){
        $_SESSION['error'] = "All fields are required";
        header("Location: edit.php?autos_id=".$_GET['autos_id']);
        return;
    }

    if(!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])){
        $_SESSION['error'] = "Year must be an integer";
        header("Location: edit.php?autos_id=".$_GET['autos_id']);
        return;
    }
    // Add entry

    $sqlQuery = "UPDATE `autos` SET make = :make,`model`=:model, `year`=:year, `mileage`=:mileage WHERE autos_id=:id";
    $stmt = $pdo->prepare($sqlQuery);
    $stmt->execute(array(
            ":id" =>$id,
        ':make' => htmlentities($_POST['make']),
        ':model' => htmlentities($_POST['model']),
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
    ));
    $_SESSION['success'] = "Record Edited";
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
    <title>Renzo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Editing Automobile</h1>

<?php
if (isset($_SESSION['error'])) {
echo("<h2 class='warning'>{$_SESSION['error']}</h2>");
unset($_SESSION['error']);}

?>




</body>
</html>
