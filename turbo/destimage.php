<?php
function dirToArray($dir) {
  
   $result = array();

   $cdir = scandir($dir);
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
  
   return $result;
}
?>



<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <header>
        <title>Turbo Gnole</title>
    </header>
    <body>
      <?php      ?>
            <div name="content">
                <table>
                    <?php
                    $imgs=(dirToArray("img"));
                    $cat=array_keys($imgs);
                    print_r($cat);
                    asort($imgs);
                    $cat=array_keys($imgs);
                    print_r($cat);
                    $i=0;
                        foreach ($imgs as $key => $value){
                            if(  gettype($value)=="string"){
                                echo "<tr><td><img src=\"imgToVignette.php?img=$value\" />$value</td></tr>";
                            } else if(  gettype($value)=="array"){
                                $categ=$cat[$i];
                                echo "<tr><td><h2>$categ</h2></td></tr>";
                                foreach ($value as $key => $child){
                                    echo "<tr><td><img src=\"imgToVignette.php?img=$categ/$child\" /></td><td>$child</td></tr>";
                                }
                            }
                            $i++;
                        }  
                    ?>
                </table>
            </div>
    </body>
</html>
