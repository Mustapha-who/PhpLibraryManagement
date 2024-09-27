<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$id_livre=$_POST["id_livre"];
	$reponse = $bdd->query("SELECT * FROM livre WHERE id_livre= $id_livre");
	$donnees = $reponse->fetch();
?>
<form name='f' method="post" action="modifier_liv.php">
<h1 style="color: blue;text-align:center;">Liste des livres</h1>
<table border="2" align="center"  class="table table-bordered">
<tr>
	<td>Titre</td>
	<td><input type='text'name="titr" value="<?php echo $donnees['titre']; ?>"></td>
</tr>
<tr>
	<td>Auteur</td>
	<td><input type='text' name='aut' value="<?php echo $donnees['auteur']; ?>"></td>
</tr>
<tr>
	<td>Date d'edition</td>
	<td><input type='Date' name='ded' value="<?php echo $donnees['date_edition']; ?>"></td>
</tr>
<tr>
	<td>Editeur</td>
	<td><input type='text' name='edit' value="<?php echo $donnees['editeur']; ?>"></td>
</tr>
<tr>
	<td>Description</td>
	<td><input type='text'name="desc" value="<?php echo $donnees['description']; ?>"></td>
</tr>
<tr>
	<td>Etat</td>
	<td><input type='text' name='etat' value="<?php echo $donnees['etat']; ?>"></td>
</tr>
<tr>
	<td>Quantite</td>
	<td><input type='number' name='qnt' value="<?php echo $donnees['quantité']; ?>"></td>
</tr>
<tr>
	<input type="hidden" name="id_livre" value="<?php echo $donnees['id_livre']; ?>">
	<td colspan='2'>
		<center><input type='reset' name='res' value='Annuler' class="btn btn-outline-danger">
			<input type='submit' name='s' value="Modifier" class="btn btn-outline-success"></center>
	</td>
</tr>
</table>
</form>