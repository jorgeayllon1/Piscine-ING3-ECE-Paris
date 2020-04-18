<?php
session_start();
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription client</title>

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

		<div class="row d-flex justify-content-center items-align-center">
			<div class="col-lg-12">


				<nav class="navbar d-flex justify-content-center items-align-center ">
					<a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>

				</nav>
			</div>
		</div>

	</div>

	<div class="container">

		<div class="row w-100 d-flex justify-content-center items-align-center">


			<form class="text-center border border-light p-5" method="post" action="redirect_inscription_client.php">
				<!--PHP-->

				<p class="h4 mb-4">S'inscrire</p>

				
				<div class="form-row mb-4">
					<div class="col">

						<input type="text" name="prenom_inscription" id="prenom_client_inscription" class="form-control" placeholder="Prénom">
					</div>
					<div class="col">

						<input type="text" name="nom_inscription" id="nom_client_inscriptione" class="form-control" placeholder="nom">
					</div>
				</div>


				<input type="email" name="email_inscription" id="email_client_inscription" class="form-control mb-3" placeholder="E-mail">


				<input type="password" name="mdp_inscription" id="mdp_client_inscription" class="form-control" placeholder="Mot De Passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
				<small id="mdp_client_inscription" class="form-text text-muted mb-4">
					<em>Au moins 8 caractères et un chiffre</em>

				</small>
				<input type="text" name="ad1_client_inscription" id="ad1_client_inscription" class="form-control mb-3" placeholder="Adresse">
				<input type="text" name="ad2_client_inscription" id="ad2_client_inscription" class="form-control mb-3" placeholder="Complément adresse">

				<div class="form-row mb-4">
					<div class="col">
						<input type="text" name="pays_client_inscription" id="pays_client_inscription" class="form-control mb-3" placeholder="Pays">
					</div>
					<div class="col">
						<input type="text" name="ville_client_inscription" id="ville_client_inscription" class="form-control mb-3" placeholder="Ville">
					</div>
				</div>

				<input type="number" name="cp_client_inscription" id="cp_client-inscription" class="form-control mb-3" placeholder="Code Postal">


				<input type="text" name="phone_client_inscription" id="phone_client_inscription" class="form-control" placeholder="Téléphone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
				<small id="phone_client_inscription" class="form-text text-muted mb-3">
					Numéro en France
				</small>


				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="news_client_inscription">
					<label class="custom-control-label" for="news_client_inscription">Souscrivez à notre newsletter</label>
				</div>

				<!-- Mettre name="submit" -->
				<button class="btn my-4 " style="background: #31405F; border:none; color:#fff;" name="submit" type="submit">S'inscrire</button>


				<p>ou avec:</p>

				<a href="#" class="mx-2" role="button"><i class="fa fa-facebook-f "></i></a>
				<a href="#" class="mx-2" role="button"><i class="fa fa-linkedin"></i></a>
				<a href="#" class="mx-2" role="button"><i class="fa fa-google-plus "></i></a>

				<p><em>Les informations de paiement seront à saisir lors de votre premier achat sur notre site</em></p>

				<hr>


				<p>En cliquant sur
					<em>S'inscrire</em> vous acceptez nos
					<a href="" target="_blank">conditions de service</a></p>

				<p><em>Déjà un compte ? Connectez-vous</em></p>
				<a href="connexion_client.php" style="color:#fff;"><button class="btn" style="background: #31405F; border:none; color:#fff;">Se connecter</a>


			</form>




		</div>
		<div class="container">
			<div class="row-width-max">
				<?php include('footer_client.php'); ?>
			</div>
		</div>


</body>

</html>