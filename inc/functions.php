<?php


function connect(){
	// 1 - connexion vers la BD

$servername = "localhost";
$DBuser ="root";
$DBpassword = "";
$DBname = "e-commerce";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

return $conn;

}



function getALLCategories(){
	
	
	$conn = connect();

// 2 - creation de la requette

$requette = "SELECT * FROM categories";

// 3 - execution de la requette

$resultat = $conn->query($requette);

// 4 - resultat de la requette

$categories = $resultat->fetchALL();

//var_dump($categories);

return $categories;
	
	
	
	}
	
	
	function getALLProducts(){
			// 1 - connexion vers la BD

$conn = connect();

// 2 - creation de la requette

$requette = "SELECT * FROM produits";

// 3 - execution de la requette

$resultat = $conn->query($requette);

// 4 - resultat de la requette

$produits = $resultat->fetchALL();

//var_dump($categories);

return $produits;

}	
	
	
	
	function searchproduits($keywords){
		
$conn = connect();

	// 2 - creation de la requette

$requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%' ";

	// 3 - execution de la requette

$resultat = $conn->query($requette);

	// 4 - resultat

$produits = $resultat->fetchALL();

return $produits;
	
}	

function getProduitByid($id){
	
	 $conn = connect();
	//1 - creation de la requette
	 
	 $requette = "SELECT * FROM produits WHERE id=$id";

		// 3 - execution de la requette

$resultat = $conn->query($requette);

		// 4 - resultat

$produits = $resultat->fetch();

return $produits;
	 
	 
}

function AddVisteur($data){
	
	 $conn = connect();
	 $mphash = md5($data['mp']);
	 
$requette = "INSERT INTO visiteurs(nom,prenom,email,mp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."') ";

$resultat = $conn->query($requette);

if ($resultat){
   return true;
}else{
  return false;		
}	

}
function connectvisiteur($data){
	
 	$conn = connect();
	
	$email = $data['email'];
	
	$mp = md5($data['mp']);
	
	$requette = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";
	
	$resultat = $conn->query($requette);
	
	$user = $resultat->fetch();
	
	return $user; 


}

function connectAdmin($data){
		   
		$conn = connect();
		
		$email = $data['email'];
		
		$mp = md5($data['mp']);
		
		$requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
		
		$resultat = $conn->query($requette);
		
		$user = $resultat->fetch();
		
		return $user; 
		
		
	}
	
function getALLusers(){
	
	$conn = connect();
	
	$requette = "SELECT * FROM visiteurs WHERE etat=0";
		
		$resultat = $conn->query($requette);
		
		$users = $resultat->fetchALL();
		
		return $users;
}	


function getstocks(){
	
	$conn = connect();
	
	$requette = "SELECT nom,quantite FROM produits , stocks WHERE produits.id = stocks.produit ";
		
		$resultat = $conn->query($requette);
		
		$stocks = $resultat->fetchALL();
		
		return $stocks;
		
}			
	
	
	?>