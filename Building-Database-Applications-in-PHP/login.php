<?php
require_once "SQl-Queries.php";

if(isset($_POST["name"]) && isset($_POST["pw"]) && isset($_POST["email"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pw = $_POST["pw"];
    // Placeholder to avoid injection :placeholder
    $sql = "INSERT INTO Usuarios (name,email,pw) VALUES (:name,:email, :pw)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":name" => $name, ":email" => $email, ":pw" => $pw]);

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
    <h1>Welcome To The Great Course</h1>

    <form method="POST">
        <label for="user">Name</label>
        <input type="text" id="user" name="name" required size="40" >
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="pws">Password</label>
        <input type="password" id="pws" name="pw" minlength="4">
        <br>
        <input type="submit" value="SEND">
    </form>



</body>
</html>
