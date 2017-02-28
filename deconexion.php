<?php
	setcookie('pseudo','$sid',time()-1,null,null,false,true);
	header('location: index.php');

?>
