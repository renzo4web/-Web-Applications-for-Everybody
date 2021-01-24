<?php
session_start();

$stored_hash = password_hash("php123", PASSWORD_DEFAULT);

if (isset($_POST['email']) && isset($_POST['pass'])) {
    // Check input
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $_SESSION['error'] = 'User name and password are required';
        header("Location: login.php");
        return;
    } else {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if (password_verify($_POST['pass'], $stored_hash) && $email === "umsi@umich.edu") {
            // Check if in the database
            unset($_SESSION['account']);
            $_SESSION['account'] = $_POST['email'];
            header("Location: index.php");
            return;
        }else {
                $_SESSION['error'] = 'Incorrect password';
                header("Location: login.php");
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
    <link rel="stylesheet" href="style.css">
    <title>Renzo Barrios 09ad6b97</title>
</head>
<body>


<div class="container">

    <?php
    // flash
    if (isset($_SESSION['error'])) {
        echo "<h3 class='warning'>{$_SESSION['error']}</h3>";
        unset($_SESSION['error']);
    }
    ?>


    <h1> Please Log In</h1>

    <form method="post">
        <label for="em">User Name</label>
        <input class="input-bar" type="text" name="email" id="em" value="umsi@umich.edu">
        <br/>
        <label for="pws">Password</label>
        <input class="input-bar" type="text" id="pws" name="pass" value="php123"><br/>
        <input class="input-bar" type="submit" value="Log In">
    </form>
    <a class="btn btn-logout" href="index.php">Cancel</a>
</div>

</body>
</html>
