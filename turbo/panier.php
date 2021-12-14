<?php
session_start();
include 'connexion.php';
$cont = OpenCon();
if(isset($_SESSION['ID'])){
  $idUser=$_SESSION['ID'];
}else{
  header('location:compte.php');
}
function Supprimer($user,$code){
  $req = "DELETE FROM paniers FROM produits where idUtilisateur=$user AND codeProduit=$code";
  $res = $conn->query($req1)or die();
  header('location:index.php');
}

?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <style>
        html{
            overflow:hidden;
        }
        p{
          margin:15px;
          text-align: center;
          color:gold;
        }


    </style>
    <body>
      <?php
        require 'head.php';
        require 'menu.php';      ?>
            <div name="content">
                <h2 align="center">Panier</h2>
                <?php
                $totaux=0;
                  $req = "SELECT * FROM paniers where idUtilisateur=$idUser";
                  $res = $conn->query($req)or die();
                  echo "<table border=\"2px\" style=\"color:black;\">";
                  echo "<tr><th></th><th>Libelle</th><th>Quantité</th><th>Prix</th></tr>";
                  while($data=mysqli_fetch_array($res)){
                    $codeP=$data['codeProduit'];
                    $qte=$data['quantite'];

                    $req1 = "SELECT * FROM produits where code=$codeP";
                    $res1 = $conn->query($req1)or die();
                    $data1=mysqli_fetch_array($res1);
                    $prix=$data1['prix'];
                    $img=$data1['img'];
                    $libelle=utf8_encode($data1['libelle']);

                    $total=$prix*$qte;
                    $totaux+=$total;
                    echo "<tr>
                            <td><img src=\"imgToPanier.php?img=$img\"></td><td><p>$libelle</p></td><td><p>$qte</p></td><td><p>$total €</p></td>
                            <td><button onClick=\"window.location.href='suppr.php?id=$idUser&code=$codeP'\" style=\"background:none;border:none;\"><img src=\"img/suppr.png\"></button></td>
                            <td><button onClick('Modification') style=\"background:none;border:none;\"><img src=\"img/modif.png\"></button></td>
                          </tr>";

                  }
                  echo "</table>";
                  echo "<form action=\"paiement.php\" method=\"POST\"><td border=none;>";
                  echo "<table style=\"margin:auto;\"><tr><td><input type=\"submit\" value=\"Paiement\" style=\"margin:0;margin-left:35%;font-size:20;font-weight:bold;margin-left:5%;height:100;width:450;background-color:darkgreen;\"></td></form>";

                  echo "<td style=\"margin:auto;\"><h2 align=\"right\" style=\"margin-right:0;\">Total: $totaux €</h2></td></tr></table>";



                 ?>
            </div>
        </div>
    </body>
</html>
<?php
CloseCon($cont);
 ?>
