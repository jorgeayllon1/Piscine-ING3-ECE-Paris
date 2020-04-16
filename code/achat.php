<?php
session_start();
?>

<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Achats</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="piscine.css">
	    
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />-->


        	    
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://use.fontawesome.com/53fe4ef42f.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>  <!--include popper.js-->
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
	    <script src="accueil.js" type="text/javascript"></script> 
	    
		
	</head>
	<body>

		<div class="container">
			<div class="row d-flex justify-content-center">

				<nav class="navbar navbar-expand-md col-lg-12">
			        <a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>
			        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="main-navigation">
			            <ul class="navbar-nav">
			                <li class="nav-item"><a class="nav-link" href="inscription.php">S'inscrire</a></li>
			                <li class="nav-item"><a class="nav-link" href="connexion.php">Se connecter</a></li>
			                
			            </ul>
			        </div>
	           </nav>

	           <div class="col-lg-8 my-1">
		           	<div class="input-group-prepend">
						  	<img src="images/logo-footer.png" width="20%">
						    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	Catégories
						    </button>
						    <div class="dropdown-menu">
						      <a class="dropdown-item" href="#">Ferraille ou Trésor</a>
						      <a class="dropdown-item" href="#">Bon pour le musée</a>
						      <a class="dropdown-item" href="#">Accessoire VIP</a>
						      <div role="separator" class="dropdown-divider"></div>
						      <a class="dropdown-item" href="#">Filtrer</a>
						    </div>

						    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Rechercher..."><button> <i class="fa fa-search"></i></button>
						  </div>
               </div>
               
               <div class="col-lg-1 my-1 text-md-right">
				<a href="panier.php"><button class="btn" style="border-radius: 10px;"> <i class="fa fa-shopping-basket"></i> </button></a>
               </div>
			   
			   <div class="col-lg-12 ">
				<div class="container slider">
					<div class="row row-slider">
						<div class="col-lg-12 col-slider">
							<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active carousel-cat">
											<img class="d-block w-100" src="images/fond1.jpg" alt="Ferraille">
											<div class="carousel-caption d-none d-md-block">
												<h1>Enchère</h1>												
											</div>
										</div>
										<div class="carousel-item carousel-cat">
											<img class="d-block w-100 " src="images/fond2.jpg" alt="Musee">
											<div class="carousel-caption d-none d-md-block">
												<h1>Meilleur offre</h1>												
											</div>
										</div>
										<div class="carousel-item carousel-cat">
											<img class="d-block w-100" src="images/fond3.jpg" alt="VIP">
											<div class="carousel-caption d-none d-md-block">
												<h1>Achat immédiat</h1>												
											</div>
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
							</div>
	
						</div>
					</div>
				</div>
			   </div>

			   <div class="col-lg-12 my-3">
				 <h3 class="horizontal-text-center" style="text-align: center ;"><span id="selection">Choisissez le type d'achat qui vous convient le plus !</span></h3>
               </div>


               <div class="col-lg-4 d-block justify-content-center align-items-center">
                   <h2>Enchères</h2>
                   <div class="card text-center">
                       <a href="page_achat.php"><img src="images/type_achat/enchere.jpg" class="d-block w-100"></a>
                   </div>
               </div>

               <div class="col-lg-4 d-block justify-content-center align-items-center">
                <h2>Meilleure offre</h2>
                <div class="card text-center">
                    <a href="page_achat.php"><img src="images/type_achat/offre.jpg" class="d-block w-100"></a>
                </div>
                </div>

                <div class="col-lg-4 d-block justify-content-center align-items-center">
                    <h2>Achat immédiat</h2>
                    <div class="card text-center">
                        <a href="page_achat.php"><img src="images/type_achat/achat.jpg" class="d-block w-100"></a>
                    </div>
                </div>
               


			</div>
		</div>

		

		<div class="container">

			<div class="row-width-max">

			<?php include('footer_client.php'); ?>

			</div>

		</div>

	</body>
</html>