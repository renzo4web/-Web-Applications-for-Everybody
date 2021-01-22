<?php
session_start();

if (isset($_POST['account']) && isset($_POST['pw'])) {
    unset($_SESSION['account']);//Logout current User

    if ($_POST['account'] === "renzo" && $_POST['pw'] === "php123") {
        $_SESSION['account'] = $_POST['account'];
        $_SESSION['success'] = "Loge";
        header("Location: app.php");
        return;
    } else {
        $_SESSION['error'] = "Incorrect password";
        header("Location: login.php");
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
    <title>login Logout</title>
</head>
<body>
<?php

//FLASH messages always unset after display.
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>{$_SESSION['error']}</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color:green'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}

?>
<h1>Please log in</h1>

<form method="post">
    <label for="name">Username</label>
    <input type="text" id="name" name="account">
    <br>
    <label for="pass">Password</label>
    <input type="password" id="pass" name="pw">
    <br>
    <input type="submit" value="Login">
</form>
<a href="app.php">Cancel</a>

</body>
</html>
