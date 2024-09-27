<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$nce=$_GET['nce'];
	$reponse = $bdd->query("SELECT * FROM livre WHERE id_livre IN(SELECT id_livre FROM panier WHERE nce=$nce)");
	
?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
	table {
  table-layout:fixed;
  width: inherit !important;
}
td, th {
  width:150px !important;
  height:50px !important;

}
    body{
        background-color: #ecf0f1;
    }
	</style>

	<table border="2" align="center"  class="table table-bordered">
		<tr>
			<th>Id_livre </th>
			<th>Titre </th>
			<th>Auteur </th>
			<th>Date d'edition </th>
			<th>Editeur </th>
			<th>Description </th>
			<th>Action</th>
		</tr>
<?php
	while ($donnees = $reponse->fetch()){
?>
	<tr>
		<td><?php echo $donnees['id_livre']; ?></td>
		<td><?php echo $donnees['titre']; ?></td>			
		<td><?php echo $donnees['auteur']; ?></td>
		<td><?php echo $donnees['date_edition']; ?></td>
		<td><?php echo $donnees['editeur']; ?></td>
		<td><?php echo $donnees['description']; ?></td>
		<td>
		<a href="delete_panier.php?idl=<?php echo $donnees['id_livre']; ?>&id=<?php echo $nce ?>"><i class="fa fa-trash" style='font-size:30px'></i></a>
		</td>
	<tr>
<?php
	}
	$reponse->closeCursor();
?>
	</table>
	<br>
<?php


?>