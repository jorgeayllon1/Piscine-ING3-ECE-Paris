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

				<!--J'ai rajouté un _client dans les name pour se distinguer du vendeur-->

				
				<div class="form-row mb-4">
					<div class="col">

						<input type="text" name="prenom_client_inscription" id="prenom_client_inscription" class="form-control" placeholder="Prénom">
					</div>
					<div class="col">

						<input type="text" name="nom_client_inscription" id="nom_client_inscription" class="form-control" placeholder="nom">
					</div>
				</div>


				<input type="email" name="email_client_inscription" id="email_client_inscription" class="form-control mb-3" placeholder="E-mail">


				<input type="password" name="mdp_client_inscription" id="mdp_client_inscription" class="form-control" placeholder="Mot De Passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
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

				<!--Coordonnées bancaires-->

				<p>Vos coordonnées bancaires:</p>

				<div class="custom-control custom-radio">
				<input  type="radio" id="visa" name="type_carte"  class="custom-control-input" checked required>
				<label class="custom-control-label" for="visa">Visa</label>
				<i class="fa fa-cc-visa"></i>
				</div>
				<div class="custom-control custom-radio">
				<input  type="radio" id="master" name="type_carte"  class="custom-control-input" required>
				<label class="custom-control-label" for="master">MasterCard</label>
				<i class="fa fa-cc-mastercard"></i>
				</div>
				<div class="custom-control custom-radio">
				<input  type="radio"  id="express" name="type_carte" class="custom-control-input" required>
				<label class="custom-control-label" for="express">American express</label>
				<i class="fa fa-cc-amex"></i>
				</div>
				<div class="custom-control custom-radio">
				<input  type="radio" id="paypal" name="type_carte"  class="custom-control-input" required>
				<label class="custom-control-label" for="paypal">Paypal</label>
				<i class="fa fa-cc-paypal"></i>
				</div>


				<div class="form-row my-2">
					<div class="col">
						<label for="paiement_nom">Nom sur la carte :</label>
						<input type="text" name="paiement_nom" id="paiement_nom" class="form-control">
					</div>
					<div class="col">
						<label for="paiement_num_carte">Numéro carte :</label>
						<input type="text" name="paiement_num_carte" id="paiement_num_carte" class="form-control">
					</div>
				</div>

				<div class="form-row my-2 ">
					<div class="col">
						<label for="paiement_date_expi">Date expiration :</label>
						<input type="month" name="paiement_date_expi" id="paiement_date_expi" class="form-control">
					</div>
					<div class="col">
						<label for="paiement_code">CVC :</label>
						<input type="number" name="paiement_code" id="paiement_code" class="form-control">
					</div>
				</div>

				<p class="light-grey-text"><em>Paiement 100% sécurisé</em></p>


				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="news_client_inscription" name="new_client_inscription">
					<label class="custom-control-label" for="news_client_inscription">Souscrivez à notre newsletter</label>
				</div>

				<!-- Mettre name="submit" -->
				<button class="btn my-4 " style="background: #31405F; border:none; color:#fff;" name="submit_client_inscription" type="submit">S'inscrire</button>


				<p>ou avec:</p>

				<a href="#" class="mx-2" role="button"><i class="fa fa-facebook-f "></i></a>
				<a href="#" class="mx-2" role="button"><i class="fa fa-linkedin"></i></a>
				<a href="#" class="mx-2" role="button"><i class="fa fa-google-plus "></i></a>



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