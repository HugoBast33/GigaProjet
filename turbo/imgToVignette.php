<?php
if(isset($_GET['img'])){
    $img=$_GET['img'];
    include("imgresize.php");
    resize(400,"img/$img","img/$img");
}
?>