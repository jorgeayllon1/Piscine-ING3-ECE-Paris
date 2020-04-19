<?php

	session_start();

	if (isset($_SESSION["id_user"])) {

		if ($_SESSION["rang"] != 2) {
			header("location: connexion_vendeur.php");
		}
	}
	#Sinon, on le renvoit à la page principale
	else {
		header("location: connexion_vendeur.php");
	}
	/**Manque modification photo de profil et fond */



	$session_pseudo=$_SESSION["pseudo"];

	$nom = isset($_POST["nom_vendeur"])?$_POST["nom_vendeur"]:"";
	$prenom = isset($_POST["prenom_vendeur"])?$_POST["prenom_vendeur"]:"";
	$pseudo = isset($_POST["pseudo_vendeur"])?$_POST["pseudo_vendeur"]:"";
	$email = isset($_POST["email_vendeur"])?$_POST["email_vendeur"]:"";
	$mdp = isset($_POST["mdp_vendeur"])?$_POST["mdp_vendeur"]:"";
	$photo_vendeur = isset($_POST["pdp_vendeur"])?$_POST["pdp_vendeur"]:"";
	$hide_vendeur = isset($_POST["hide_vendeur"])?$_POST["hide_vendeur"]:"";
	/**Condition pour déterminer si il y a déjà une photo avec une variable temporaire cachée car input file ne prend pas de value pour un path */

	if($photo_vendeur =='')
	{
		$hide_vendeur = isset($_POST["hide_vendeur"])?$_POST["hide_vendeur"]:"";

	}
	else{
		$hide_vendeur = $photo_vendeur;

	}

	$back_vendeur = isset($_POST["background_vendeur"])?$_POST["background_vendeur"]:"";
	$hide2_vendeur = isset($_POST["hide2_vendeur"])?$_POST["hide2_vendeur"]:"";

	if($back_vendeur =='')
	{
		$hide2_vendeur = isset($_POST["hide2_vendeur"])?$_POST["hide2_vendeur"]:"";

	}
	else{
		$hide2_vendeur = $back_vendeur;

	}

	/**Connexion à la bdd */
	$database = "ebayece";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if(isset($_POST['modifier_vendeur']))
	{
		/*Pour pseudo on la compare avec SESSION càd le cookie car dans ses infos on n'a pas le id*/
		if($db_found){

			/**User */
			$sql = " UPDATE user SET nom='$nom', prenom='$prenom', email='$email', 
			mdp='$mdp', photo_perso ='$hide_vendeur', photo_background = '$hide2_vendeur'  WHERE pseudo = '$pseudo'  ";
			$result = mysqli_query($db_handle,$sql);

			



			$sql= " UPDATE user SET pseudo='$pseudo' WHERE pseudo= '$session_pseudo'";
			$result = mysqli_query($db_handle,$sql);


			/*On met à jour le cookie*/

			$_SESSION["nom"] = $nom;
			$_SESSION["prenom"] = $prenom;
			$_SESSION["pseudo"] = $pseudo;
			$_SESSION["email"] = $email;
			$_SESSION["mdp"] = $mdp;
			$_SESSION["photo_perso"] = $hide_vendeur;
			$_SESSION["photo_background"] = $hide2_vendeur;


		}
		else{
			echo "BDD non trouvé";
		}
	}



?>


