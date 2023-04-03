<?php

session_start();

include "inc/functions.php";

$categories = getALLCategories();

if (!empty($_POST)){ // button search clicked

     
	 $produits = searchProduits($_POST['search']);
	 	 	 
}else{

     $produits = getALLProducts();
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yamen Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
	
	<!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
	
	    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	
	<!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
	
  </head>
  
  <body>
  
    <!-- Navbar Start -->
  
  <div class="container-fluid mb-5">
  <div class="row border-top px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
	<li class="nav-item dropdown">	
	<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
				
				
				
				
				
				
				     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		  
		  <?php
		         foreach($categories as $categorie){
					 print '<li><a class="dropdown-item" href="#">'.$categorie['nom'].'</a></li>';
			}		
							  		  
		  	  ?>    


			  
        </ul>
        </li>
		
		
		 <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        
                    </div>
                </nav>         
		
		
		</div>
		
		
		
		
		
		
		
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	  
        
        
       
     
		
		
		<?php if ( isset($_SESSION['nom']) ){  
		
		
		 print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
        </li>';
		}else {
			
			print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="registre.php">Registre</a>
        </li>';		
		}?>
		
		
		
		</ul>
      <form class="d-flex" action="index.php" method="POST">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
	  
	  <?php
	  
	  if ( isset($_SESSION['nom']) ){
		  print '<a href="deconnexion.php" class="btn btn-primary" > deconnexion </a>';
	  }	   
	  
	  ?>
    </div>
  </div>
</nav>

<!--- fin nav --->


<div class="row col-12 mt-4">


<?php
 
      foreach($produits as $produit){
       
	   
	  print '<div class="col-3 mt-2">
	      <div class="card" style="width: 18rem;">
  <img src="images/'.$produit['image'].'" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">'.$produit['nom'].'</h5>
    <a href="produit.php?id='.$produit['id'].'" class="btn btn-primary">Afficher</a>
  </div>
</div>
 </div>';

}


?>





<?php

include "inc/footer.php";

?>




 
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>