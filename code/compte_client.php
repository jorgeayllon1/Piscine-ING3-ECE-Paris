<?php
		session_start();

		ini_set('display_error',1); /*Affichage erreur*/

		$type_carte=$_SESSION["type"]; /*Pour savoir cocher quel button radio lorsque le client accède à son compte*/
		$session_pseudo=$_SESSION["pseudo"];


        /*Dans le form, l'id est caché avec display none*/
		$id = isset($_POST["id_client"])?$_POST["id_client"]:"";
		
		$nom = isset($_POST["nom_client"])?$_POST["nom_client"]:"";
		$prenom = isset($_POST["prenom_client"])?$_POST["prenom_client"]:"";
		$pseudo = isset($_POST["pseudo_client"])?$_POST["pseudo_client"]:"";
		$email = isset($_POST["email_client"])?$_POST["email_client"]:"";
		$mdp = isset($_POST["mdp_client"])?$_POST["mdp_client"]:"";
		$adresse1 = isset($_POST["ad1_client"])?$_POST["ad1_client"]:"";
		$adresse2 = isset($_POST["ad2_client"])?$_POST["ad2_client"]:"";
		$pays = isset($_POST["pays_client"])?$_POST["pays_client"]:"";
		$ville = isset($_POST["ville_client"])?$_POST["ville_client"]:"";
		$cp = isset($_POST["cp_client"])?$_POST["cp_client"]:"";
		$phone = isset($_POST["phone_client"])?$_POST["phone_client"]:"";
		$carte_type = isset($_POST["type_carte"])?$_POST["type_carte"]:""; /*ne pas confondre avec $type_carte qui permet de get la carte enregistrée dans le cookie*/
		$nom_carte = isset($_POST["paiement_nom"])?$_POST["paiement_nom"]:"";
		$num_carte = isset($_POST["paiement_num_carte"])?$_POST["paiement_num_carte"]:"";
		$date_carte = isset($_POST["paiement_date_expi"])?$_POST["paiement_date_expi"]:"";
		$code_carte = isset($_POST["paiement_code"])?$_POST["paiement_code"]:"";

		/**Connexion à la bdd */
		$database = "ebayece";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);

		if(isset($_POST['modifier_client']))
		{
			/*Pour pseudo on la compare avec SESSION càd le cookie car dans ses infos on n'a pas le id*/
			if($db_found){

				/**User */
				$sql = " UPDATE user SET nom='$nom', prenom='$prenom', email='$email', /**On met à jour la donnée */
				mdp='$mdp' WHERE pseudo = '$pseudo'  ";
				$result = mysqli_query($db_handle,$sql);

				$sql= " UPDATE user SET pseudo='$pseudo' WHERE pseudo= '$session_pseudo'";
				$result = mysqli_query($db_handle,$sql);

				/**Livraison */

				$sql = "UPDATE  coord_livraison
				INNER JOIN user  ON coord_livraison.id='$id'
				SET adresse1='$adresse1', adresse2='$adresse2', pays='$pays',
				ville='$ville', code_postal='$cp', num_tel='$phone'";
				$result = mysqli_query($db_handle,$sql);


				/**Transaction marche pas, comprend pas pk*/ 

				$sql = "UPDATE  info_bancaire
				INNER JOIN user  ON info_bancaire.id='$id'
				SET num_carte='$num_carte', type='$carte_type', nom_sur_carte='$nom_carte', 
				code='$code_carte'";
				$result = mysqli_query($db_handle,$sql);
				echo $sql;

				



				/*On met à jour le cookie*/

				$_SESSION["nom"] = $nom;
				$_SESSION["prenom"] = $prenom;
				$_SESSION["pseudo"] = $pseudo;
				$_SESSION["email"] = $email;
				$_SESSION["mdp"] = $mdp;
				$_SESSION["adresse1"] = $adresse1;
				$_SESSION["adresse2"] = $adresse2;
				$_SESSION["ville"] = $ville;
				$_SESSION["code_postal"] = $cp;
				$_SESSION["pays"] = $pays;
				$_SESSION["num_tel"] = $phone;
				$_SESSION["num_carte"] = $num_carte;
				$_SESSION["type"] = $carte_type;
				$_SESSION["nom_sur_carte"] = $nom_carte;
				$_SESSION["date_expi"] = $date_carte;
				$_SESSION["code"] = $code_carte;

			}
			else{
				echo "BDD non trouvé";
			}
		}
		


