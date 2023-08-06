<?php
foreach (glob('temp/Bright Race MotoGP.arproj/*') as $file) {
    echo $file."<br/>";
    echo basename($file)."<br/><br/>";
}   
?>