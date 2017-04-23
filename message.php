<?php
include('includes/connexion.inc.php');

if (isset($_POST['message']) && !empty($_POST['message'])) {

          $maintenant = time();

        $query = 'INSERT INTO messages (contenu,creeLe,user_id) VALUES (?,?,?)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(1, $_POST['message']);
        $prep->bindValue(2, $maintenant);
        $prep->bindValue(3, $id_user);
        $prep->execute();

}

header("Location: index.php");
?>
