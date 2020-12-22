<p>Hellosdsdd</p>

<?php $oldname = isset($_POST["name"]) ? $_POST["name"] : "" ; ?>

<form method="POST">
    <input type="text" name="name" id="name" value="<?= htmlentities($oldname)   ?>">
    <label for="guess">Name</label>
    <br>
    <input type="number" name="old" id="old">
    <label for="old">Your Age</label>
    <br>
    <input type="password" name="pw" id="pw">
    <label for="pw">Your Pass</label>
    <br>
    <textarea id="commentary" name="commentary" placeholder="Typer Nithing">
    </textarea>
    <br>
    <label for="yes">Yes</label>
    <input type="radio" value="yes" name="liked" id="yes"  />
    <br>
    <label for="no">No</label>
    <input type="radio" value="No" name="liked" id="No"  />
    <br>
    <label for="computers">Chose Your Favorite Drive</label>
    <select name="drive" id="computers">
        <option value="0">Please Select</option>
        <option  value="mac">MAc</option>
        <option  value="win">Windows</option>
        <option  value="linux">Linux/GNU</option>
        <option  value="bsd">FreeBSD</option>
    </select>

    <br>
    <input type="submit" value="Send">

</form>

<pre>

<?php
$arr = $_POST["commentary"];

print_r($_POST);
print_r($_POST["name"]);
print_r($_POST["name"]);
print_r($_POST["pw"]);
print_r($_POST["commentary"]);
print_r($_POST["liked"]);
print_r($_POST["drive"]);
var_dump( trim($arr) );

$oldname = isset($_POST["name"]) ? $_POST["name"] : "" ;

echo $oldname;


?>
</pre>


<pre>

<?php
print_r($_GET);
print_r($_GET["old"]);
?>




</pre>