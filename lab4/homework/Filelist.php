<?php
    $dir = "./upload";
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                echo "filename: $file";
                print("<br></br>");
            }
            closedir($dh);
        }
    }
?>