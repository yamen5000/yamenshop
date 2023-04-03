<?php
session_start();

if (isset($_SESSION['nom'])){
	header('location:profile.php');
	
}


include "inc/functions.php";
$user = true;
$categories = getALLCategories();

if (!empty($_POST)){ // click sur le button sauvgarder

     $user = connectvisiteur($_POST);
	 if( is_array($user) && count($user) > 0 ){ // utilisateur connectee
	   session_start();
	   $_SESSION['email'] = $user['email'];
	   $_SESSION['nom'] = $user['nom'];
	   $_SESSION['prenom'] = $user['prenom'];
	   $_SESSION['mp'] = $user['mp'];
	   $_SESSION['telephone'] = $user['telephone'];
	   	   
	   header('location:profile.php'); // redirection vers la page profile
		  
}

}



?>



<!doctype html>

<html lang="fr">

  <head>
  
    <meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Yamen Shop</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">

	
	
	
	
 </head>
  <body>
  
   <!--- nav --->
  
  <?php
  
  include "inc/header.php";
  
  ?>

<!--- fin nav --->
 
		 <div class="col-12 p-5">
		 
		 <h1 class="text-center">Connexion</h1>
		 
		 <form action="connexion.php" method="post">
		  <div class="mb-3">
		  
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  </div>
		  
		  <div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Mot de passe</label>
			<input type="password" name="mp" class="form-control" id="exampleInputPassword1">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Connecter</button>
		</form>
 
 
 
 </div>


 <!-- footer -->
<?php

include "inc/footer.php";
?>
 
    
  </body>
    
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
	
	<?php 
	
	if (!$user){
	  print "
	  <script>
		  Swal.fire({
		  title: 'Erreur!',
		  text: 'Cordonnes non valide',
		  icon: 'error',
		  confirmButtonText: 'ok',
		  timer : 2000
})

</script>
";
}

      
			
?>
	
	
</html>