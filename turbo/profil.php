<?php
session_start();
if(isset($_SESSION['ID'])){
    $ID=$_SESSION['ID'];
    include 'connexion.php';
    $cont = OpenCon();



// On récupère les valeurs du profil
$req = "SELECT * FROM utilisateurs where ID='$ID'";
// on envoie la requête
$res = $cont->query($req)or die();

while ($data = mysqli_fetch_array($res)) {
    $login=$data['login'];
    $mdp=$data['mdp'];
    $email=$data['email'];
    $nom=$data['nom'];
    $prenom=$data['prenom'];//print_r($data);
}
$req = "SELECT * FROM admin where ID='$ID'";
// on envoie la requête
$res = $cont->query($req)or die();

$admin=false;
while ($data = mysqli_fetch_array($res)) {

    if($data['ID']){
        $admin=true;
    }
}

CloseCon($cont);
}

?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <body>
      <?php
        require 'head.php';
        require 'menu.php';
        ?>
            <div name="content">
                <div name="profil">
                <br><br>
                    <table border=2px>
                        <tr>
                            <td><h2 style="margin:30px;">Mes actions</h2></td><td><h2 style="margin:30px;">Mes informations</h2></td></tr>
                    <div name="informations">
                        <tr><td>
                        <table style="font-size: 40pt;color:gold;
                        margin: 0;padding:0;">
                            <ul style="text-align:left;margin-left:-100;margin-top:-180">
                                <li>Historique</li><li>Suivi de commande</li>
                                <?php if($admin){
                                    echo "<li>Ajouter produits</li>";
                                    echo "<li>Modifier produits</li>";
                                    echo "<li>Supprimer produits</li>";
                                    echo "<li>Gérer les commandes</li>";
                                }
                                ?>
                            </ul>
                        </table>
                        </td>
                    </div>
                    <td>
                    <form action="modification.php" method="POST">

                    <table style="margin:0;padding:0;">
                    <?php
                        echo "<tr><td style=\"color:gold;\">Modifier</td></tr>";
                        echo "<tr><td>Login*</td><td><input type=\"text\" value=$login name=\"newLogin\"style=\"heigth:200;width:250;\" required/></td></tr>";
                        echo "<tr><td>Mot de passe</td><td><input type=\"text\" name=\"newMdp\" style=\"heigth:200;width:250;\"/></tr>";
                        echo "<tr><td>Nom*</td><td><input type=\"text\" value=$nom name=\"newNom\"style=\"heigth:200;width:250;\"required/></td></tr>";
                        echo "<tr><td>Prenom*</td><td><input type=\"text\" value=$prenom name=\"newPrenom\"style=\"heigth:200;width:250;\"required/></td></tr>";
                        echo "<tr><td>Email*</td><td><input type=\"text\" value=$email name=\"newEmail\"style=\"heigth:200;width:250;\"required/></td></tr>";
                        echo "<tr><td style=\"color:gold;\">Mots de passe actuelle pour valider</td></tr>";
                        echo "<tr><td>Mots de passe*</td><td><input type=\"password\" name=\"oldMdp\"style=\"heigth:200;width:250;\" required/></td></tr>";
                        echo "<tr><td><p style=\"font-size:10pt;text-align:center;color:red;\"> Les * sont des champs obligatoires</p></td></tr>";
                        echo "<tr><td><input type=\"submit\" value=\"Mettre à jour\" style=\"opacity:80%;color:gold;font-size:24;font-weight: bold;heigth:200;width:500;padding:15;margin-top:15;background-color: green;border:0;\"/></td>";
                        echo "<td><input type=\"reset\" style=\"font-weight: bold;color:gold;font-size:24;heigth:200;width:250;padding:15;margin-top:15;background-color: red; border:0;\"></td></tr>";
                    ?>

                    </td></tr>
                    </table>


                    </form>
                </td></tr></table>

                </div>


            </div>
        </div>
    </body>
</html>
<?php
CloseCon($conn);
?>
