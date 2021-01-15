<?php
require_once "./SQl-Queries.php";


// Add to database
if(isset($_POST["name"]) && isset($_POST["pw"]) && isset($_POST["email"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pw = $_POST["pw"];
    // Placeholder to avoid injection :placeholder
    $sql = "INSERT INTO Usuarios (name,email,pw) VALUES (:name,:email, :pw)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":name" => $name, ":email" => $email, ":pw" => $pw]);
       // Try Catch only show the error and no secret information
    }catch (Exception $ex){
        echo("Internal Error, Please contact support");
        error_log("Exception message: ".$ex->getMessage());
        return;
    }

}
if(isset($_POST['toDelete'])){

    // Delete from database
// Is not necessary use isset[$_POST[toDelete] because the user is in the table already
    $stmtDelete = "DELETE FROM `Usuarios` WHERE user_id=(:name)";
// Make the User_id a var
    $userToDelete= $_POST['toDelete'];
// Prepare the statement
    $stmtDelete = $pdo->prepare($stmtDelete);
// Execute
    $stmtDelete->execute([":name" => $userToDelete]);

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
    <title>Register</title>
</head>
<body>
<?php
// Show THe Members
echo "<pre>\n";
$sqlShow = "SELECT * FROM Usuarios";
$stmt_show = $pdo->query($sqlShow);
while($row = $stmt_show->fetch(PDO::FETCH_ASSOC)){
    echo "<form action='login.php' method='post'><table border='1'><tr><th>ID</th><th>Name</th><th>Email</th></tr><tr><td>{$row["user_id"]}</td> <td>{$row["name"]}</td><td>{$row["email"]}</td></tr></table> <input  type='hidden' name='toDelete' value={$row['user_id']}/> <input type='submit' value='DELETE'></form>";
}
echo "</pre>\n";
?>

    <h1>Welcome To The Great Course</h1>
    <h2>Register to Enter </h2>

    <form action="login.php" method="POST">
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

   <a class="btn" href="./LoginSucces.php">Login</a>

</body>
</html>
