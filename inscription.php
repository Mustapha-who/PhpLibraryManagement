<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$nom = $_POST["nom"];
	$prenom = $_POST['prenom'];
	$dt_naiss = $_POST['d'];
	$sexe = $_POST['r'];
	$stat = $_POST['slct'];
	$mdp=$_POST['mdp'];
	$mdp2=$_POST['mdp2'];


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

	if ((empty($mdp)) === true) {
		echo "Champ MOT DE PASSE vide ";
	}

	if ((empty($mdp2)) === true) {
		echo "Champ VERIFICATION DE MOT DE PASSE vide";
	}

	if ($mdp!=$mdp2) {
		echo "Mot de passe different";
	}


	if (!empty($nom) && !empty($prenom) && !empty($dt_naiss) && !empty($sexe) && !empty($stat) && !empty($mdp) && !empty($mdp2) && $mdp==$mdp2 ) {

		$sql = "SELECT * FROM etudiant";
		$sth = $bdd->query($sql);		
		$result = $sth->fetchAll();

		$nombre = count($result);
		

		$sql = "INSERT INTO etudiant (nce,nom, prenom, date_naiss, sexe, statut,mdp) VALUES ($nombre+1,'$nom','$prenom','$dt_naiss','$sexe','$stat','$mdp')";
		$retour = $bdd->exec($sql);
		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo $retour . ' ligne ont etes affectees.';
	}
?>