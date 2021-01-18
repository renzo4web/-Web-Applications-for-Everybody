<?php
    if(!isset($_COOKIE['pinta'])){
      setcookie("pinta","10",time()+3600);
    }
?>

<pre>
    <?php
    print_r($_COOKIE);
    ?>
</pre>
<a href="cookie.php">Click Me or Refresh</a>

