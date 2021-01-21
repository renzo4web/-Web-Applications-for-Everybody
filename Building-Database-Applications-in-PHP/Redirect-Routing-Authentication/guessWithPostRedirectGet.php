<?php
// Set the session up
session_start();
$rndNum = 25;
if (isset($_POST['guess'])) {
    // If data from post , then stored in the superglobal $_SESSION
    $guess = strval($_POST['guess']);
    $_SESSION['guess'] = $guess;
    if ($_SESSION['guess'] > $rndNum) {
        $_SESSION['msg'] = "TO HIGH";
    } elseif ($_SESSION['guess'] < $rndNum) {
        $_SESSION['msg'] = "TO LOW";
    } else {
        $_SESSION['msg'] = "WIN THE NUM IS " . $rndNum;
    }
    //Redirect method GET
    header("Location: guessWithPostRedirectGet.php");
    // And Quit
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
    <title>Guess</title>
</head>
<body>
<h1>Guess the num</h1>
<?php
// If come from GET with the data stored in $_SESSION
$guess = isset($_SESSION['guess']) ? $_SESSION['guess'] : "";
$message = isset($_SESSION['msg']) ? $_SESSION['guess'] : false;
?>
<?php
if ($message !== false) {
    echo "<h3>Old guess = {$message}</h3>";
}
?>
<form method="POST">
    <label for="guess">The Num is :</label>
    <input type="number" name="guess" id="guess">
</form>
<?php
echo $_SESSION['msg'];
?>

</body>
</html>
