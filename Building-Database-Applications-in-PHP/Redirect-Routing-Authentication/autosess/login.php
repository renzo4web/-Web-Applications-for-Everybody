<?php
session_start();
require_once "pdo.php";

$stored_hash = password_hash("php123",PASSWORD_DEFAULT);

$failure  = false;

if (isset($_POST['email']) && isset($_POST['pass'])){

    if(strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1){
        $failure = "Email and password are required";

    }else{

        $email = $_POST['email'];
        $password = ($_POST['pass']);


        if( password_verify($password,$stored_hash) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['name']  = $_POST['email'];
            header("Location: ./view.php");
            error_log("Login success ".$_POST['email']);
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Email must have an at-sign (@)";
            header("Location: login.php");
            return;
        }else{
            $_SESSION['error'] = "Incorrect password";
            header("Location: login.php");
            error_log("Login fail ".$_POST['email']." $password");
            return;
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
    <link rel="icon" href="./img/favicon.ico">
    <title>Login Renzo Barrios 892c2238</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if ( isset($_SESSION['error']) ) {
    echo('<h2 class="warning">'.htmlentities($_SESSION['error'])."</h2>\n");
    unset($_SESSION['error']);
}
?>

        <h1>Please Log in</h1>
    <div class="container">
        <form method="post">
            <label for="username-email">Email</label>
            <input class="input-bar" type="text" id="username-email" name="email">
            <br>
            <label for="pass">Password</label>
            <input class="input-bar" type="text" id="pass" name="pass" min="3">
            <br>
            <input class="btn btn-login" type="submit" value="Log In" name="sended">
            <input class="btn btn-login" type="submit" value="cancel" name="cancel">
        </form>
    </div>

</body>
</html>
