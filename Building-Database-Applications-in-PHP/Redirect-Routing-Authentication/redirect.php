<?php
session_start();

if (isset($_POST['where'])) {
    $where = $_POST['where'];
    if ($where === "1") {
        header("Location: https://netbeans.apache.org/");
        return;
    } else if ($where === "2") {
        header("Location: https://www.php.net/manual/es/function.filter-input.php");
        return;
    } else {
        header("Location: https://es.stackoverflow.com/questions/334028/parse-error-syntax-error-unexpected-if-t-if");
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redirect</title>
    </head>
    <body>
        <h1>Where you'll like to go?</h1>
        <form method="POST">
            <label for="foo">insert 1-3</label>
            <input type="text" id="foo"  name="where">
            <input type="submit" value="send">
        </form>



    </body>
</html>

