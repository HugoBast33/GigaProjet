<?php
if(session_is_registered){
    session_start();
    session_destroy();
}
header('Location:index.php');
?>