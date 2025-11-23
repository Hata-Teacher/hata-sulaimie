<?php
   extract($_REQUEST);
   $myfile = fopen("nilai_meter.txt", "a") or die("Unable to open file!");
   $date=date("Y-m-d");
   $text=$date."|".$noabs."|".$latihan."|".$jawaban."\n";
   echo($jawaban);
   fwrite($myfile, $text);
   fclose($myfile);
?> 