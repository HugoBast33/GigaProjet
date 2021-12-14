



<?php
session_start();
include 'connexion.php';
$conn = OpenCon();

$erreur=false;
if(sizeof($_POST)>1){
    $login=$_SESSION['login'];
    // On prend le mot de passe de l'utilisateur
    $req = "SELECT mdp FROM utilisateurs where login='$login'";

    // on envoie la requête
    $res = $conn->query($req)or die();
    $data = mysqli_fetch_array($res);
    $mdp=$data['mdp'];

    $erreur=false;

    $newLogin=$_POST["newLogin"];
    $newMdp=$_POST["newMdp"];
    $newNom=$_POST["newNom"];
    $newPrenom=$_POST["newPrenom"];
    $newEmail=$_POST["newEmail"];
    $oldMdp=$_POST["oldMdp"];
    print_r($oldMdp);
    print_r($mdp);
    if ($oldMdp==$mdp){

        if($newMdp==""){
            $newMdp=$oldMdp;
        }

        $req = "UPDATE utilisateurs set login='$newLogin',mdp='$newMdp',email='$newEmail',nom='$newNom',prenom='$newPrenom' where login='$login'";
        // on envoie la requête
        $res = $conn->query($req)or die();
        print_r($res);
        $_SESSION['login']=$newLogin;
    }else{
        $erreur=true;
    }
}else{
    $erreur=true;
}


?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <script type="text/javascript">

        (function () {
        var timeLeft = 5,
        cinterval;

        var timeDec = function (){
        timeLeft--;
        document.getElementById('countdown').innerHTML = timeLeft;
        if(timeLeft === 0){
        clearInterval(cinterval);
        }
        };

        cinterval = setInterval(timeDec, 1000);
        })();

        </script>
    <body>
      <?php
        require 'head.php';
        
        ?>
            <div name="content">
            <br><br><br><br>
                <center>
                <?php 
                    if($erreur){
                        echo "<h2>Modification raté</h2>";
                        echo "<h2 style=\"font-size:20pt;\"> Redirection dans <span id=\"countdown\">5</span> secondes.</h2>";

                    }else{
                        echo "<h2>Modification effectué</h2>";
                        echo "<h2 style=\"font-size:20pt;\"> Redirection dans <span id=\"countdown\">5</span> secondes.</h2>" ;
                    }
                ?>
                </center>
            </div>
        </div>
    </body>
</html>
<?php



if($erreur && isset($_SESSION['login']) ){
    header("Refresh: 5; URL=profil.php");
}else{
    header("Refresh: 5; URL=index.php");
}
?>