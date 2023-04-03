<?php


session_start();

// 1 - recuperation des donnes de la formulaire

$nom = $_POST['nom'];

$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date('Y-m-d');  // "2021-02-05"


// 2 - la chaine de connexion 

include "../../inc/functions.php";

$conn = connect();


    
  
  try {
	  
 // 3 - creation de la requette

$requette = "INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$description','$createur','$date_creation')";

 // 4 - execution de la requette

  $resultat = $conn->query($requette);
  
  if ($resultat){
	  header('location:liste.php?ajout=ok');
 
  } 
  
 	  
} catch(PDOException $e) {
	//echo "connexion failed: " . $e->getMessage();
  if($e->getcode() == 23000 ) {
	 header('location:liste.php?erreur=duplicate');
	  
	  
}
} 
  
  
		
 
  
?>
