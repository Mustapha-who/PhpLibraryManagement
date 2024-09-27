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
	$reponse = $bdd->query('SELECT * FROM etudiant');
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
			<th>Nce </th>
			<th>Nom </th>
			<th>Prenom </th>
			<th>Date de naissance </th>
			<th>Sexe </th>
			<th>Statut </th>
			<th>Action</th>
		</tr>
<?php
	while ($donnees = $reponse->fetch()){
?>
	<tr>
		<td><?php echo $donnees['nce']; ?></td>
		<td><?php echo $donnees['nom']; ?></td>			
		<td><?php echo $donnees['prenom']; ?></td>
		<td><?php echo $donnees['date_naiss']; ?></td>
		<td><?php echo $donnees['sexe']; ?></td>
		<td><?php echo $donnees['statut']; ?></td>
		<td><form method="post" action="modifierform.php">
			<input type="hidden" name="nce" value="<?php echo $donnees['nce']; ?>">
			<button type='submit'><i class='fas fa-pen' style='font-size:30px'></i></button>
		</form></td>
	<tr>
<?php
	}
	$reponse->closeCursor();
?>
	</table>
	<br>
<?php
	$sql = "SELECT * FROM etudiant";
	$sth = $bdd->query($sql);
	$result = $sth->fetchAll();
	$nombre = count($result);
	echo $nombre." etudiant(s) trouve(s)";
?>