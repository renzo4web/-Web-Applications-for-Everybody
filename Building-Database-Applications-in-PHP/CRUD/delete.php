<?php
session_start();
require_once "pdo.php";


if (isset($_POST['delete'])) {

    $id = htmlentities($_GET['autos_id']);

    try {

        $sqlDelete = "DELETE FROM autos WHERE autos_id=(:id)";
        $stmtShow = $pdo->prepare($sqlDelete);
        $stmtShow->execute(array(":id" => $id));
        $_SESSION['success'] = "Record deleted";
        header("Location: index.php");
        return;
    } catch (Exception $ex) {
        error_log("Exception message: " . $ex->getMessage());
        $_SESSION['error'] = "Bad value for id";
        header("Location: index.php");
        return;
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
    <title>Deleting 09ad6b97</title>
</head>
<body>
    <?php  echo $_GET['autos_id']  ?>
<div class="container">
    <form method="post">
        <input class="input-bar" type="hidden" name="autos_id" id="make-car" value="<?php $_REQUEST['id'] ?>">
        <input class="btn" type="submit" value="Delete" name="delete">
    </form>
    <a class="btn btn-logout" href="index.php">Cancel</a>
</div>

</body>
</html>
