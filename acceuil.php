<html>

<h1> MY GIGA PROJECT TAH BILL GATES </h1>


<p> this site look so cool </p>

<form action="acceuil.php" method="post">
 <p>Votre nom : <input type="text" name="nom" /></p>
 <p>Votre âge : <input type="text" name="age" /></p>
 <p><input type="submit" value="OK"></p>
</form>


</html>


<?php

echo $_POST['nom'].'<br>'.$_POST['age'];

file_put_contents('./form.text', $_POST['nom'].' '.$_POST['age']);


?>
