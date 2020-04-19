<?php
	session_start();

	if (isset($_POST['deco'])) {
		if ($_POST['deco']) {
			$fp = fopen('cookie.php', 'w');
			fclose($fp);
			header("location: accueil.php");
		}
	}

    /**Manque modification photo de profil */

	$id = isset($_POST["id_admin"])?$_POST["id_admin"]:"";


	$nom = isset($_POST["nom_admin"])?$_POST["nom_admin"]:"";
	$prenom = isset($_POST["prenom_admin"])?$_POST["prenom_admin"]:"";
	$email = isset($_POST["email_admin"])?$_POST["email_admin"]:"";
	$mdp = isset($_POST["mdp_admin"])?$_POST["mdp_admin"]:"";
	$photo_admin = isset($_POST["img_admin"])?$_POST["img_admin"]:"";
	$hide_admin = isset($_POST["hide_admin"])?$_POST["hide_admin"]:"";

	/**Condition pour déterminer si il y a déjà une photo avec une variable temporaire cachée car input file ne prend pas de value pour un path */

	if($photo_admin =='')
	{
		$hide_admin = isset($_POST["hide_admin"])?$_POST["hide_admin"]:"";

	}
	else{
		$hide_admin = $photo_admin;

	}



	/**Connexion à la bdd */
	$database = "ebayece";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if(isset($_POST['modifier_admin']))
	{
		/*Pour pseudo on la compare avec SESSION càd le cookie car dans ses infos on n'a pas le id*/
		if($db_found){

			/**User */
			$sql = " UPDATE user SET nom='$nom', prenom='$prenom', email='$email', 
			mdp='$mdp', photo_perso='$hide_admin' WHERE id = '$id'  ";
			$result = mysqli_query($db_handle,$sql);


			/*On met à jour le cookie*/

			$_SESSION["nom"] = $nom;
			$_SESSION["prenom"] = $prenom;
			$_SESSION["email"] = $email;
			$_SESSION["mdp"] = $mdp;
			$_SESSION['photo_perso']= $hide_admin;


		}
		else{
			echo "BDD non trouvé";
		}
	}
	
	/**ON AFFICHE TOUT LES VENDEURS */
	if($db_found)
	{
		$sql1 = "SELECT * FROM user WHERE rang like '2'";
		$result1 = mysqli_query($db_handle,$sql1);

		if (mysqli_num_rows($result1) == 0) {
			#echo "Erreur";
		} 
	}



	

?>

