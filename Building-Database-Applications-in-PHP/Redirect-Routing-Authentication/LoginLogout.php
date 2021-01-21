<?php
session_start();

if(isset($_POST['who']) && isset($_POST['pw'])){
    unset($_SESSION['who']);//Logout current User
    $_SESSION['who'] = $_POST['who'];
    $_SESSION['pw'] = $_POST['pw'];
    $message = $_SESSION['msg'];
    if ($_SESSION['who'] === "renzo" &&  $_SESSION['pw'] === "php123"){
        $message = "LOGEADO";
    }else{
        $message = "Incorrect Username/Password";
    }
    // Log out session_destroy

}elseif ( isset(  $_POST['cancel'])){
    header('Location: https://www.php.net/manual/es/language.operators.comparison.php');
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
    <title>login Logout</title>
</head>
<body>
<?php

//FLASH

// Login INCORRECT only  is the input data is wrong

// CURRENTLY LOGIN $_SESSION

?>
<h1>Please log in</h1>

<form method="post">
    <label for="name">Username</label>
    <input type="text" id="name" name="who">
    <br>
    <label for="pass">Password</label>
    <input type="password" id="pass" name="pw">
    <br>
    <input type="submit" value="Login">
    <input type="submit" value="Cancel" name="cancel">
</form>


</body>
</html>
