<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$nce = $_POST["n"];

	if ((isset($nce))) {

		

		$sql = "DELETE  FROM etudiant WHERE nce = $nce";
		$retour = $bdd->exec($sql);
		
		
		$bdd->exec("UPDATE etudiant SET nce=nce-1 WHERE nce>$nce ");


		if($retour === FALSE)
			die('Cette etudiant est avais un livre ou plusieurs dans son panier') ;
		elseif($retour === 0)
			echo 'Aucun etudiant avec ce nce';
		else
			echo $retour . ' lignes ont etes supprimer.';
	}
?>