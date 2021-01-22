<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>
</head>
<body>

<h1>Central Hub</h1>
<?php
    //Flash Success Msg
        if(isset($_SESSION['success'])){
            echo "<p style='color:green'>{$_SESSION['success']}</p>";
            unset($_SESSION['success']);
        }
        // Check is the user is registered
        if(!isset($_SESSION['account'])){
            echo "<p>Please <a href='login.php'>Log in</a>to start</p>";
        }else{
            echo "<p>This is where the magic happen!</p>";
            echo "<p>Please <a href='logout.php'>Log out</a>when you are done.</p>";
        }
?>



</body>
</html>