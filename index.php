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

  if (isset($selAll)){ $smarty->assign('cnp', 'true'); }

  if (isset($_GET['id']) && !empty($_GET['id'])) {

    $selAll = $pdo->prepare("SELECT contenu FROM messages WHERE id=?");
    $selAll->bindValue(1, $_GET['id']);
    $selAll->execute();
    $data = $selAll->fetch();
    $data = $data['contenu'];
    $smarty->assign('inst', $data);
  }
  // afficher 4 messages par pagee
  $mesParPage = 4;
  $nombre = ($_GET['page']-1)*$mesParPage;

  // les requet pour la pagination
  $count = $pdo->query('SELECT * FROM messages');
  $reqAffiche = $pdo->query('SELECT m.*, pseudo FROM messages m INNER JOIN utilisateurs u ON m.user_id = u.id ORDER BY m.id DESC LIMIT 4 OFFSET '.$nombre.'');
  $reqAffiche->execute();
	//Nous récupérons le nombre des pages dans $rTotal
  $rTotal = $count->rowCount();
	// nombre de page
  $nombreDePages=ceil($rTotal/$mesParPage);
	//verivication des  ingesction
  $mailVerf = '/[a-z0-9_]+@[a-z0-9]+\.[a-z0-9]+/';
  $tweetVerif = '/#([a-z\d-]+)/';
  $verifUrl = '/https?:\/\/[w{3}\.]*[a-z0-9_-]+\.[a-z]{2,3}.*/';
  $nb=0;
  $MesTab = [];
	//boucle pour les insert des contenu
  while($insertion = $reqAffiche->fetch())
  {
    /*echo "<pre>";
    print_r ($insertion);
    echo "</pre>";
    exit();*/
    $array=array();
    $string=$insertion['contenu'];
  /*  $crpar=$insertion['pseudo'];
    $creeLe=$insertion['creeLe'];*/
	    if(preg_match_all($mailVerf,$string,$array,PREG_SET_ORDER)) {
	      $insertion = preg_replace($mailVerf,'<a href="mailto:'.$array[0][0].'">'.$array[0][0].'</a>',$string);

        /*echo "<pre>";
        print_r ($array);
        echo "</pre>";
        exit();*/

	    }elseif(preg_match_all($tweetVerif,$string,$array,PREG_SET_ORDER)) {
	      $insertion = preg_replace($tweetVerif,'<a href="recherche.php">'.$array[0][0].'</a>',$string);

	    }elseif(preg_match_all($verifUrl,$string,$array,PREG_SET_ORDER)){
	      $insertion = preg_replace($verifUrl,'<a href="'.$array[0][0].'">'.$array[0][0].'</a>',$string);

	    }else{
	      $insertion = $insertion['contenu'];
      //  $insertion =$insertion['pseudo'];
      //  $insertion =$insertion['creeLE'];
      //  $insertion =$insertion['id'];
	    }
      /*$MesTab[$nb][0] = $crpar;
      $MesTab[$nb][3] = $string;*/
    //  $nb++;
      array_push($MesTab, $insertion);
  }

  $smarty->assign('lesContenus', $MesTab);
  //condition pour rester sur la page 1 , de ne pas aller en - quelquechose
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
