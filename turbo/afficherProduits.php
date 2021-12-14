<?php
session_start();
include 'connexion.php';
$conn = OpenCon();

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <style>
    td{
      text-align: center;
      color:gold;
    }
    </style>

    <body>
      <?php
        require 'head.php';
        require 'menu.php';      ?>
            <div name="content">
              <?php     if(isset($_GET['categorie'])){
                      $categorie=$_GET['categorie'];


                  $req = "SELECT * FROM produits where codeCat in (SELECT code FROM categories where libelle='$categorie' )";
                  // on envoie la requête
                  $res = $conn->query($req)or die();

                  $compteur=0;
                  echo "<table width=100% ><tr>";
                  while($data = mysqli_fetch_array($res)){

                    $code=$data['code'];
                    $libelle=utf8_encode($data['libelle']);
                    $destImg=$data['img'];
                    $marque=utf8_encode($data['marque']);
                    $prix=$data['prix'];
                    $pourcentAlcool=$data['pourcentAlcool'];

                    echo "<td valign=\"top\"><button onClick=\"location.href='detail.php?code=$code'\" style=\"background:none;border:none;\"><table>";
                                              echo "<tr><td><img src=\"imgToVignette?img=$destImg\"/></td></tr>";
                                              echo "<tr><td>$libelle</td></tr>";
                                              echo "<tr><td>$marque</td></tr>";
                                              echo "<tr><td>$prix €</td></tr>";
                                              echo "<tr><td>$pourcentAlcool %</td></tr>";
                                        echo "</table></td></button>";
                    $compteur++;
                    if($compteur == 3){
                      echo "</tr><tr>";
                      $compteur=0;
                    }
                  }
                  echo "</tr></table>";
    }
?>
        </div>
    </body>
</html>
