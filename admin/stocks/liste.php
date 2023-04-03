<?php

session_start();

include "../../inc/functions.php";

$stocks = getstocks();


?>

		<!doctype html>
		<html lang="fr">
		  <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

			<title>Espace Admin</title>

			<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

			<!-- Bootstrap core CSS -->
			<link href="../../css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom styles for this template -->
			<link href="../../css/dashboard.css" rel="stylesheet">
		  </head>

		  <body>
			<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
			  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="profile.php">Yamen Shop</a>
			  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
			  <ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
				  <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
				</li>
			  </ul>
			</nav>

			<div class="container-fluid">
			  <div class="row">
			  
			  
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="admin/profile.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/categories/liste.php">
                  <span data-feather="file"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/produits/liste.php">
                  <span data-feather="shopping-cart"></span>
                  prduits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/visiteurs/liste.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
			   <li class="nav-item">
                <a class="nav-link active" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/stocks/liste.php">
                  <span data-feather="users"></span>
                  Stocks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/profile.php">               
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>

            
			
              
          </div>
        </nav>
				

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
				  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
					<h1 class="h2">Stocks des Produits</h1>    

              					   
				</div>
					
					<!--- liste start -->
						
				<div> 
				
				<?php if (isset($_GET['ajout']) && $_GET['ajout'] == "ok" ){

                      print '<div class="alert alert-success">
			   Categories Ajoutee avec Succes			   		   
			   </div>';
				} ?>
				
				<?php if (isset($_GET['delete']) && $_GET['delete'] == "ok" ){

                      print '<div class="alert alert-success">
			   Categories Supprimer avec Succes			   		   
			   </div>';
				} ?>
				
				<?php if (isset($_GET['modif']) && $_GET['modif'] == "ok" ){

                      print '<div class="alert alert-success">
			   Categories modifier avec Succes			   		   
			   </div>';
				} ?>
				
					<?php if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate" ){

                      print '<div class="alert alert-danger">
			   Nom de Categorie Deja Existe ! 			   		   
			   </div>';
				} ?>
				
								   																					   
									   
						   <table class="table">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Nom de Produit</th>
					  <th scope="col">Quantite</th>
					  <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  
				  
				  <?php
				  
				       $i=0;
				      foreach($stocks as $s){
						
            $i++;						
						  print '<tr>
					  <th scope="row">'.$i.'</th>
					  <td>'.$s['nom'].'</td>
					  <td>'.$s['quantite'].'</td>
					  <td>
					  
					   <a data-toggle="modal" data-target="#editModal'.$c['id'].'" class="btn btn-success">Modifier</a>
					   </td>
					</tr>';
                    }	  
						  
     			  ?>
				  								
				</tbody>
				</table>
				

						   
			   </div


			  </main>
			  </div>
			</div>
			
			

			



	     
			
			<!-- Bootstrap core JavaScript
			================================================== -->
			
			<!-- Placed at the end of the document so the pages load faster -->
			
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
			<script src="../../js/vendor/popper.min.js"></script>
			<script src="../../js/bootstrap.min.js"></script>

			<!-- Icons -->
			
			<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
			<script>
			  feather.replace()
			</script>

			<!-- Graphs -->
						
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
		<script>
		function popUpDeletecategorie(){
			return confirm("Are You Sure ?");
	
		}
		</script>



		 
  </body>
</html>
