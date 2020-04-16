<?php
session_start();
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
						<li class="nav-item"><a class="nav-link" href="compte_client.php">WANG David</a></li>
						<!--<li class="nav-item"><a class="nav-link" href="accueil.php">Se déconnecter</a></li>-->
						<form name="form" method="POST" action="compte_vendeur.php">
							<input type="submit" name="deco" value="Déconnexion">
						</form>
						<li><i class="fa fa-power-off mt-3" style="color: #fff;"></i></li>

					</ul>
				</div>
			</nav>








		</div>
	</div>



	<div class="container mt-5  ">

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
						<form class="text-center border border-light " action="#!">
							<!--PHP-->

							<p class="h4 mb-4">Vos informations</p>

							<input type="file" id="img_vendeur" class="form-control"> (pdp)


							<div class="form-row mb-4 mx-4 mt-4">
								<div class="col">

									<input type="text" id="prenom_vendeur" class="form-control" placeholder="David">
								</div>
								<div class="col">

									<input type="text" id="nom_vendeur" class="form-control" placeholder="Wang">
								</div>
							</div>


							<input type="email" id="email_vendeur" class="form-control mb-3" placeholder="E-mail">


							<input type="password" id="mdp_vendeur" class="form-control" placeholder="**********" aria-describedby="defaultRegisterFormPasswordHelpBlock">



							<button class="btn my-4 nav-vendeur" style="background: #67E514; border:none; color:#fff;" type="submit">Modifier</button>

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
											<th>moyen achat</th>


										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="id-vente">1</td>
											<td class="produit-vente">bijou</td>
											<td class="photo-vente"></td>
											<td class="prix-vente">56€</td>
											<td class="categorie-vente">Ferraille</td>
											<td class="description-vente">Neuf</td>
											<td class="moyen-vente">Enchère</td>


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
											<td>photo</td>
											<td>Theo</td>
											<td>En cours</td>
											<td>Bon musée</td>
											<td>560<sup>€</sup></td>
											<td>
												<a href="negocier.php"><button class="btn btn-primary">Négocier</button></a>
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
								<input type="text" id="ajout_nom" placeholder="Nom du produit">

							</div>


							<div class="form-group">
								<label for="ajout_image">Choisissez une photo pour le produit</label>
								<input type="file" class="form-control-file" id="ajout_image">
							</div>

							<div class="form-group">
								<label for="ajout_description">Description du produit</label>
								<textarea class="form-control rounded-0" style="border: solid black 1px ;" id="ajout_description" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label for="ajout_video">Choisissez une vidéo pour le produit</label>
								<input type="file" class="form-control-file" id="ajout_video">
							</div>

							<div class="form-group">
								<label for="ajout_categorie">Choisissez une catégorie</label>
								<select class="form-control" id="ajout_catégorie">
									<option>Choisir</option>
									<option>Ferraille ou trésor</option>
									<option>Bon pour le musée</option>
									<option>Accessoire VIP</option>
								</select>
							</div>

							<div class="form-group">
								<label for="ajout_prix">Prix</label>
								<input type="number">
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
											<th>Pseudo vendeur</th>
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
											<td>hzfhfeuk</td>
											<td>Bijou</td>
											<td></td>
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
										<tr>
											<!-- mettre les classes pour PHP comme pr vendeur-->
											<td>1</td>
											<td>hzfhfeuk</td>
											<td>Ayllon</td>
											<td>ayllon@mail.fr</td>
											<td>
												<button class="btn btn-primary">Retirer</button>
											</td>


										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>

					<!--AJOUTER UN VENDEUR-->
					<div class="tab-pane fade" id="ajouter-vendeur-admin">
						<form class="text-center border border-light p-2 form-vendeur" action="#!" form="post" style="background-color: #fff; ">
							<!--PHP-->

							<p class="h4 mb-4">Inscription d'un vendeur par admin</p>



							<div class="form-row mb-4">
								<div class="col">

									<input type="text" id="prenom_admin_inscription" class="form-control" placeholder="Prénom">
								</div>
								<div class="col">

									<input type="text" id="nom_admin_inscriptione" class="form-control" placeholder="nom">
								</div>
							</div>


							<input type="email" id="email_admin_inscription" class="form-control mb-3" placeholder="E-mail">


							<input type="text" id="pseudo_admin_inscription" class="form-control" placeholder="Pseudo" aria-describedby="defaultRegisterFormPasswordHelpBlock">
							<small id="pseudo_admin_inscription" class="form-text text-muted mb-4">


							</small>



							<button class="btn my-3 " style="background: #67E514; border:none; color:#fff;" type="submit">Inscrire</button>



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