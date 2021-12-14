<?php
if(isset($_SESSION['ID'])){
    $ID=$_SESSION['ID'];
    include_once  'connexion.php';
    $conn = OpenCon();
}
?>

<html>
    <head>

    </head>
    <body>
<div name="menu">
    <ul>
        <table>
        <tr><td><a href="."><li>Accueil</li></a></td><td><a href="produits.php"><li>Produits</li></td><td><li>Panier</li></td>
        <?php
        if(isset($ID)){
            $req = "SELECT nom,prenom FROM utilisateurs WHERE utilisateurs.ID='$ID'";
            $res = $conn->query($req)or die("");
            while ($data = mysqli_fetch_array($res)) {
                $compte=$data['nom']." ".$data['prenom'];
            }

            //nom prenom si connecté
            echo "<td><a href=\"profil.php\"><li>$compte</li></a></td>";
            // Possibilité de déconnexion
            echo "<td><a href=\"deconnexion.php\"><li>Déconnexion</li></a></td>";
        }
        else{
            $compte="Compte";
            echo "<td><a href=\"compte.php\"><li>$compte</li></a></td>";
            echo "<td><a href=\"inscription.php\"><li>Inscription</li></a></td></tr>";
        }


        ?>

        </table>
    </ul>
</div>
</body>
</html>
