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
    h1 img{
      margin:none;
      padding:none;
      height: none

    }
    input[type=number]:hover::-webkit-inner-spin-button {
    width: 50px;
    height: 100px;
}

    body {
      overflow-y: hidden; /* Hide vertical scrollbar */
      overflow-x: hidden; /* Hide horizontal scrollbar */
    }
    </style>

    <body>
      <?php
        require 'head.php';
        require 'menu.php';      ?>
            <div name="content">
              <?php if(isset($_GET['code'])){
                $code=$_GET['code'];
                $req = "SELECT * FROM produits where code=$code";

                $res = $conn->query($req)or die();
                $data = mysqli_fetch_array($res);

                  $code=$data['code'];
                  $libelle=utf8_encode($data['libelle']);
                  $destImg=$data['img'];
                  $marque=utf8_encode($data['marque']);
                  $prix=$data['prix'];
                  $pourcentAlcool=$data['pourcentAlcool'];
                  $description=utf8_encode($data['description']);

                  echo "<table><tr><td><img src=\"imgToDetail.php?img=$destImg\"></td><td>";
                  echo "<table>
                            <tr><td><h2 style=\"margin:0;\">$libelle</h1></td></tr>
                                  <tr><td><p style=\"color:gold;\">$prix €</p></td></tr>
                                  <tr><td><p>Marque : $marque</p></td></tr>
                                  <tr><td><p>Pourcentage d'alcool : $pourcentAlcool °</p></td></tr>
                                  <tr><td><p>$description</p></td></tr>";
                  // Faire un petit espace entre les informations et le bouton d'achat
                  echo "<tr><td><br></td></tr>
                        <tr><td>
                        <form action=\"\" method=\"POST\">
                          <input type=\"number\" value=1 name=\"qte\" min=\"1\" max=\"20\" style=\"text-align:center;margin-left:30%;font-size:20;font-weight:bold;height:100;width: 300;\"/>
                          <input type=\"submit\"  name=\"validation\" value=\"Acheter\"style=\"font-size:20;font-weight:bold;margin-left:5%;height:100;width:450;background-color:darkgreen;\">
                        </form>
                        </td></tr></table></td></tr></table>";


              }else{
                header('location:index.php');
              }



              if(isset($_POST['validation']) && isset($_SESSION['ID']) ){
                $idUser=$_SESSION['ID'];
                $qte=$_POST['qte'];
                $req = "INSERT INTO paniers values ($code,$idUser,$qte)";

                $res = $conn->query($req)or die();
                header('location:panier.php');
              }else if(isset($_POST['validation'])){
                header('location:identification.php?erreur="1"');
              }
?>
        </div>
    </body>
</html>
<?php
CloseCon($conn);
 ?>
