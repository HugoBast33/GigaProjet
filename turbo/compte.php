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
                <h2 style='text-align:center; color:rgb(183, 0, 255);'>Page de connexion</h2>
                <br><br><br>
                <form action="verifcompte.php" method="POST">
                <table name="login">
                    <tr>
                        <td>
                            Login :
                        </td>
                        <td>
                            <input type ="text" name="login"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mot de passe :
                        </td>
                        <td>
                            <input type ="password" name="mdp"/>
                        </td>
                    </tr>
                </table>
                <center>
                <br><br><br><br>
                <input type="submit" value="Connexion" style="width:400px;line-height:50px;">
                </center>

                </form>
                <?php
                    if(isset($_GET['erreur']))
                    {
                        echo "<h2 style='color:red;font-size:32pt;text-align:center;'> Login / Mots de passe incorrect(s).</h2>";
                    }

                ?>
            </div>
        </div>
    </body>
</html>
