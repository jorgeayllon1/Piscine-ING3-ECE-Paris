<?php
session_start();

$database = "ebayece"

?>
<!DOCTYPE html>
<!--FICHIER TEST-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page achat</title>

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
		</div>
	</div>

	<div class="container my-4">
		<div class="row">
			<!-- Non utilisation des radios mais des checkbox car on peut combiner deux type d'achats, 
				faire javascript condition si enchère cochée alors disable meilleure offre-->
			<!--La page va charger selon des conditions, qui va automatiquement cocher les checkbox-->
			<h5>Filtrer selon le type d'achat et la catégorie:</h5>

			<div class="custom-control custom-checkbox custom-control-inline ml-5">
				<input type="checkbox" class="custom-control-input" id="enchere-check">
				<label class="custom-control-label" for="enchere-check">Enchère</label>
			</div>


			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" class="custom-control-input" id="achat-immediat-check">
				<label class="custom-control-label" for="achat-immediat-check">Achat immédiat</label>
			</div>


			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" class="custom-control-input" id="offre-check">
				<label class="custom-control-label" for="offre-check">Meilleure offre</label>
			</div>

			<div class="custom-control custom-checkbox custom-control-inline ml-5">
				<input type="checkbox" class="custom-control-input" id="ferraille-check">
				<label class="custom-control-label" for="ferraille-check">Ferraille ou trésor</label>
			</div>


			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" class="custom-control-input" id="musee-check">
				<label class="custom-control-label" for="musee-check">Bon pour le musée</label>
			</div>


			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" class="custom-control-input" id="vip-check">
				<label class="custom-control-label" for="vip-check">Accessoire VIP</label>
			</div>


		</div>
	</div>

	<div class="container">
		<!--Donner nom aux class pr PHP-->
		<div class="row">
			<div class="table-responsive">
				<table class="table table-produit">
					<thead class="table-bordered font-weight-bold" style="background-color: aliceblue;">
						<tr>
							<th scope="col">Photo</th>
							<th scope="col">Produit</th>
							<th scope="col">Description</th>
							<th scope="col">Catégorie</th>
							<th scope="col">Type de vente</th>
							<th scope="col">Fin enchère dans</th>
							<th scope="col">Prix</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><img src="images/item/item1.jpg" width="80px" height="80px"></th>
							<td>Lampe</td>
							<td><input type="textarea" value="bon état, vous ne regretterez pas cet acjat faites moi confiance"></td>
							<td>Ferraille ou trésor</td>
							<td>Achat immédiat</td>
							<td>0h 0min 0s</td>
							<td>
								<h4>56€</h4>
								Ajouter au panier<button class="btn ml-4" style="border-radius: 15px; background-color: #6AD51A;"> <i class="fa fa-shopping-basket"></i> </button>
							</td>
						</tr>
						<tr>
							<th scope="row"><img src="images/item/item2.jpg" width="80px" height="80px"></th>
							<td>Lampe</td>
							<td><input type="textarea" value="bon état"></td>
							<td>Ferraille ou trésor</td>
							<td>Enchère</td>
							<td>0h 3min 14s</td>
							<td>
								<h4>56€</h4>
								Ajouter au panier<button class="btn ml-4" style="border-radius: 15px; background-color: #6AD51A;"> <i class="fa fa-shopping-basket"></i> </button>
							</td>
						</tr>
						<tr>
							<th scope="row"><img src="images/item/item3.jpg" width="80px" height="80px"></th>
							<td>Lampe</td>
							<td><input type="textarea" value="bon état"></td>
							<td>Ferraille ou trésor</td>
							<td>Meilleure offre</td>
							<td>0h 0min 0s</td>
							<td>
								<h4>56€</h4>
								Ajouter au panier<button class="btn ml-4" style="border-radius: 15px; background-color: #6AD51A;"> <i class="fa fa-shopping-basket"></i> </button>
							</td>
						</tr>
					</tbody>
				</table>

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