<?php
if(isset($_GET['img'])){
    $img=$_GET['img'];
    include("imgresize.php");
    resize(600,"img/$img","img/$img");
}
?>
