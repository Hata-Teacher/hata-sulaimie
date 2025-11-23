<?php
$dir = "images/icons/animal/";
$icons="";
if(is_dir("../".$dir)){
   if($dh = opendir("../".$dir)){
    while (($file = readdir($dh)) !== false){
      if($file!="." && $file!="..")$icons.="<img src='".$dir.$file."'>|";
    }
    closedir($dh);
   }else{
      $icons="";
   }
   echo($icons);
}
?>