<!DOCTYPE htmls>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon compte admin</title>

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
			<nav class="navbar navbar-expand-md col-lg-12 navbar-admin">
				<a class="navbar-brand" href="accueil.php"><img src="images/logo-admin.png" width="40%"></a>
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="main-navigation">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="compte_admin.php"><?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?></a></li>
						<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>
						
						<li><i class="fa fa-power-off mt-3" style="color: #fff;"></i></li>

					</ul>
				</div>
			</nav>








		</div>
	</div>



	<div class="container-fluid d-flex justify-content-center mt-5  ">

		<div class="row d-flex justify-content-center ">
			<div class="col-lg-2 ">
				<aside class="col-12 col-md-2 p-0  ">

					<ul class="nav">
						<li class="nav-item ">
							<a class="nav-link active" style="background-color: #67E514;" data-toggle="tab" href="#info-admin" role="tab" aria-selected="true">Mes informations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" style="background-color: #67E514;height: 80px; width: 120px;" data-toggle="tab" href="#historique-admin" role="tab" aria-selected="false">Historique des ventes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" style="background-color: #67E514;height: 80px; width: 120px;" data-toggle="tab" href="#publier-admin" role="tab" aria-selected="false">Publier une vente</a>
						</li>

						<li class="nav-item ">
							<a class="nav-link " style="background-color: #67E514; height: 80px; width: 120px;" data-toggle="tab" href="#retirer-admin" role="tab" aria-selected="false">Retirer une vente</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " style="background-color: #67E514;height: 80px; width: 120px;" data-toggle="tab" href="#nego-admin" role="tab" aria-selected="false">Mes négociations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " style="background-color: #67E514;height: 80px; width: 120px;" data-toggle="tab" href="#retirer-vendeur-admin" role="tab" aria-selected="false">Retirer un vendeur</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " style="background-color: #67E514;height: 80px; width: 120px;" data-toggle="tab" href="#ajouter-vendeur-admin" role="tab" aria-selected="false">Ajouter un vendeur</a>
						</li>
					</ul>

				</aside>

			</div>


			<div class="col-lg-10 d-flex justify-content-center">
				<div class="tab-content">

					<!--INFORMATIONS ADMIN-->

					<div class="tab-pane fade show active " id="info-admin">
						<form class="text-center border border-light " action="compte_admin.php" method="post">
							<!--PHP-->

							<p class="h4 mb-4">Vos informations</p>
							<input type="text" name="id_admin" style="display:none;" value="<?php echo $_SESSION["id_user"]?>">

							<!--Changement photo de profil-->

							<input type="text" name="hide_admin" style="display:none;" value="<?php echo $_SESSION["photo_perso"]?>">

							<input type="file" name="img_admin" id="img_admin" class="form-control"> 
							<p>Votre photo de profil actuelle :<p><br>
							<img src="<?php echo "images/".$_SESSION['photo_perso'] ?>" width="100px" height="100px" >


							<div class="form-row mb-4 mx-4 mt-4">
								<div class="col">

									<input type="text" name="prenom_admin" id="prenom_admin" class="form-control" 
									value="<?php echo $_SESSION["prenom"]?>">
								</div>
								<div class="col">

									<input type="text" name="nom_admin" id="nom_admin" class="form-control" 
									value="<?php echo $_SESSION["nom"]?>">
								</div>
							</div>


							<input type="email" name="email_admin" id="email_admin" class="form-control mb-3" 
							value="<?php echo $_SESSION["email"]?>">


							<input type="password" name="mdp_admin" id="mdp_admin" class="form-control"
							 value="<?php echo $_SESSION["mdp"]?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">



							<button class="btn my-4 " style="background: #67E514; border:none; color:#fff;" name="modifier_admin" type="submit">Modifier</button>

						</form>

					</div>

					<!--HISTORIQUE ADMIN-->

					<div class="tab-pane fade" id="historique-admin">
						<p class="h4 mb-4">Votre historique des ventes</p>
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


					<!--NEGOCIATIONS ADMIN-->

					<div class="tab-pane fade" id="nego-admin">
						<p class="h4 mb-4">Vos négociations</p>

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
					<div class="tab-pane fade" id="publier-admin">
						<p class="h4 mb-4">Ajouter une vente</p>
						<form>
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
								<select class="form-control" name="ajout_catégorie" id="ajout_catégorie">
									<option>Choisir</option>
									<option>Ferraille ou trésor</option>
									<option>Bon pour le musée</option>
									<option>Accessoire VIP</option>
								</select>
							</div>

							<div class="form-group">
								<label for="ajout_prix">Prix</label>
								<input type="number" name="ajout-prix">
							</div>

							<div class="custom-control">
								<label for="ajout_moyen">Moyen de vente :</label><br>
								<input type="checkbox" name="ajout_moyen" id="ajout_enchere">
								<label for="ajout_enchere">Enchère</label>
								<input type="checkbox" name="ajout_moyen" id="ajout_immediat">
								<label for="ajout_immediat">Achat immédiat</label>
								<input type="checkbox" name="ajout_moyen" id="ajout_meilleure">
								<label for="ajout_meilleure">Meilleure offre</label>
							</div>

							<div class="row d-flex justify-content-center">
								<a href="#"><button class="btn btn-rounded my-2" style="background: #67E514; color: #fff;">Publier</button></a>

							</div>




						</form>

					</div>

					<!--RETIRER UNE VENTE-->

					<div class="tab-pane fade" id="retirer-admin">
						<p class="h4 mb-4">Retirer une vente</p>

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

					<!--RETIRER UN VENDEUR-->
					<div class="tab-pane fade" id="retirer-vendeur-admin">
						<form action="compte_admin.php" method="post">
							<p class="h4 mb-4">Liste complète des vendeurs</p>

							

							<div class="table">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Pseudo vendeur</th>
												<th>Nom vendeur</th>
												<th>Email vendeur</th>
											</tr>
										</thead>
										<tbody>
											<?php
											
											while($data=mysqli_fetch_assoc($result1))
											{

													echo '<tr>';
													echo '<td value="'.$data['id'].'">'.$data['id'].'</td>';
													echo '<td>' .$data['pseudo']. '</td>';
													echo '<td>' .$data['nom']. '</td>';
													echo '<td>' .$data['email']. '</td>';
													echo  '<td>
													<button class="btn btn-primary"';
													echo 'id="retirer_vendeur'.$data['id'].'">Retirer</button> </td> </tr>';

											}

											

											?>

										


										</tbody>
									</table>
								</div>
							</div>
						</form>

					</div>

					<!--AJOUTER UN VENDEUR-->
					<div class="tab-pane fade" id="ajouter-vendeur-admin">
						<form class="text-center border border-light p-2 form-vendeur" action="#!" form="post" style="background-color: #fff; ">
							<!--PHP-->

							<p class="h4 mb-4">Inscription d'un vendeur par admin</p>



							<div class="form-row mb-4">
								<div class="col">

									<input type="text" name="prenom_admin_inscription" id="prenom_admin_inscription" class="form-control" placeholder="Prénom">
								</div>
								<div class="col">

									<input type="text" name="nom_admin_inscriptio" id="nom_admin_inscription" class="form-control" placeholder="nom">
								</div>
							</div>


							<input type="email" name="email_admin_inscription" id="email_admin_inscription" class="form-control mb-3" placeholder="E-mail">


							<input type="text" name="pseudo_admin_inscription" id="pseudo_admin_inscription" class="form-control" placeholder="Pseudo" aria-describedby="defaultRegisterFormPasswordHelpBlock">
							<small id="pseudo_admin_inscription" class="form-text text-muted mb-4">


							</small>



							<button class="btn my-3 " style="background: #67E514; border:none; color:#fff;" name="ajout_vendeur" type="submit">Inscrire</button>



							<hr>


							<p>En cliquant sur
								<em>S'inscrire</em> vous acceptez nos
								<a href="" target="_blank">conditions de service</a></p>



						</form>
					</div>


				</div>
			</div>



		</div>

	</div>

	<div class="container">

		<div class="row-width-max">

			<?php include('footer_admin.php'); ?>

		</div>

	</div>



</body>

</html>