<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon compte vendeur</title>

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
			<nav class="navbar navbar-expand-md col-lg-12 nav-vendeur">
				<a class="navbar-brand" href="accueil.php"><img src="images/logo-vendeur.png" width="30%"></a>
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="main-navigation">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="compte_vendeur.php"><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"] ?></a></li>
						<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>
						<li><i class="fa fa-power-off mt-3" style="color: #fff;"></i></li>

					</ul>
				</div>
			</nav>



			<div class="col-lg-1 my-1 text-md-right">
				<button class="btn" style="border-radius: 10px;"> <i class="fa fa-home"></i> Vendre</button>
			</div>




		</div>
	</div>



	<div class="container-fluid d-flex justify-content-center mt-5  ">
		<div class="fond-vendeur">
			<div class="row d-flex justify-content-center ">
				<div class="col-lg-2 ">
					<aside class="col-12 col-md-2 p-0  ">

						<ul class="nav">
							<li class="nav-item ">
								<a class="nav-link active" style="background-color: #E52714;" data-toggle="tab" href="#info-vendeur" role="tab" aria-selected="true">Mes informations</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="background-color: #E52714;height: 80px; width: 120px;" data-toggle="tab" href="#historique-vendeur" role="tab" aria-selected="false">Historique des ventes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" style="background-color: #E52714;height: 80px; width: 120px;" data-toggle="tab" href="#publier-vendeur" role="tab" aria-selected="false">Publier une vente</a>
							</li>

							<li class="nav-item ">
								<a class="nav-link " style="background-color: #E52714; height: 80px; width: 120px;" data-toggle="tab" href="#retirer-vendeur" role="tab" aria-selected="false">Retirer une vente</a>
							</li>

							<li class="nav-item">
								<a class="nav-link " style="background-color: #E52714;height: 80px; width: 120px;" data-toggle="tab" href="#nego-vendeur" role="tab" aria-selected="false">Mes négociations</a>
							</li>
						</ul>

					</aside>

				</div>


				<div class="col-lg-10 d-flex justify-content-center">
					<div class="tab-content">

						<!--INFORMATIONS VENDEUR-->

						<div class="tab-pane fade show active my-4 " id="info-vendeur">
							<form class="text-center px-3 py-3  " style="background-color:#fff;" action="compte_vendeur.php" method="post">
								<!--PHP-->

								<p class="h4 mb-4">Vos informations</p>

								<div class="form-group">
									<label for="pdp_vendeur">Choisissez une photo pour votre profil :</label>
									<input type="file" name="pdp_vendeur" class="form-control-file" id="pdp_vendeur"  >
								</div>

								<p>Votre photo de profil actuelle : <p><br>
								<input type="text" name="hide_vendeur" style="display:none;" value="<?php echo $_SESSION["photo_perso"]?>">
								<img src="<?php echo "images/".$_SESSION['photo_perso'] ?>" width="100px" height="100px" >

								<input type="text" name="pseudo_vendeur" class="form-control mb-3" id="pseudo_vendeur"
								 value="<?php echo $_SESSION["pseudo"]?>">


								<div class="form-row mb-4 mx-4 mt-4">
									<div class="col">

										<input type="text" name="prenom_vendeur" id="prenom_vendeur" class="form-control" 
										value="<?php echo $_SESSION["prenom"]?>">
									</div>
									<div class="col">

										<input type="text" name="nom_vendeur" id="nom_vendeur" class="form-control" 
										value="<?php echo $_SESSION["nom"]?>">
									</div>
								</div>


								<input type="email" name="email_vendeur" id="email_vendeur" class="form-control mb-3" 
								value="<?php echo $_SESSION["email"]?>">


								<input type="password" name="mdp_vendeur" id="mdp_vendeur" class="form-control" 
								value="<?php echo $_SESSION["mdp"]?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">

								<div class="form-group my-2">
									<label for="back_vendeur">Choisissez une photo pour votre fond :</label>
									<input type="file" name="background_vendeur" class="form-control-file" id="back_vendeur">
								</div>
								<input type="text" name="hide2_vendeur" style="display:none;" value="<?php echo $_SESSION["photo_background"]?>">
								<img src="<?php echo "images/".$_SESSION['photo_background'] ?>" width="100px" height="100px" ><br>



								<button class="btn my-4 nav-vendeur" style="background: #E52714; border:none; color:#fff;" name="modifier_vendeur" type="submit">Modifier</button>

							</form>

						</div>

						<!--HISTORIQUE VENTES-->

						<div class="tab-pane fade" id="historique-vendeur">
							<p class="h4 mb-4" style="color:#fff;">Votre historique des ventes</p>
							<div class="table">

								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Produit</th>
												<th>photo</th>
												<th>Prix</th>
												<th>Catégorie</th>
												<th>Description</th>
												<th>Moyen vente</th>
												<th>Client</th>


											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="id-vente">1</td>
												<td class="produit-vente">bijou</td>
												<td class="photo-vente"><input type="file"></td>
												<td class="prix-vente">56€</td>
												<td class="categorie-vente">Ferraille</td>
												<td class="description-vente">Neuf</td>
												<td class="moyen-vente">Enchère</td>
												<td>Theo</td>


											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>


						<!--NEGOCIATIONS VENDEUR-->

						<div class="tab-pane fade" id="nego-vendeur">
							<p class="h4 mb-4" style="color:#fff;">Vos négociations</p>

							<div class="table">

								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Produit</th>
												<th>Client</th>
												<th>Statut</th>
												<th>Catégorie</th>
												<th>Prix actuel</th>
												<th>Négociation</th>

											</tr>
										</thead>
										<tbody>
											<tr>
												<!-- mettre les classes pour PHP comme pr vendeur-->
												<td>1</td>
												<td><input type="file"></td>
												<td>Theo</td>
												<td>En cours</td>
												<td>Bon musée</td>
												<td>560<sup>€</sup></td>
												<td>
													<a href="negocier_vendeur.php"><button class="btn btn-primary">Négocier</button></a>
												</td>


											</tr>
										</tbody>
									</table>
								</div>
							</div>

						</div>


						<!--AJOUTER UNE VENTE-->
						<div class="tab-pane fade" id="publier-vendeur">
							<p class="h4 mb-4" style="color:#fff;">Ajouter une vente</p>
							<form style="background-color:#fff;" class="py-3 px-3" method="POST" action="ajouter_vente_vendeur.php">
								<div class="form-group">
									<label for="ajout_nom">Nom du produit</label>
									<input type="text" name="ajout_nom" id="ajout_nom" placeholder="Nom du produit">

								</div>


								<div class="form-group">
									<label for="ajout_image">Choisissez une photo pour le produit</label>
									<input type="file" name="ajout_image" class="form-control-file" id="ajout_image">
								</div>

								<div class="form-group">
									<label for="ajout_description">Description du produit</label>
									<textarea class="form-control rounded-0" name="ajout_description" style="border: solid black 1px ;" id="ajout_description" rows="3"></textarea>
								</div>

								<div class="form-group">
									<label for="ajout_video">Choisissez une vidéo pour le produit</label>
									<input type="file" name="ajout_video" class="form-control-file" id="ajout_video">
								</div>

								<div class="form-group">
									<label for="ajout_categorie">Choisissez une catégorie</label>
									<select class="form-control" name="ajout_categorie" id="ajout_categorie">
										<option>Choisir</option>
										<option value="1">Ferraille ou trésor</option>
										<option value="2">Bon pour le musée</option>
										<option value="3">Accessoire VIP</option>
									</select>
								</div>

								<div class="form-group">
									<label for="ajout_prix">Prix</label>
									<input type="number" name="ajout_prix">
								</div>
								<!-- J'ai changé le type de div pour pouvoir retourner un ajout_type-->
								<div class="form-group">
									<label for="ajout_categorie">Choisissez un type d'achat</label>
									<select class="form-control" name="ajout_type" id="ajout_type">
										<option>Choisir</option>
										<option value="1">Enchère</option>
										<option value="2">Achat immédiat</option>
										<option value="3">Meilleure offre</option>
									</select>
								</div>

								<!--
								<div class="custom-control">
									<label for="ajout_moyen">Moyen de vente :</label><br>
									<input type="checkbox" name="ajout_moyen" id="ajout_enchere">
									<label for="ajout_enchere">Enchère</label>
									<input type="checkbox" name="ajout_moyen" id="ajout_immediat">
									<label for="ajout_immediat">Achat immédiat</label>
									<input type="checkbox" name="ajout_moyen" id="ajout_meilleure">
									<label for="ajout_meilleure">Meilleure offre</label>
								</div> -->

								<div class="row d-flex justify-content-center">
									<a href="#"><button class="btn btn-rounded my-2" style="background: #E52714; color: #fff;" name="ajouter_item_vendeur" type="submit">Publier</button></a>

								</div>




							</form>

						</div>

						<!--RETIRER UNE VENTE-->

						<div class="tab-pane fade" id="retirer-vendeur">
							<p class="h4 mb-4" style="color:#fff;">Retirer une vente</p>

							<div class="table">
								<div class="caption my-2">Vos articles en vente actuellement : </div>
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Produit(nom)</th>
												<th>Photo</th>
												<th>Description</th>
												<th>Vidéo</th>
												<th>Catégorie</th>
												<th>Moyen vente</th>
												<th>Prix initial</th>
												<th>Prix actuel</th>

											</tr>
										</thead>
										<tbody>
											<tr>
												<!-- mettre les classes pour PHP comme pr vendeur-->
												<td>1</td>
												<td>Bijou</td>
												<td><input type="file"></td>
												<td>Bon état, pas de défaut</td>
												<td></td>
												<td>Bon musée</td>
												<td>Enchère</td>
												<td>299<sup>€</sup></td>
												<td>560<sup>€</sup></td>
												<td>
													<button class="btn btn-primary">Retirer</button>
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



	</div>

	<div class="container">

		<div class="row-width-max">

			<?php include('footer_vendeur.php'); ?>

		</div>

	</div>



</body>

</html>