

<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$id_livre = $_POST["idl"];

	if ((isset($id_livre))) {
		
		$sql = "DELETE FROM livre WHERE id_livre = $id_livre";
		$retour = $bdd->exec($sql);

		$bdd->exec("UPDATE panier,livre SET id_livre=id_livre-1 WHERE id_livre>$id_livre ");
		
		if($retour === FALSE)
			die('Cette livre est deja pris par un etudiant') ;
		elseif($retour === 0)
			echo 'Aucun livre avec cette id';
		else
			echo $retour . ' lignes ont etes supprimer.';
	}
?>
