<?php
$pdo = new PDO('mysql:host=localhost;dbname=mouha-mdallahmari-blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connecte=false;

	if(isset($_COOKIE['pseudo']))
	{
		$trace=$_COOKIE['pseudo'];
		$query="Select * from utilisateurs where sid=?";
		$prep=$pdo->prepare($query);
		$prep->bindValue(1,$trace);
		$prep->execute();
		$connecte=true;

	}
