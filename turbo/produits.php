<?php
session_start();
include 'connexion.php';
$cont = OpenCon();
    if(isset($_GET['categorie'])){
        $categorie=$_GET['categorie'];

        $afficher=true;
    }else{
        $afficher=false;
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
        img{
            margin-left:20pt;
        }
        td[id=img]{
            border:4px black solid;
        }
        body {
          overflow-y: hidden; /* Hide vertical scrollbar */
          overflow-x: hidden; /* Hide horizontal scrollbar */
        }
    </style>
    <body>
      <?php
        require 'head.php';
        require 'menu.php';
        ?>
            <div name="content">
                    <?php
                        echo " <div id=\"base\">
                        <h2 align=\"center\">Catégorie</h2><br><br>
                        <table >
                            <tr>
                                <td id='img'><a onClick=\"location.href='afficherProduits.php?categorie=biere'\"><img src=\"imgToVignette.php?img=biere\ (1).png\" title=\"Bière\"></a></td>
                                <td id='img'><a onClick=\"location.href='afficherProduits.php?categorie=whisky'\"><img src=\"imgToVignette.php?img=whisky\ (1).png\" title=\"Rhum\"></a></td>
                                <td id='img'><a onClick=\"location.href='afficherProduits.php?categorie=rhum'\"><img src=\"imgToVignette.php?img=rhum\ (1).png\" title=\"Whisky\"></a></td>
                            </tr>
                            <tr>
                                <td style=\"text-align:center;\"><a onClick=\"location.href='afficherProduits.php?categorie=biere'\">Bière</a></td>
                                <td style=\"text-align:center;\"><a onClick=\"location.href='afficherProduits.php?categorie=whisky'\">Rhum</a></td>
                                <td style=\"text-align:center;\"><a onclick=\"location.href='afficherProduits.php?categorie=rhum'\">Whisky</a></td>
                            </tr>
                        </table></div>";

            ?>
            </div>
        </div>
    </body>
</html>
<?php
CloseCon($cont);
 ?>
