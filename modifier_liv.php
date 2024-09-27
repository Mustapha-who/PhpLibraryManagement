<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$id_livre= $_POST["id_livre"];
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

	if (!empty($titre) && !empty($auteur) && !empty($dt_edit) && !empty($editeur) && !empty($desc) && !empty($etat) && !empty($qnt)) {
		$sql = "UPDATE livre SET titre='$titre',auteur='$auteur',date_edition='$dt_edit',editeur='$editeur',description='$desc', etat='$etat', quantité= $qnt WHERE id_livre= $id_livre";
		$retour = $bdd->exec($sql);
		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo 'Livre modifi&eacute; avec succ&eacute;e.';
	}
?>