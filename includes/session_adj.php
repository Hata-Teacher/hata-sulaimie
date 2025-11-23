<?php
//-- mengubah batas pergerakan jarum ukur.
//-- batas kiri diubah menggunakan INFINITY KNOB (simulasi fungsi infinity knob)
//-- batas kanan diubah menggunakan ZERO OHM ADJUSTER (simulasi kalibrasi Ohm meter)
session_start();
extract($_REQUEST);
switch($adj){
  case "L":
    if($oper=="set")$_SESSION["batasL"]=$data;
    if($oper=="get"){
      if(!isset($_SESSION["batasL"]))$_SESSION["batasL"]=-45;
    }
    echo($_SESSION["batasL"]);
    break;
  case "R":
    if($oper=="set")$_SESSION["batasR"]=$data;
    if($oper=="get"){
      if(!isset($_SESSION["batasR"]))$_SESSION["batasR"]=45;
    }
    echo($_SESSION["batasR"]);
    break;    
}
?>