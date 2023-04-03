<?php


echo "Id de produit".$_GET['idc'];

$idproduit = $_GET['idc'];

include "../../inc/functions.php";

$conn = connect(); 

$requette = "DELETE FROM produits WHERE id='$idproduit'";

$resultat = $conn->query($requette);

if ($resultat){
     //echo "produit supprimer";
	 header('location:liste.php?delete=ok');

}

?>