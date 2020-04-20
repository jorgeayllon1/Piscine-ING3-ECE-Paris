<?php
session_start();


if (isset($_SESSION["id_user"])) {

	if ($_SESSION["rang"] != 1) {
		header("location: connexion_client.php");
	}
}
#Sinon, on le renvoit à la page principale
else {
	header("location: connexion_client.php");
}

ini_set('display_error', 1); /*Affichage erreur*/

$type_carte = $_SESSION["type"]; /*Pour savoir cocher quel button radio lorsque le client accède à son compte*/
$session_pseudo = $_SESSION["pseudo"];
$temp = "type";



/*Dans le form, l'id est caché avec display none*/
/*Manque modif date*/
$id = isset($_POST["id_client"]) ? $_POST["id_client"] : "";

$nom = isset($_POST["nom_client"]) ? $_POST["nom_client"] : "";
$prenom = isset($_POST["prenom_client"]) ? $_POST["prenom_client"] : "";
$pseudo = isset($_POST["pseudo_client"]) ? $_POST["pseudo_client"] : "";
$email = isset($_POST["email_client"]) ? $_POST["email_client"] : "";
$mdp = isset($_POST["mdp_client"]) ? $_POST["mdp_client"] : "";
$adresse1 = isset($_POST["ad1_client"]) ? $_POST["ad1_client"] : "";
$adresse2 = isset($_POST["ad2_client"]) ? $_POST["ad2_client"] : "";
$pays = isset($_POST["pays_client"]) ? $_POST["pays_client"] : "";
$ville = isset($_POST["ville_client"]) ? $_POST["ville_client"] : "";
$cp = isset($_POST["cp_client"]) ? $_POST["cp_client"] : "";
$phone = isset($_POST["phone_client"]) ? $_POST["phone_client"] : "";
$carte_type = isset($_POST["type_carte"]) ? $_POST["type_carte"] : ""; /*ne pas confondre avec $type_carte qui permet de get la carte enregistrée dans le cookie*/
$nom_carte = isset($_POST["paiement_nom"]) ? $_POST["paiement_nom"] : "";
$num_carte = isset($_POST["paiement_num_carte"]) ? $_POST["paiement_num_carte"] : "";
$date_carte = isset($_POST["paiement_date_expi"]) ? $_POST["paiement_date_expi"] : "";
$code_carte = isset($_POST["paiement_code"]) ? $_POST["paiement_code"] : "";

$temp2 = $date_carte . "-00";

/**Connexion à la bdd */
$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

#Cette fonction retourne les items de la collection demander
# Faire un foreach pour parcourir les items un à un
function items_dans_panier($id_collection, $db_handle)
{
	#Variable tempon
	$recip = "id_item_";

	#On cherche les id des items dans la collection
	$sql = "SELECT * from lacollection where lacollection.id=$id_collection";

	$result = mysqli_query($db_handle, $sql);

	while ($data = mysqli_fetch_assoc($result)) {

		for ($indice = 1; $indice <= 50; $indice++) {
			#On evite les indice NULL
			if ($data[$recip . strval($indice)]) {
				#echo $data[$recip . strval($indice)];
				$lesbonindices[] = $data[$recip . strval($indice)];
			}
		}
	}

	#Pour chaque indice d'item, on retrouve l'item en question
	foreach ($lesbonindices as $var) {

		$autresql = "SELECT * from les_items where les_items.id=$var";
		$autreresult = mysqli_query($db_handle, $autresql);

		while ($autredata = mysqli_fetch_assoc($autreresult)) {
			#On met l'item dans le tableau
			#Comme il y a N item, on utilise un tableau deux dimension
			$lesitems[$var]["id"] = $autredata["id"];
			$lesitems[$var]["id_prop"] = $autredata["id_prop"];
			$lesitems[$var]["nom"] = $autredata["nom"];
			$lesitems[$var]["description"] = $autredata["description"];
			$lesitems[$var]["prix"] = $autredata["prix"];
			$lesitems[$var]["prix_souh"] = $autredata["prix_souh"];
			$lesitems[$var]["video"] = $autredata["video"];
			$lesitems[$var]["categorie"] = $autredata["categorie"];
			$lesitems[$var]["type"] = $autredata["type"];
			$lesitems[$var]["date_debut"] = $autredata["date_debut"];
			$lesitems[$var]["date_fin"] = $autredata["date_fin"];
			$lesitems[$var]["tentative"] = $autredata["tentative"];
			$lesitems[$var]["id_vainqueur"] = $autredata["id_vainqueur"];
		}
	}
	return $lesitems;
}

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

