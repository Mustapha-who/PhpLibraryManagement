<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$nom = $_POST["nom"];
	$mdp = $_POST["mdp"];
	if ($nom=='abc' && $mdp==123) {
		header("Location: http://localhost/Mini_projet_PHP/menu1_v2.html");
			exit();
	}

	
	else{

		
		$reponse = $bdd->query("SELECT * FROM etudiant WHERE nom='$nom' ");
		
		$etudiant = $reponse->fetch();
		
		$nce=$etudiant['nce'];
		
		
		
		
		
		$reponse = $bdd->query('SELECT * FROM etudiant');
		while ($donnees = $reponse->fetch()){
			if ($nom== $donnees['nom'] && $mdp== $donnees['mdp']) {
				header("Location: http://localhost/Mini_projet_PHP/menu2_v2.php?nce=$nce");
				exit();
			}
			
			else{
				$test=false;
			}
		}
		if($test==false){
			echo "D&eacute;sol&eacute;, nous n'avons pas pu trouver votre compte.";
		}
	}
		$reponse->closeCursor();
		?>