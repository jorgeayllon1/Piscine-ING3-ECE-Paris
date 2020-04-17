<?php
#Cette ligne va demarrer le cookie pour une session, dès que l'utilisateur quitte la page, ça efface le cookie
session_start(); // On démarre la session AVANT toute chose

/*
if(isset($_SESSION["id_user"])){

}
*/

?>

<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ebay ECE</title>

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

	<!-- Scroll bar (Google Fonts)-->
	<div class="scrollbar scrollbar-lady-lips">
       <div class="force-overflow"></div>
    </div>


	<!-- Navigation SIDEBAR --> <!--Reste encore un pb quand on réduit la fenetre, son width prend 100% de la fenêtre-->
	<div class="container-fluid">
		<div class="row ">
			<div class="col-lg-1 col-md-1 col-xs-1 col-xm-1">
				<div class="sidenav">
					<a href="accueil.php">Accueil</a>
					<hr class="navside-hr">
					<a href="#">Selection</a>
					<hr class="navside-hr">
					<a href="#">Vendre</a>
					<hr class="navside-hr">
					<a href="#">A propos</a>
					<hr class="navside-hr">
				</div>
			</div>

			<div class="col-lg-11">

				<!----------------------------------------------------------------------------------------------------------------------->
				<!-- First NAVBAR-->

				<div class="row">

					<nav class="navbar navbar-expand-md col-lg-12">
						<a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>
						<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="navbar-nav">
								<?php
								if (!isset($_SESSION["id_user"])) {
									echo '<li class="nav-item"><a class="nav-link" href="inscription.php">S\'inscrire</a></li>';
									echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Se connecter</a></li>';
								} else {
									echo '<li class="nav-item"><a class="nav-link" href="redirect_moncompte.php">' . $_SESSION["nom"] . ' ' . $_SESSION["prenom"] . '</a></li>';
								}
								?>
							</ul>
						</div>
					</nav>
				</div>

    <!----------------------------------------------------------------------------------------------------------------------->

            <!-- Second NAVBAR-->

			<div class="row">
				<nav class="navbar navbar-expand-md col-md-12 nav2">
						
						<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar2">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse collapse2" id="myNavbar2">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link link2" href="categories.php"> <i class="fa fa-ellipsis-v"></i> Categories</a> <!--Classe font awesome pour icone-->
								</li>

								<li class="nav-item">
									<a class="nav-link link2" href="achat.php"><i class="fa fa-shopping-cart"></i> Achat</a>
								</li>

								<li class="nav-item">
									<a class="nav-link link2" href="connexion_vendeur.php"><i class="fa fa-store"> </i> Vendre</a>
								</li>

								<li class="nav-item">
									<a class="nav-link link2" href="redirect_moncompte.php"><i class="fa fa-user"></i> Mon compte</a>
								</li>

								<li class="nav-item active">
									<a class="nav-link link2" href="redirect_moncompte.php"><i class="fa fa-user-cog"></i> Admin</a>
								</li>

								<li class="nav-item border rounded-circle basket-icon mx-2 panier">
									<a href="panier.php"><button class="btn" style="border-radius: 10px;"> <i class="fa fa-shopping-basket"></i> </button></a>
									panier
								</li>	
								
							</ul>
						</div>
					</nav>
			</div>


				

			

			<!-- RECHERCHE -->

					<div class="container container-search">
						<div class="row justify-content-center" >
							<div class="col-md-8" >

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
						</div>
					</div>

			
			<!----------------------------------------------------------------------------------------------------------------------->


			<!--- Image Slider -->
					<div class="container slider">
						<div class="row row-slider">
							<div class="col-lg-12 col-slider">
								<div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselIndicators" data-slide-to="1"></li>
											<li data-target="#carouselIndicators" data-slide-to="2"></li>
										</ol>
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img class="d-block " src="images/fond1.jpg" alt="un">
												<div class="carousel-caption d-none d-md-block">
													<h1>BIENVENUE CHEZ EBAY ECE</h1>
													<button class="btn blue-gradient">Acheter</button>
													<button class="btn aqua-gradient">Vendre</button>
													
												</div>
											</div>
											<div class="carousel-item">
												<img class="d-block opa8 w-100" src="images/fond2.jpg" alt="deux">
											</div>
											<div class="carousel-item">
												<img class="d-block opa8 w-100" src="images/fond3.jpg" alt="trois">
											</div>
										</div>
										<a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
								</div>

							</div>
						</div>
					</div>

			<!----------------------------------------------------------------------------------------------------------------------->


			<!-- Second Image Slider -->
			<div class="container second-slider ">

				<h3 class="horizontal-text-center" style="text-align: center ;"><span id="selection">Notre sélection de la semaine</span></h3>	

				
				<div id="multi" class="carousel slide carousel-multi-item justify-content-center align-items-center" data-ride="carousel">

				
				<div class="controls justify-content-center align-items-center">
					<a class="btn-floating" href="#multi" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a class="btn-floating" href="#multi" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				</div>
				

				
				<ol class="carousel-indicators">
					<li data-target="#multi" data-slide-to="0" class="active"></li>
					<li data-target="#multi" data-slide-to="1"></li>
					<li data-target="#multi" data-slide-to="2"></li>
				</ol>
				

				
				<div class="carousel-inner" role="listbox">

					<!--First slide-->
					<div class="carousel-item active">

					<div class="row">
						<div class="col-md-4">
						<div class="card mb-2">
							<img class="card-img-top" src="images/item/item1.jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Lampe</h4>
							<p class="card-text">25<sup>€</sup>.</p>
							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>
							</div>
						</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
						<div class="card mb-2">
							<img class="card-img-top" src="images/item/item2.jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Pièce</h4>
							<p class="card-text">15<sup>€</sup>.</p>
							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>
							</div>
						</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
						<div class="card mb-2">
							<img class="card-img-top" src="images/item/item3.jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Bague</h4>
							<p class="card-text">355<sup>€</sup>.</p>
							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>
							</div>
						</div>
						</div>
					</div>

					</div>
					<!--/.First slide-->

					<!--Second slide-->  <!--On ajoute une carte à partir de la base de donnée avec random()-->
					<div class="carousel-item">

					<div class="row">
						<div class="col-md-4">
						<div class="card mb-2">
							<img class="card-img-top" src="images/item/item4.jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Bague</h4>
							<p class="card-text">355<sup>€</sup>.</p>

							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>
							</div>
						</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
						<div class="card mb-2">
							<img class="card-img-top" src="images/item/item5.jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Bague</h4>
							<p class="card-text">355<sup>€</sup>.</p>
							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>

							</div>
						</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
						<div class="card mb-2">
							<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg"
							alt="Card image cap" width="150px" height="300px">
							<div class="card-body">
							<h4 class="card-title">Card title</h4>
							<p class="card-text">355<sup>€</sup>.</p>
							<a class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
							<p class="ajout-panier">Ajouter au panier</p>
							</div>
						</div>
						</div>
					</div>


					</div>
				

			</div>
			
			</div>
			
			</div>


		<h3 class="horizontal-text-center" style="text-align: center ;"><span id="selection">La vente n'a jamais été aussi simple</span></h3>	
		<br>


		<!-- Third Image Slider -->

				<div class="container container-sell">
						<div class="row row-slider">
							<div class="col-lg-12 col-slider">
								<div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselIndicators" data-slide-to="1"></li>
											<li data-target="#carouselIndicators" data-slide-to="2"></li>
										</ol>
										<div class="carousel-inner">
											<div class="carousel-item active header">
												<div class="overlay">
												<img class="d-block opa8 w-100" src="images/sell.jpg" alt="First slide">
												<div class="carousel-caption d-none d-md-block">
													<h1>VENDEZ EN TOUTE SIMPLICITE</h1>
													<a href="inscription_vendeur.php"><button class="btn ">S'INSCRIRE</button></a>
													<a href="connexion_vendeur.php"><button class="btn blue-gradient">SE CONNECTER</button></a>
													
													
												</div>
											</div>
											
										</div>
										<!--Bouton précédent et suivant-->
										<a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
								</div>

							</div>
						</div>
					</div>
				</div>
					<br>


			<!--- Footer --> <!--à modifier car template issu d'internet-->
					
							<div class="col-lg-12">

								<?php include('footer_client.php'); ?>
							</div>
			
            
    





	</body>
</html>