function nom_du_vendeur($id_item, $db_handle)
{
	$sql =
		"SELECT pseudo FROM user
	INNER JOIN les_items
	ON les_items.id='" . $id_item . "'
	WHERE les_items.id_prop = user.id
	";

	$result = mysqli_query($db_handle, $sql);

	while ($data = mysqli_fetch_assoc($result)) {
		return $data["pseudo"];
	}

	return false;
}

function negociation_disponible($id_user, $db_handle)
{
	$sql = "SELECT * from les_items
	WHERE type=3";

	$result = mysqli_query($db_handle, $sql);

	while ($data = mysqli_fetch_assoc($result)) {
		$lesbonid[] = $data["id"];
	}

	foreach ($lesbonid as $unid) {
		for ($indice = 1; $indice <= 50; $indice++)
			$sql_trouver =
				"SELECT * from collection
		WHERE collection.id = " . $id_user . " collection.id_item_" . $indice . "='" . $unid . "'";

		$result = mysqli_query($db_handle, $sql_trouver);

		while ($data = mysqli_fetch_assoc($result)) {
			if ($data) {
				return true;
			}
		}
	}
	return false;
}

if (isset($_POST['modifier_client'])) {
	/*Pour pseudo on la compare avec SESSION càd le cookie car dans ses infos on n'a pas le id*/
	if ($db_found) {

		/**User */
		$sql = " UPDATE user SET nom='$nom', prenom='$prenom', email='$email', /**On met à jour la donnée */
				mdp='$mdp' WHERE pseudo = '$pseudo'  ";
		$result = mysqli_query($db_handle, $sql);

		$sql = " UPDATE user SET pseudo='$pseudo' WHERE pseudo= '$session_pseudo'";
		$result = mysqli_query($db_handle, $sql);

		/**Livraison */

		$sql = "UPDATE  coord_livraison
				INNER JOIN user  ON coord_livraison.id='$id'
				SET adresse1='$adresse1', adresse2='$adresse2', pays='$pays',
				ville='$ville', code_postal='$cp', num_tel='$phone'";
		$result = mysqli_query($db_handle, $sql);


		/**Transaction */

		$sql = "UPDATE  info_bancaire
				INNER JOIN user  ON info_bancaire.id='$id'
				SET num_carte='$num_carte', type='$carte_type', nom_sur_carte='$nom_carte', 
				code='$code_carte'";
		$result = mysqli_query($db_handle, $sql);
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
	} else {
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
						<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>

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

							<p class="h4 mb-4">Vos informations <i class="fa fa-info-circle"></i></p>


							<div class="form-row mb-4">
								<div class="col">

									<input type="text" name="id_client" style="display:none;" value="<?php echo $_SESSION["id_user"] ?>">

									<input type="text" name="prenom_client" id="prenom_client" class="form-control" value="<?php echo $_SESSION["prenom"] ?>">
								</div>
								<div class="col">

									<input type="text" name="nom_client" id="nom_client" class="form-control" value="<?php echo $_SESSION["nom"] ?>">
								</div>
							</div>

							<input type="text" name="pseudo_client" id="pseudo_client" class="form-control mb-3" value="<?php echo $_SESSION["pseudo"] ?>">


							<input type="email" name="email_client" id="email_client" class="form-control mb-3" value="<?php echo $_SESSION["email"] ?>">


							<input type="password" name="mdp_client" id="mdp_client" class="form-control" value="<?php echo $_SESSION["mdp"] ?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">
							<small id="mdp_client" class="form-text text-muted mb-4">
								Au moins 8 caractères et un chiffre

							</small>
							<input type="text" name="ad1_client" id="ad1_client" class="form-control mb-3" value="<?php echo $_SESSION["adresse1"] ?>">
							<input type="text" name="ad2_client" id="ad2_client" class="form-control mb-3" value="<?php echo $_SESSION["adresse2"] ?>">

							<div class="form-row mb-4">
								<div class="col">
									<input type="text" name="pays_client" id="pays_client" class="form-control mb-3" value="<?php echo $_SESSION["pays"] ?>">
								</div>
								<div class="col">
									<input type="text" name="ville_client" id="ville_client" class="form-control mb-3" value="<?php echo $_SESSION["ville"] ?>">
								</div>
							</div>

							<input type="number" name="cp_client" id="cp_client" class="form-control mb-3" value="<?php echo $_SESSION["code_postal"] ?>">


							<input type="text" name="phone_client" id="phone_client" class="form-control" value="<?php echo $_SESSION["num_tel"] ?>" aria-describedby="defaultRegisterFormPhoneHelpBlock">
							<small id="phone_client" class="form-text text-muted mb-3">
								Numéro en France
							</small>

							<p class="h5 mb-4">Vos informations bancaires</p>

							<div class="form-group">
								<label for="type_carte">Type de carte :</label>
								<select class="form-control" name="type_carte" id="type_carte" value="<?php echo $_SESSION["type"] ?>">
									<option value="Visa" <?php if ($type_carte === 'Visa') echo 'selected' ?>>Visa</option>
									<option value="MasterCard" <?php if ($type_carte === 'MasterCard') echo 'selected' ?>>MasterCard</option>
									<option value="American Express" <?php if ($type_carte === 'American Express') echo 'selected' ?>>American express</option>
									<option value="Paypal" <?php if ($type_carte === 'Paypal') echo 'selected' ?>>Paypal</option>
								</select>
							</div>


							<div class="form-row my-2">
								<div class="col">
									<label for="paiement_nom">Nom sur la carte</label>
									<input type="text" name="paiement_nom" id="paiement_nom" class="form-control" value="<?php echo $_SESSION["nom_sur_carte"] ?>">
								</div>
								<div class="col">
									<label for="paiement_num_carte">Numéro carte</label>
									<input type="text" name="paiement_num_carte" id="paiement_num_carte" class="form-control" value="<?php echo $_SESSION["num_carte"] ?>">
								</div>
							</div>

							<div class="form-row my-2 ">
								<div class="col">
									<label for="paiement_date_expi">Date expiration</label>
									<input type="month" name="paiement_date_expi" id="paiement_date_expi" class="form-control" value="<?php $_SESSION["date_expi"] ?>">
								</div>
								<div class="col">
									<label for="paiement_code">CVC</label>
									<input type="number" name="paiement_code" id="paiement_code" class="form-control" value="<?php echo $_SESSION["code"] ?>">
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

						<form method="post" action="payer.php">
							<h5>Indiquez quelle achat vous voulez negocier.</h5>
							<input type="number" placeholder="ID" name="id_item">
							<input type="number" placeholder="nouveau prix" name="nouveau_prix">
							<button class="btn btn-primary" name="payer" type="submit" value="3" style="background: #31405F; border:none;">Terminer</button>
						</form>

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
										<?php
										foreach (items_dans_panier($_SESSION["id_user"], $db_handle) as $item) {
											if ($item["type"] == 3) {
												echo '<tr>';
												echo '<td>' . $item["id"] . '</td>';
												echo '<td><img src=' . chemins_dune_image($item["id"], $db_handle)[0] . ' width="90px" height="90px" /> </td>';
												echo '<td>' . nom_du_vendeur($item["id"], $db_handle) . '</td>';
												echo '<td>En cours</td>';
												echo '<td>';
												switch ($item["categorie"]) {
													case 1:
														echo "Ferraille ou Trésor";
														break;
													case 2:
														echo "Bon pour le Musée";
														break;
													case 3:
														echo "VIP";
														break;
												}
												echo '</td>';
												echo '<td>' . $item["prix"] . '<sup>€</sup></td>';
												if ($item["prix_souh"]) {
													echo '<td>' . $item["prix_souh"] . '<sup>€</sup></td>';
												} else {
													echo '<td>' . $item["prix"] . '<sup>€</sup></td>';
												}
												echo '<td>' . $item["tentative"] . '</td>';
												echo '<td>';
												echo '<a><button class="btn btn-primary">Négocier</button></a>';
												echo '</td>';
												echo '';
												echo '';
												echo '</tr>';
											}
										}
										?>

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
										<?php
										foreach (items_dans_panier($_SESSION["id_user"], $db_handle) as $item) {
											if ($item["type"] == 1) {
												echo '<tr>';
												echo '<td>' . $item["id"] . '</td>';
												echo '<td><img src=' . chemins_dune_image($item["id"], $db_handle)[0] . ' width="90px" height="90px" /> </td>';
												echo '</td>';
												echo '<td>' . nom_du_vendeur($item["id"], $db_handle) . '</td>'; #Mettre vendeur
												echo '<td>En cours</td>';
												echo '<td>';
												switch ($item["categorie"]) {
													case 1:
														echo "Ferraille ou Trésor";
														break;
													case 2:
														echo "Bon pour le Musée";
														break;
													case 3:
														echo "VIP";
														break;
												}
												echo '</td>';
												echo '<td>' . $item["prix"] . '<sup>€</sup></td>';
												if ($item["prix_souh"]) {
													echo '<td>' . $item["prix_souh"] . '<sup>€</sup></td>';
												} else {
													echo '<td>' . $item["prix"] . '<sup>€</sup></td>';
												}
												echo '<td>' . $item["date_fin"] . '</td>';
												echo '<td>';
												echo '<a href="enchere.php"><button class="btn btn-primary">Enchérir</button></a>';
												echo '</td>';
												echo '';
												echo '';
												echo '</tr>';
											}
										}
										?>
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