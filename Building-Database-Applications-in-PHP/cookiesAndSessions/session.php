<?php
     // If we are use $_SESSION is obligatory to use session_start()
    session_start();
    if(!isset($_SESSION['pinta'])){
        echo "<h2>Session Empty</h2>";
        $_SESSION['pinta'] =  1;
    }else if ($_SESSION['pinta'] < 3){
        $_SESSION['pinta'] += 1;
        echo "<h2>Add 1 to value of pinta</h2>";
    }else{
        session_destroy();
        session_start();
        echo "<h2>Session Destroy</h2>";
    }

?>

<pre>
    <a href="session.php">Click Here to sum</a>
    <p>Session id is : <?php echo session_id() ?></p>
    <?php
    print_r($_SESSION)
    ?>
</pre>
