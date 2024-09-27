<?php
 $bdd=new PDO('mysql:host=localhost;dbname=iset','root','');
if (isset($_GET['idl'])&&isset($_GET['id'])) {

    $id = $_GET["id"];
    $idl = $_GET["idl"];
                $sql = "DELETE FROM panier WHERE id_livre=$idl and nce=$id";
                $retour = $bdd->exec($sql);
                if ($retour === FALSE) {
                    $rep=$bdd->errorInfo()[2];
                    $rep = "l'etudiant a pris des livres";
                   
                   
            
                } elseif ($retour === 0) {
                    echo 'Aucune modification effectuée';
                    $rep = "Aucune modification effectuée";
                   
                }
                else {
                    echo $retour . ' lignes ont étés affectées.';
                    
                }
            }
					
					
?>