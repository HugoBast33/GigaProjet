<?php
session_start();
include 'connexion.php';
$cont = OpenCon();
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
    </style>
    <body>
      <?php
        require 'head.php';
        require 'menu.php';      ?>
            <div name="content">
                <h2 align="center">Produit du mois</h2>
                <table>
                    <tr>
                        <td>
                            <img src="imgToVignette.php?img=jack.png">
                        </td>
                        <td>
                            <p name="pdm" style='margin:0;font-size:36pt;padding-top:15;padding-bottom:15;padding-left:40;padding-right:40;margin-left:40px;color:gold;text-align:justify;'> L’alliance de Jack Daniel’s Tennessee Whiskey et d’une liqueur de miel exclusive produite
                              par nos soins pour un goût onctueux et incontestablement Jack. Avec une pointe de miel et une note finale naturellement douce,
                               Jack Daniel's Honey offre un goût d'inattendu.</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
CloseCon($cont);
 ?>
