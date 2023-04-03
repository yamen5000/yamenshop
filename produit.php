<?php

include "inc/functions.php";

$categories = getALLCategories();


if (isset($_GET['id'])){
	
	$produit = getproduitByid($_GET['id']);
		
}

?>


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yamen Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php
  
  include "inc/header.php";
  
  
  ?>


         <div class="row col-12 mt-4">
		 
          <div class="card col-8 offset-2">
		  
			  <img src="images/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
			  
			  <div class="card-body">
			  
				<h5 class="card-title"><?php echo $produit['nom'] ?></h5>
				
				<p class="card-text"><?php echo $produit['description'] ?></p>
			  </div>
			  
			  <ul class="list-group list-group-flush">
			  
				<li class="list-group-item"><?php echo $produit['prix'] ?> TND</li>
				
				<?php 
				         foreach($categories as $index => $c ){
							 
							 if ($c['id'] == $produit['categorie']){
								 
					print ' <button class="btn btn-success">'. $c['nom'].'</button>';

							 }
						 }							 

					  
				?>
				
				
				     </ul>
			 
			  </div
   </div>
				
				
				
 
  



<?php

include "inc/footer.php";

?>
 
    
  

 
  
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>