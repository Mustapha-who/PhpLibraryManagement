<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$nomut = $_POST["ut"];
	$mdp = $_POST['mdp'];
	$mdp2 = $_POST['mdp2'];

	if ((empty($nomut)) === true) {
		echo "Champ NOM UTILISATEUR vide ";
	}

	if ((empty($mdp)) === true) {
		echo "Champ MOT DE PASSE vide ";
	}

	if ((empty($mdp2)) === true) {
		echo "Champ VERIFICATION DE MOT DE PASSE vide";
	}

	if ($mdp!=$mdp2) {
		echo "Mot de passe different";
	}

	if (!empty($nomut) && !empty($mdp) && !empty($mdp2) && $mdp==$mdp2 ) {
		$sql = "INSERT INTO user (nom_utilisateur, mdp) VALUES ('$nomut','$mdp')";
		$retour = $bdd->exec($sql);
		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo $retour . ' ligne ont etes affectees.';
	}
?>