<?php
function mkmap($dir){
    echo "<ul>";   
    $folder = opendir ($dir);
   
    while ($file = readdir ($folder)) {   
        if ($file != "." && $file != "..") {           
            $pathfile = $dir.'/'.$file;           
            echo "<li><a href=$pathfile>$file</a></li>";           
            if(filetype($pathfile) == 'dir'){               
                mkmap($pathfile);               
            }           
        }       
    }
    closedir ($folder);    
    echo "</ul>";   
}
?>

<?php mkmap('upload/'); ?>