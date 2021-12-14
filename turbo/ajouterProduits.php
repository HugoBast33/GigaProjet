<!-- INSERT INTO `produits` (`code`, `libelle`, `marque`, `description`, `prix`, `img`, `codeCat`) VALUES ('1', 'Bière ALMA ', 'IPA', 
'Avis à tous les amateurs recherchant une bière blonde, session IPA, légèrement amer, houblonnée et fruitée pour accompagner leur été. ', '4', 'biere\\ (1).png', '1')  -->

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
        table td {
            border:4px solid black;
            
        }
        input[type=text]{   
            height:40;
            width:100%;
            font-size:24px;
        }
        td[id=champ]{   
            height:500%;
            width:500%;
            font-size:24px;
        }
        table[name=formulaire]{
            height:100%;
            width:100%;
        }
    </style>
    <body>
      <?php
        require 'head.php';
        require 'menu.php';      ?>
            <div name="content">
                <h2>Ajouter un produit</h2>
                <form id="ajout" action="" method="POST">
                <table id="formulaire" style="border:4px solid black;">
                    <tr>         <td>Libelle</td><td id="champ"><input type="text" name="libelle"/></td>
                    </tr><tr>    <td>Marque</td><td id="champ"><input  type="text" name="marque"/></td>
                    </tr><tr>    <td>Description</td><td id="champ"><textarea form ="ajout" name="taname" id="taid" cols="208%" wrap="soft"></textarea>
                    </tr><tr>    <td>Prix</td><td id="champ"><input type="number" step="0.01"></td>
                    </tr><tr>    <td>Image</td><td id="champ"><p> Depuis votre PC  <input  type="file" name="image"/>     Depuis le serveur WWW  <input  type="button" onClick="afficherS()"  value="Parcourir..." name="image1"></p></td><input type="hidden" name="destimage"/>
                    </tr><tr>    <td>Catégorie</td><td id="champ"><input  type="text" name="categorie"/></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>
