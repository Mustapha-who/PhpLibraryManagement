<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$nce=$_POST["nce"];
	$reponse = $bdd->query("SELECT * FROM etudiant WHERE nce= $nce");
	$donnees = $reponse->fetch();
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
    body{
        background-color: #ecf0f1;
    }

	
    </style>
<form name='f' method="post" action="modifier.php">
<h1 style="color: blue;text-align:center;">Liste des etudiants</h1>
<table border="2" align="center"  class="table table-bordered">
<tr>
	<td>Votre nom</td>
	<td><input type='text' name='nom' value="<?php echo $donnees['nom']; ?>"></td>
</tr>
<tr>
	<td>Votre prenom</td>
	<td><input type='text' name='prenom' value="<?php echo $donnees['prenom']; ?>"></td>
</tr>
<tr>
	<td>Date de naissance</td>
	<td><input type='Date' name='d' value="<?php echo $donnees['date_naiss']; ?>"></td>
</tr>
<tr>
	<td>Sexe</td>
	<td>
		<input type='radio' name='r' value="Féminin" <?php if($donnees['sexe']=='Féminin') echo 'checked'?>>Féminin
		<input type='radio' name='r' value="Masculin" <?php if($donnees['sexe']=='Masculin') echo 'checked'?>>Masculin
	</td>
</tr>
<tr>
	<td>Etat civil</td>
	<td>
		<select name ='slct'>
		<option <?php if($donnees['statut']=='Célebataire') echo 'selected'?>>Célebataire</option>
		<option <?php if($donnees['statut']=='Marié(e)') echo 'selected'?>>Marié(e)</option>
		</select>
	</td>
</tr>
<tr>
	<input type="hidden" name="nce" value="<?php echo $donnees['nce']; ?>">
	<td colspan='2'>
		<center><input type='reset' name='res' value='Annuler' class="btn btn-outline-danger">
			<input type='submit' name='s' value="Modifier" class="btn btn-outline-success"></center>
	</td>
</tr>
</table>
</form>