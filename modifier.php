<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$nce = $_POST["nce"];
	$nom = $_POST["nom"];
	$prenom = $_POST['prenom'];
	$dt_naiss = $_POST['d'];
	$sexe = $_POST['r'];
	$stat = $_POST['slct'];

	if ((empty($nom)) === true) {
		echo "Champ NOM vide/ ";
	}

	if ((empty($prenom)) === true) {
		echo "Champ PRENOM vide/ ";
	}

	if ((empty($dt_naiss)) === true) {
		echo "Champ DATE DE NAISSANCE vide/ ";
	}

	if ((empty($sexe)) === true) {
		echo "Champ SEXE vide/ ";
	}

	if ((empty($stat)) === true) {
		echo "Champ STATUT vide";
	}

	if (!empty($nom) && !empty($prenom) && !empty($dt_naiss) && !empty($sexe) && !empty($stat)) {
		$sql = "UPDATE etudiant SET nom='$nom',prenom='$prenom',date_naiss='$dt_naiss',sexe='$sexe',statut='$stat' where nce=$nce";
		$retour = $bdd->exec($sql);
		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo 'Etudiant modifi&eacute; avec succ&eacute;e.';
	}
?>