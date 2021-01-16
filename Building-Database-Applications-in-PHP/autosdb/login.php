<?php

$stored_hash = password_hash("php123",PASSWORD_DEFAULT);
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$failure  = false;

if (isset($_POST['email']) && isset($_POST['pws'])){

    if(strlen($_POST['email']) < 1 || strlen($_POST['pws']) < 1){
        $failure = "Email and password are required";

    }else{

        $email = $_POST['email'];
        $password = ($_POST['pws']);


        if( password_verify($password,$stored_hash) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: autos.php?name=".urlencode($_POST['email']));
            error_log("Login success ".$_POST['email']);
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $failure = "Email must have an at-sign (@)";
        }else{
            $failure= "Incorrect password";
            error_log("Login fail ".$_POST['email']." $password");
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if ( $failure !== false ) {
    echo('<h2 class="warning">'.htmlentities($failure)."</h2>\n");
}
?>

        <h1>Please Log in</h1>
    <div class="container">
        <form method="post">
            <label for="username-email">Email</label>
            <input class="input-bar" type="text" id="username-email" name="email" >
            <br>
            <label for="pws">Password</label>
            <input class="input-bar" type="text" id="pws" name="pws" min="3">
            <br>
            <input class="btn btn-login" type="submit" value="send" name="sended">
            <input class="btn btn-login" type="submit" value="cancel" name="cancel">
        </form>
    </div>

</body>
</html>
