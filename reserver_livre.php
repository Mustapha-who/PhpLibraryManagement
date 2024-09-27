<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<?php

$nce=$_GET['nce'];	

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT id_livre, titre, auteur, date_edition,editeur,description FROM livre');
?>
<style>
	table {
  table-layout:fixed;
  width: inherit !important;
}
td, th {
  width:150px !important;
  height:50px !important;

}
	
	input[type=checkbox] {
            accent-color: #fd4885;
            -ms-transform: scale(1);
            /* IE */
            -moz-transform: scale(1);
            /* FF */
            -webkit-transform: scale(1.2);
            /* Safari and Chrome */
            -o-transform: scale(1);   
        }
	</style>
	<table border="2" align="center"  class="table table-bordered" >
		<tr class="table-secondary">
			<th>Id_livre </th>
			<th>Titre </th>
			<th>Auteur </th>
			<th>Date d'edition </th>
			<th>Editeur </th>
			<th>Description </th>
			<th>choix</th>
		</tr>
<?php
	while ($donnees = $reponse->fetch()){
?>
	<form method="post" action="ajouter_panier.php?nce=<?php echo $nce ?> ">
	<tr>
		<td><?php echo $donnees['id_livre']; ?></td>
		<td><?php echo $donnees['titre']; ?></td>			
		<td><?php echo $donnees['auteur']; ?></td>
		<td><?php echo $donnees['date_edition']; ?></td>
		<td><?php echo $donnees['editeur']; ?></td>
		<td><?php echo $donnees['description']; ?></td>
		<td><input type="checkbox" name="id_livre[]" value="<?php echo $donnees['id_livre']; ?>"></td>
		
	<tr>

<?php
	}
	$reponse->closeCursor();
?>
	</table>
	<br>
<?php
	$sql = "SELECT * FROM livre";
	$sth = $bdd->query($sql);
	$result = $sth->fetchAll();
	$nombre = count($result);
	echo $nombre." livre(s) trouve(s)";
?>

<center><input type="submit" value="Ajouter" class="btn btn-outline-primary"></center>
</form>
