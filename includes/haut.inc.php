<?php
require("vendor/smarty/Smarty.class.php"); 
$haut=new smarty();
$haut->assign("connecte",$connecte);
$haut->display('vue/haut.tpl');

 ?>
