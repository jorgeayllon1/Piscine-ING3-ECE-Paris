<?php
	#Cette ligne va demarrer le cookie pour une session, dès que l'utilisateur quitte la page, ça efface le cookie
	session_start(); // On démarre la session AVANT toute chose
	#Si vous voulez demarrer une nouvelle session, vous pouvez utiliser un onglet de navigateur priver
	/*
	if(isset($_SESSION["id_user"])){

	}
	*/
	$database = "ebayece";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sql = "SELECT * FROM les_items ORDER BY RAND() LIMIT 3 "; /**Aléatoire 1er caroussel, on limite à 3 items pour le caroussel*/
	$sql2 = "SELECT * FROM les_items ORDER BY RAND() LIMIT 3 "; /**Aléatoire 2eme caroussel */

	function chemins_dune_image($id_item, $db_handle)
	{
		$sql =
			"SELECT chemin from photo 
		inner join les_items
			on les_items.id = photo.id_item
			where les_items.id=$id_item";

		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) {
			$leschemins[] = $data["chemin"];
		}
		return $leschemins;
	}
	/**Deux variables différentes pour les 2 slides */
	$result = mysqli_query($db_handle, $sql);
	$result2 = mysqli_query($db_handle, $sql2);


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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<!--include popper.js-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
	<script src="accueil.js" type="text/javascript"></script>


</head>

