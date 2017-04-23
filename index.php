<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');
	//fonction php pour transformer les date en francais
	setlocale (LC_TIME, 'fr_FR','fra');
  // Inclure la librairie smarty
	require_once('vendor/smarty/Smarty.class.php');
	// Instancier notre objet smarty
	$smarty = new Smarty();
  //Si il s'agit de la page actuelle on lui donne 1 pour commencer
  if(!isset($_GET['page'])) { $_GET['page']=1;  }

  $temps = time();
  //Fonction pour modifier un message si user connecté
  if(isset($_GET['id']) && isset($_POST['message']) && !empty($_POST['message']) && $connecte==true)
  {
      $queryupdate = $pdo->prepare("UPDATE messages SET contenu=(:mes), creation=(:update1) WHERE id=:idM");
      $queryupdate->bindValue(':idM', $_GET['id']);
      $queryupdate->bindValue(':update1', $temps);
      $queryupdate->bindValue(':mes', $_POST['message']);
      $queryupdate->execute();
      header('Location: index.php');
  }
  //Fonction pour supprimer un message si user connecté
  if(isset($_GET['idDel']) && !empty($_GET['idDel']) && $connecte==true)
  {
      $querysupp = $pdo->prepare("DELETE FROM messages WHERE id=:del");
      $querysupp->bindValue(':del', $_GET['idDel']);
      $querysupp->execute();
  }
  // verification si l'utilisateur est connecter
  if($connecte==true){ $smarty->assign('connecte', $connecte);  }

  if(!isset($_GET['id'])){ $smarty->assign('linkId', 'false');  }

  if (isset($selectContenu)){ $smarty->assign('contenuPres', 'true'); }

  if (isset($_GET['id']) && !empty($_GET['id'])) {

    $selectContenu = $pdo->prepare("SELECT contenu FROM messages WHERE id=?");
    $selectContenu->bindValue(1, $_GET['id']);
    $selectContenu->execute();
    $data = $selectContenu->fetch();
    $data = $data['contenu'];
    $smarty->assign('tab', $data);
  }
  // afficher 4 messages par pagee
  $mesParPage = 4;
  $nombre = ($_GET['page']-1)*$mesParPage;

  // les requet pour la pagination
  $count = $pdo->query('SELECT * FROM messages');
  $reqAffiche = $pdo->query('SELECT m.*, u.pseudo FROM messages m INNER JOIN utilisateurs u ON m.user_id = u.id ORDER BY m.id DESC LIMIT 4 OFFSET '.$nombre.'');
  $reqAffiche->execute();

	//Nous récupérons le nombre des pages dans $rTotal
  $rTotal = $count->rowCount();
	// nombre de page
  $nombreDePages=ceil($rTotal/$mesParPage);
	//verivication des  ingesction
  $mailVerf = '/[a-z0-9_]+@[a-z0-9]+\.[a-z0-9]+/';
  $tweetVerif = '/#([a-z\d-]+)/';
  $verifUrl = '/https?:\/\/[w{3}\.]*[a-z0-9_-]+\.[a-z]{2,3}.*/';

  $MesTab = array();

	//boucle pour les insert des contenu
  while($insertion = $reqAffiche->fetch())
  {
	    if(preg_match_all($mailVerf,$insertion['contenu'],$out)) {
	      $insertion = preg_replace($mailVerf,'<a href="'.$out[0][0].'">'.$out[0][0].'</a>',$insertion['contenu']);
	    }else if(preg_match_all($tweetVerif,$insertion['contenu'],$out)) {
	      $insertion = preg_replace($tweetVerif,'<a href="recherche.php">'.$out[0][0].'</a>',$insertion['contenu']);
	    }else if(preg_match_all($verifUrl,$insertion['contenu'],$out)){
	      $insertion = preg_replace($verifUrl,'<a href="'.$out[0][0].'">'.$out[0][0].'</a>',$insertion['contenu']);
	    }else{
	      $insertion = $insertion['contenu'];
	    }array_push($MesTab, $insertion);
  }
  $smarty->assign('lesContenus', $MesTab);
  if(($_GET['page']-1) <= 0) {
    $smarty->assign('prec', $_GET['page']);
  }else{
    $smarty->assign('prec', $_GET['page']-1);
  }if(($_GET['page']+1 >$nombreDePages)){
    $smarty->assign('suiv', $_GET['page']);
  }else{
    $smarty->assign('suiv', $_GET['page']+1);
  }
	//assignation de la pagination
  $smarty->assign('pagination', $nombreDePages);
  $smarty->display('vue/index.tpl');
  include('vue/bas.tpl');
?>
