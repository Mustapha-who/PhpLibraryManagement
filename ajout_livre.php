<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$titre = $_POST["titr"];
	$auteur = $_POST['aut'];
	$dt_edit = $_POST['ded'];
	$editeur = $_POST['edit'];
	$desc = $_POST['desc'];
	$etat = $_POST['etat'];
	$qnt = $_POST['qnt'];

	if ((empty($titre)) === true) {
		echo "Champ TITRE vide/ ";
	}

	if ((empty($auteur)) === true) {
		echo "Champ AUTEUR vide/ ";
	}

	if ((empty($dt_edit)) === true) {
		echo "Champ DATE D'EDITION vide/ ";
	}

	if ((empty($editeur)) === true) {
		echo "Champ EDITEUR vide/ ";
	}

	if ((empty($desc)) === true) {
		echo "Champ DESCRIPTION vide/ ";
	}

	if ((empty($etat)) === true) {
		echo "Champ ETAT vide/ ";
	}

	if ((empty($qnt)) === true) {
		echo "Champ QUANTITE vide";
	}

	if (!empty($titre) && !empty($auteur) && !empty($dt_edit) && !empty($editeur) && !empty($desc)&& !empty($etat)&& !empty($qnt)) {
		
		$sql = "SELECT * FROM livre";
		$sth = $bdd->query($sql);
		$result = $sth->fetchAll();
		$nombre = count($result);

		$sql = "INSERT INTO livre (id_livre,titre, auteur, date_edition, editeur, description, etat, quantité) VALUES ($nombre+1,'$titre','$auteur','$dt_edit','$editeur','$desc','$etat','$qnt')";

		$retour = $bdd->exec($sql);
		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo $retour . ' ligne ont etes affectees.';
	}
?>