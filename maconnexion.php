<?php

include('includes/connexion.inc.php');
include('includes/haut.inc.php');
require_once('vendor/smarty/Smarty.class.php');
$connexion=new Smarty();
// teste des variable sur smarty
$connexion->assign('hello hello', 'ceci est un test');

// verification de l'envoi des donnée
if(isset($_POST['submit']) && !empty($_POST['submit'])){

	if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])){
		$select='SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp ';
		$query=$pdo->prepare($select);
		$query->bindValue(':pseudo', $_POST['pseudo']);
    $query->bindValue(':mdp', $_POST['password']);
    $query->execute();

		$resul=$query->fetch();
		$resulReq=$query->rowcount();

		if ($resulReq > 0){
			echo "vous etes";
			$sid = md5($_POST['pseudo'].time());
			$miseajour ="UPDATE utilisateurs SET sid = :sid where pseudo = :pseudo AND mdp = :mdp";
			$query=$pdo->prepare($miseajour);
			$query->bindValue(':pseudo', $_POST['pseudo']);
			$query->bindValue(':mdp', $_POST['password']);
			$query->bindValue(':sid', $sid);
			$query->execute();
			//creation du cookie
			setcookie('pseudo',$sid,time()+60*5,null,null,false,true);
			header('location: index.php');

		}else{

			echo "PAS D'UTILISATEUR";
			header('location: connexion.php');

		}
}}
$connexion->display('vue/form_con.tpl');


?>
