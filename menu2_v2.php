<?php

$nce=$_GET['nce'];


?>


<!DOCTYPE html>
<html>
<head>
	<title>Espace étudiant</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="menu_v2.css">
</head>
<body >

<ul style="margin-top: -5%;">
	<li><a href="reserver_livre.php ?nce=<?php echo $nce?>">Vitrine des livres de la bibliothèque</a></li>
	<li><a href="panier.php ?nce=<?php echo $nce?>">Mon panier </a></li>
</ul>
</body>
</html>