?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon compte client</title>

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
						<li class="nav-item"><a class="nav-link" href="compte_client.php"><?php echo $_SESSION["nom"] . ' ' . $_SESSION["prenom"] ?></a></li>
						<!--<li class="nav-item"><a class="nav-link" href="accueil.php">Se déconnecter</a></li>-->
						<form name="form" method="POST" action="compte_vendeur.php">
							<input type="submit" name="deco" value="Déconnexion">
						</form>
						<li><i class="fa fa-power-off mt-3" style="color: #fff;"></i></li>

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



	<div class="container-fluid d-flex justify-content-center mt-5">

		<div class="row d-flex justify-content-center">

			<div class="col-lg-2 ">
				<aside class="col-12 col-md-2 p-0  ">

					<ul class="nav">
						<li class="nav-item ">
							<a class="nav-link active" style="background-color: #31405F;" data-toggle="tab" href="#info-client" role="tab" aria-selected="true">Mes informations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link w-100" style="background-color: #31405F;" data-toggle="tab" href="#historique-client" role="tab" aria-selected="false">Historique d'achats</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" style="background-color: #31405F;" data-toggle="tab" href="#nego-client" role="tab" aria-selected="false">Mes négociations</a>
						</li>

						<li class="nav-item">
							<a class="nav-link w-100" style="background-color: #31405F;" data-toggle="tab" href="#enchere-client" role="tab" aria-selected="false">Enchères en cours</a>
						</li>
					</ul>

				</aside>

			</div>


			<div class="col-lg-10 d-flex justify-content-center">
				<div class="tab-content">


					<div class="tab-pane fade show active " id="info-client">
						<form class="text-center border border-light " action="compte_client.php" method="post">
							<!--PHP-->

							<p class="h4 mb-4">Vos informations</p>


							<div class="form-row mb-4">
								<div class="col">

								    <input type="text" name="id_client" style="display:none;" value="<?php echo $_SESSION["id_user"]?>">

									<input type="text" name="prenom_client" id="prenom_client" class="form-control" 
									value="<?php echo $_SESSION["prenom"]?>">
								</div>
								<div class="col">

									<input type="text" name="nom_client" id="nom_client" class="form-control"
									value="<?php echo $_SESSION["nom"]?>">
								</div>
							</div>

							<input type="text" name="pseudo_client" id="pseudo_client" class="form-control mb-3" 
							value="<?php echo $_SESSION["pseudo"]?>">


							<input type="email" name="email_client" id="email_client" class="form-control mb-3" 
							value="<?php echo $_SESSION["email"]?>">


							<input type="password" name="mdp_client" id="mdp_client" class="form-control" 
							value="<?php echo $_SESSION["mdp"]?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">
							<small id="mdp_client" class="form-text text-muted mb-4">
								Au moins 8 caractères et un chiffre

							</small>
							<input type="text"  name="ad1_client" id="ad1_client" class="form-control mb-3"
							value="<?php echo $_SESSION["adresse1"]?>">
							<input type="text" name="ad2_client"  id="ad2_client" class="form-control mb-3" 
							value="<?php echo $_SESSION["adresse2"]?>">

							<div class="form-row mb-4">
								<div class="col">
									<input type="text" name="pays_client" id="pays_client" class="form-control mb-3"
									value="<?php echo $_SESSION["pays"]?>">
								</div>
								<div class="col">
									<input type="text" name="ville_client" id="ville_client" class="form-control mb-3"
									value="<?php echo $_SESSION["ville"]?>">
								</div>
							</div>

							<input type="number" name="cp_client" id="cp_client" class="form-control mb-3" 
							value="<?php echo $_SESSION["code_postal"]?>">


							<input type="text" name="phone_client" id="phone_client" class="form-control" 
							value="<?php echo $_SESSION["num_tel"]?>" aria-describedby="defaultRegisterFormPhoneHelpBlock">
							<small id="phone_client" class="form-text text-muted mb-3">
								Numéro en France
							</small>

							<p class="h5 mb-4">Vos informations bancaires</p>

							<div class="custom-control custom-radio">
								<input  type="radio" id="visa" name="type_carte"  class="custom-control-input" 
								<?php if($type_carte === 'Visa') echo 'checked="checked"';?> >
								<label class="custom-control-label" for="visa">Visa</label>
								<i class="fa fa-cc-visa"></i>
								</div>
								<div class="custom-control custom-radio">
								<input  type="radio" id="master" name="type_carte"  class="custom-control-input"
								<?php if($type_carte === 'MatserCard') echo 'checked="checked"';?>>
								<label class="custom-control-label" for="master">MasterCard</label>
								<i class="fa fa-cc-mastercard"></i>
								</div>
								<div class="custom-control custom-radio">
								<input  type="radio"  id="express" name="type_carte" class="custom-control-input"
								<?php if($type_carte === 'American Express') echo 'checked="checked"';?>>
								<label class="custom-control-label" for="express">American express</label>
								<i class="fa fa-cc-amex"></i>
								</div>
								<div class="custom-control custom-radio">
								<input  type="radio" id="paypal" name="type_carte"  class="custom-control-input" 
								<?php if($type_carte === 'Paypal') echo 'checked="checked"';?>>
								<label class="custom-control-label" for="paypal">Paypal</label>
								<i class="fa fa-cc-paypal"></i>
							</div>

							<div class="form-row my-2">
								<div class="col">
									<label for="paiement_nom">Nom sur la carte</label>
									<input type="text" name="paiement_nom" id="paiement_nom" class="form-control"
									value="<?php echo $_SESSION["nom_sur_carte"]?>">
								</div>
								<div class="col">
									<label for="paiement_num_carte">Numéro carte</label>
									<input type="text" name="paiement_num_carte" id="paiement_num_carte" class="form-control"
									value="<?php echo $_SESSION["num_carte"]?>">
								</div>
							</div>

							<div class="form-row my-2 ">
								<div class="col">
									<label for="paiement_date_expi">Date expiration</label>
									<input type="month"  name="paiement_date_expi" id="paiement_date_expi" class="form-control"
									value="<?php echo $_SESSION["date_expi"]?>">
								</div>
								<div class="col">
									<label for="paiement_code">CVC</label>
									<input type="number"  name="paiement_code" id="paiement_code" class="form-control"
									value="<?php echo $_SESSION["code"]?>">
								</div>
							</div>


							<button class="btn my-4 " style="background: #31405F; border:none; color:#fff;" name="modifier_client" type="submit">Modifier</button>

						</form>

					</div>

					<div class="tab-pane fade" id="historique-client">
						<p class="h4 mb-4">Votre historique d'achat</p>
						<div class="table">

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Produit</th>
											<th>Prix</th>
											<th>Quantité</th>
											<th>Moyen paiement</th>
											<th>Date achat</th>
											<th>Livraison</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<!-- mettre les classes pour PHP comme pr vendeur-->
											<td>1</td>
											<td><input type="file"></td>
											<td>56€</td>
											<td>2</td>
											<td>MasterCard</td>
											<td>2020-03-04</td>
											<td>Adresse</td>


										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="nego-client">
						<p class="h4 mb-4">Vos Négociations</p>

						<div class="table">

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Produit</th>
											<th>Vendeur</th>
											<th>Statut</th>
											<th>Catégorie</th>
											<th>Première offre</th>
											<th>Offre actuelle</th>
											<th>Nombre offre restant</th>
											<th>Nouvelle offre</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<!-- mettre les classes pour PHP comme pr vendeur-->
											<td>1</td>
											<td><input type="file"></td>
											<td>Theo</td>
											<td>En cours</td>
											<td>Ferraille</td>
											<td>390<sup>€</sup></td>
											<td>560<sup>€</sup></td>
											<td>3</td>
											<td>
												<a href="negocier_client.php"><button class="btn btn-primary my-2">Négocier</button></a>

											</td>


										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>

					<div class="tab-pane fade" id="enchere-client">
						<p class="h4 mb-4">Vos enchères </p>

						<div class="table">

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="text-center">
											<th>#</th>
											<th>Produit</th>
											<th>Vendeur</th>
											<th>Statut</th>
											<th>Catégorie</th>
											<th>Prix initial</th>
											<th>Prix proposé</th>
											<th>Fin enchère dans</th>
											<th>Nouvelle offre</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<!-- mettre les classes pour PHP comme pr vendeur-->
											<td>1</td>
											<td>
												<input type="file">
											</td>
											<td>Theo</td>
											<td>En cours</td>
											<td>VIP</td>
											<td>390<sup>€</sup></td>
											<td>560<sup>€</sup></td>
											<td>
												<input type="text" value="12min:33s">

											</td>
											<td>
												<a href="enchere.php"><button class="btn btn-primary">Enchérir</button></a>
											</td>


										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>



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