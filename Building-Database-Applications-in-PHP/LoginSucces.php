<?php
require_once "./SQl-Queries.php";

if(isset($_POST["email"]) && isset($_POST["pws"])){
    $sql = 'SELECT user_id FROM Usuarios WHERE email=(:email) AND pw=(:passw)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":email" => $_POST["email"], ":passw" => $_POST["pws"]));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row === false){
        echo "<h3>Error User Not Found </h3>";
    }else{
        echo "<h3>Login Success</h3>";
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
    <title>Login</title>
</head>
<body>
        <h1>Login</h1>
        <form method="post">
            <label for="email">Enter Email</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="pws">Password</label>
            <input type="password" name="pws" id="pws">
            <input type="submit" value="Send">
        </form>

</body>
</html>