<body>

	<!-- Scroll bar (Google Fonts)-->
	<div class="scrollbar scrollbar-lady-lips">
		<div class="force-overflow"></div>
	</div>



	<!-- Navigation SIDEBAR -->

	<div style="font-family: Arial, Helvetica, sans-serif;">
		<div class="container-fluid">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-1 col-md-1 col-xs-1 col-xm-1 sticky-top">
					<div class="sidenav">
						<a href="accueil.php">Accueil</a>
						<hr class="navside-hr">
						<a href="page_achat.php">Acheter</a>
						<hr class="navside-hr">
						<a href="compte_vendeur.php">Vendre</a>
						<hr class="navside-hr">
						<a href="cookie.php">A propos</a>
						<hr class="navside-hr">
					</div>
				</div>

				<div class="col-lg-11">

					<!----------------------------------------------------------------------------------------------------------------------->
					<!-- First NAVBAR-->

					<div class="row">

						<nav class="navbar navbar-expand-md col-lg-12 " style="border-bottom:solid #E7E7E7 ;">
							<a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>
							<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="navbar-nav">
									<!-- La suite de ce code php va soit afficher des boutons de connexion si l'utilisateur n'est pas connecter-->
									<!-- Soit afficher son nom et prenom avec une redirection vers son compte -->
									<?php
									if (!isset($_SESSION["id_user"])) {
										echo '<li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fa fa-user-plus"></i> S\'inscrire</a></li>';
										echo '<li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fa fa-sign-in"></i> Se connecter</a></li>';
									} else {
										echo '<li class="nav-item"><a class="nav-link" href="redirect_moncompte.php">' . $_SESSION["nom"] . ' ' . $_SESSION["prenom"] . '</a></li>';
										echo '<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>';
									}
									?>
								</ul>
							</div>
						</nav>
					</div>

					<!----------------------------------------------------------------------------------------------------------------------->

					<!-- Second NAVBAR POUR LES DIFFERENTES REDIRECTIONS-->

					<div class="row">
						<nav class="navbar navbar-expand-md col-md-11 nav2">

							<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar2">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse collapse2" id="myNavbar2">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link link2" href="categories.php"> <i class="fa fa-ellipsis-v"></i> Categories</a>
										<!--Classe font awesome pour icone-->
									</li>

									<li class="nav-item">
										<a class="nav-link link2" href="achat.php"><i class="fa fa-shopping-cart"></i> Achat</a>
									</li>

									<li class="nav-item">
										<a class="nav-link link2" href="compte_vendeur.php"><i class="fa fa-shopping-bag"></i> Vendre</a>
									</li>


									<li class="nav-item">
										<a class="nav-link link2" href="redirect_moncompte.php"><i class="fa fa-user"></i> Mon compte</a>
									</li>



								</ul>
							</div>
						</nav>

						<a href="panier.php" class="mx-4 my-2"><button class="btn btn-lg" style="border-radius: 10px;"> <i class="fa fa-shopping-basket"></i> </button></a>
						<!--Notification nb_item-->



					</div>


					<!-- RECHERCHE -->

					<div class="container container-search">
						<div class="row justify-content-center">
							<div class="col-md-8">

								<div class="input-group-prepend">
									<img src="images/logo-footer.png" width="20%">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Catégories
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="page_achat.php">Ferraille ou Trésor</a>
										<a class="dropdown-item" href="page_achat.php">Bon pour le musée</a>
										<a class="dropdown-item" href="page_achat.php">Accessoire VIP</a>
										<div role="separator" class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Filtrer</a>
									</div>

									<input type="text" class="form-control" placeholder="Rechercher..."><button class="btn btn-light border-dark"> <i class="fa fa-search"></i></button>
								</div>

							</div>
						</div>
					</div>


					<!----------------------------------------------------------------------------------------------------------------------->


					<!--- FIRST IMAGE SLIDER (CAROUSEL BIENVENUE) -->
					<div class="container slider">
						<div class="row">
							<div class="col-lg-12 ">
								<div id="carouselPos" class="carousel slide carousel-fade shadow p-3 mb-5 " data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselPos" data-slide-to="0" class="active"></li>
										<!--la slide active-->
										<li data-target="#carouselPos" data-slide-to="1"></li>
										<li data-target="#carouselPos" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100 opa8 " src="images/fond1.jpg" alt="un">
											<div class="carousel-caption d-md-block mb-5">
												<h1 class="h1-responsive" style="font-size:80px;">BIENVENUE CHEZ EBAY ECE</h1>
												<a href="achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Acheter</button></a>
												<a href="compte_vendeur.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Vendre</button></a>

											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block w-100 opa8 " style="opacity:0.8;" src="images/fond2.jpg" alt="deux">
											<!--Opacity 0.8 et width max-->
											<div class="carousel-caption d-md-block mb-5">
												<h1 class="h1-responsive" style="font-size:60px;">Plusieurs catégories de produits</h1>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Ferraille ou trésor</button></a>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Bon pour musée</button></a>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Accessoire VIP</button></a>

											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block w-100 opa8" src="images/fond3.jpg" alt="trois">
											<div class="carousel-caption d-md-block mb-5">
												<h1 class="h1-responsive" style="font-size:60px;">Plusieurs moyen d'achat, selon vos envies</h1>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Enchère</button></a>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Achat immédiat</button></a>
												<a href="page_achat.php"><button class="btn btn-lg mx-1" style="background:#31405F; color:#fff;">Meilleure offre</button></a>

											</div>
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselPos" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselPos" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>

							</div>
						</div>
					</div>

					<!----------------------------------------------------------------------------------------------------------------------->
					<!--LIGNE SEPARRATRICE-->
					<h3 class="horizontal-text-center my-5" style="text-align: center ;"><span id="selection" style="border-radius:5px;">Ajoutez à votre panier !</span></h3>

					<!-- Second Image Slider -->
					<div class="row d-flex justify-content-center my-1">


						<div id="multi" class="carousel slide carousel-multi-item my-2" data-ride="carousel">

							<ol class="carousel-indicators">
								<li data-target="#multi" data-slide-to="0" class="active"></li>
								<!--SLIDE active-->
								<li data-target="#multi" data-slide-to="1"></li>

							</ol>

							<div class="carousel-inner" role="listbox">

								<!--First slide-->
								<div class="carousel-item active">
									<div class="row d-flex justify-content-center">
									<?php
										while($data = mysqli_fetch_assoc($result))
										{
											echo '<div class="col-md-3">';
											echo '<div class="card shadow p-3 mb-5 bg-white rounded">';
											echo '<img class="card-img-top px-2 py-2" style="border-radius:15px;"
											src="'. chemins_dune_image($data["id"],$db_handle)[0] .'" alt="img" width="120px" height="270px">';
											echo '<div class="card-body" style="background-color: #EFEFF1;border-radius:15px;">';
											echo '<h4 class="card-title">'.$data["nom"].'</h4>';
											echo '<p class="card-text">'.$data["prix"].'<sup>€</sup>.</p>';
											echo '<p>ID Vendeur: '.$data["id_prop"].'  Type vente : ';
											switch ($data["type"]) {
												case 1:
													echo 'Enchère </p>';
													break;
												case 2:
													echo 'Achat immédiat </p>';
													break;
												case 3:
													echo 'Meilleure offre </p>';
													break;
											}    ;
											echo '<a href="panier.php" class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
											<p class="ajout-panier"><em>Ajouter au panier</em></p>
												</div>
												</div> </div>';
										}
								   ?>
									
									</div>
								</div>

								<!--Second slide-->

								<div class="carousel-item ">
									<div class="row d-flex justify-content-center">
									<?php
										while($data = mysqli_fetch_assoc($result2))
										{
											echo '<div class="col-md-3">';
											echo '<div class="card shadow p-3 mb-5 bg-white rounded">';
											echo '<img class="card-img-top px-2 py-2" style="border-radius:15px;"
											src="'. chemins_dune_image($data["id"],$db_handle)[0] .'" alt="img" width="120px" height="270px">';
											echo '<div class="card-body" style="background-color: #EFEFF1;border-radius:15px;">';
											echo '<h4 class="card-title">'.$data["nom"].'</h4>';
											echo '<p class="card-text">'.$data["prix"].'<sup>€</sup>.</p>';
											echo '<p>ID Vendeur: '.$data["id_prop"].'  Type vente : ';
											switch ($data["type"]) {
												case 1:
													echo 'Enchère </p>';
													break;
												case 2:
													echo 'Achat immédiat </p>';
													break;
												case 3:
													echo 'Meilleure offre </p>';
													break;
											}    ;
											echo '<a href="panier.php" class="btn btn-primary buy-buton"><i class="fa fa-shopping-basket"></i></a>
											<p class="ajout-panier"><em>Ajouter au panier</em></p>
												</div>
												</div> </div>';
										}
								   ?>
									
									</div>
								</div>
																
							</div>

							<a class="carousel-control-prev" href="#multi" role="button" data-slide="prev">
								<i class="fa fa-chevron-left" style="color:#31405F; font-size:20px;"></i>

							</a>
							<a class="carousel-control-next" href="#multi" role="button" data-slide="next">
								<i class="fa fa-chevron-right" style="color:#31405F; font-size:20px;"></i>

							</a>

						</div>

					</div>




					<h3 class="horizontal-text-center" style="text-align: center ;"><span id="selection" style="border-radius:5px;">La vente n'a jamais été aussi simple</span></h3>
					<br>


					<!-- Third Image Slider -->

					<div class="container">
						<div class="row ">
							<div class="col-lg-12 col-slider">
								<div id="carouselPos" class="carousel slide carousel-fade shadow p-3 mb-5 " data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselPos" data-slide-to="0" class="active"></li>
										<li data-target="#carouselPos" data-slide-to="1"></li>
										<li data-target="#carouselPos" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active header">
											<div class="overlay">
												<img class="d-block opa8 w-100" src="images/sell.jpg" alt="First slide">
												<div class="carousel-caption d-none d-md-block">
													<h1>VENDEZ EN TOUTE SIMPLICITE</h1>
													<a href="inscription_vendeur.php"><button class="btn btn-lg" style="background:#31405F; color:#fff;">S'INSCRIRE</button></a>
													<a href="compte_vendeur.php"><button class="btn btn-lg" style="background:#31405F; color:#fff;">SE CONNECTER</button></a>


												</div>
											</div>

										</div>
										<!--Bouton précédent et suivant-->
										<a class="carousel-control-prev" href="#carouselPos" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselPos" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<br>

				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">

							<?php include('footer_client.php'); ?>
						</div>

					</div>
				</div>



</body>

</html>