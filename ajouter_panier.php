<?php

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	$id_livre=$_POST['id_livre'];
	
	$nce=$_GET['nce'];
	$total=implode(',',$id_livre);
	$ch=implode('',$id_livre);
	
	
	
	$sql = "SELECT * FROM panier";
	$sth = $bdd->query($sql);
	$result = $sth->fetchAll();
	$nombre = count($result);

	
	$reponse = $bdd->query("SELECT * FROM livre WHERE id_livre in ($total)");
	$donnees = $reponse->fetch();
	

	if ($nombre<3) {
		if (strlen($ch)<4)
		{

			
			if ($donnees['quantité'] > 0 && $donnees['etat']!= "epuisé") {
				
				foreach($id_livre as $key)
				{
					$sql= ("INSERT INTO panier(nce,id_livre) VALUES ($nce,$key)");
					$insert = $bdd->exec($sql);
				}
				
				
				
			$sql = ("UPDATE livre SET quantité = quantité -1 WHERE id_livre in ($total)");
			$retour = $bdd->exec($sql);
			
		
			

			if($retour === FALSE && $insert===FALSE)
				die('Erreur dans la requete') ;
				elseif($retour === 0)
				echo 'Aucune modification effectuee';
				else
				echo 'Livre ajout&eacute; au pannier avec succ&eacute;e.';
			}
		}		
	}

else{
	echo "Votre panier est pleine";
	}
	if ($donnees['quantité'] == 0) {
		$sql = "UPDATE livre SET etat = 'epuisé' WHERE id_livre= $ch";
		$retour = $bdd->exec($sql);

		if($retour === FALSE)
			die('Erreur dans la requete') ;
		elseif($retour === 0)
			echo 'Aucune modification effectuee';
		else
			echo 'Livre non plus disponible.';
	}
	if ($donnees['etat']== "epuisé") {
		echo 'Livre non plus disponible.';
	}

?>