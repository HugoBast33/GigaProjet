<?php
session_start();
?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <style>
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
            <br><br>
                <h2 style='text-align:center; color:rgb(183, 0, 255);'>Page d'inscription</h2>
                <br><br><br>
                <form action="verifinscription.php" method="POST">
                <table name="login">
                    <tr>
                        <td>
                            Nom :
                        </td>
                        <td>
                            <input type ="text" name="nom" require/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Prenom :
                        </td>
                        <td>
                            <input type ="password" name="prenom" require/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email :
                        </td>
                        <td>
                            <input type ="text" name="email" require/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Login :
                        </td>
                        <td>
                            <input type ="text" name="login" require/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mots de passe :
                        </td>
                        <td>
                            <input type ="password" name="mdp" require/>
                        </td>
                    </tr>
                </table>
                <center>
                <br><br><br><br>
                <input type="submit" value="Connexion" style="width:400px;line-height:50px;">
                </center>

                </form>
            </div>
        </div>
    </body>
</html>
