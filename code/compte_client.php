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
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>  <!--include popper.js-->
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
			                <li class="nav-item"><a class="nav-link" href="compte_client.php">WANG David</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="accueil.php">Se déconnecter</a></li>-->
                            <form name ="form" method ="POST" action = "compte_vendeur.php">
                            	<input type = "submit" name = "deco" value = "Déconnexion">
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

		

		<div class="container mt-5">

			<div class="row d-flex justify-content-center">

                <div class="col-lg-2 " >
					<aside class="col-12 col-md-2 p-0  " >
													
							<ul class="nav" >
								<li class="nav-item ">
									<a class="nav-link active" style="background-color: #31405F;"  data-toggle="tab"
									 href="#info-client" role="tab"  aria-selected="true">Mes informations</a>
								</li>
								<li class="nav-item">
									<a class="nav-link w-100" style="background-color: #31405F;"  data-toggle="tab" 
									href="#historique-client" role="tab" aria-selected="false">Historique d'achats</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" style="background-color: #31405F;"  data-toggle="tab" 
									href="#nego-client" role="tab" aria-selected="false">Mes négociations</a>
								</li>

								<li class="nav-item">
									<a class="nav-link w-100" style="background-color: #31405F;"  data-toggle="tab" 
									href="#enchere-client" role="tab" aria-selected="false">Enchères en cours</a>
								</li>
							</ul>
						
					</aside>
					
				</div>


				<div class="col-lg-10 d-flex justify-content-center">
					<div class="tab-content">
						

						<div class="tab-pane fade show active " id="info-client" >
							<form class="text-center border border-light " action="#!"> <!--PHP-->

								<p class="h4 mb-4">Vos informations</p>
											 
					
								<div class="form-row mb-4">
									<div class="col">
										
										<input type="text" id="prenom_client" class="form-control" placeholder="David">
									</div>
									<div class="col">
										
										<input type="text" id="nom_client" class="form-control" placeholder="Wang">
									</div>
								</div>
					
								
								<input type="email" id="email_client" class="form-control mb-3" placeholder="E-mail">
					
								
								<input type="password" id="mdp_client" class="form-control" placeholder="**********" aria-describedby="defaultRegisterFormPasswordHelpBlock">
								<small id="mdp_client" class="form-text text-muted mb-4">
									Au moins 8 caractères et un chiffre
					
								</small>
								<input type="text" id="ad1_client" class="form-control mb-3" placeholder="Adresse">
								<input type="text" id="ad2_client" class="form-control mb-3" placeholder="Complément adresse">
					
								<div class="form-row mb-4">
									<div class="col">
										<input type="text" id="pays_client" class="form-control mb-3" placeholder="Pays">
									</div>
									<div class="col">
										<input type="text" id="ville_client" class="form-control mb-3" placeholder="Ville">
									</div>
								</div>
					
								<input type="number" id="cp_client" class="form-control mb-3" placeholder="Code Postal">
					
					
								<input type="text" id="pays_client" class="form-control mb-3" placeholder="Pays">
					
					
					
								
								<input type="text" id="phone_client" class="form-control" placeholder="Téléphone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
								<small id="phone_client" class="form-text text-muted mb-3">
									Numéro en France
								</small>

								<p class="h5 mb-4">Vos informations bancaires</p>
								<div class="form-row my-2">
									<div class="col"> 
										<label for="paiement_nom">Nom sur la carte</label>                        
										<input type="text" id="paiement_nom" class="form-control" >
									</div>
									<div class="col">    
										<label for="paiement_num_carte">Numéro carte</label>                       
										<input type="text" id="paiement_num_carte" class="form-control">
									</div>
								</div>
			
								<div class="form-row my-2 ">
									<div class="col"> 
										<label for="paiement_date_expi">Date expiration</label>                        
										<input type="month" id="paiement_date_expi" class="form-control" >
									</div>
									<div class="col">    
										<label for="paiement_code">CVC</label>                       
										<input type="number" id="paiement_code" class="form-control">
									</div>
								</div>
					
								
								<button class="btn my-4 " style="background: #31405F; border:none; color:#fff;" type="submit">Modifier</button>
		
							</form>
									
						</div>

						<div class="tab-pane fade" id="historique-client" >
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
										<tr>  <!-- mettre les classes pour PHP comme pr vendeur-->
										  <td>1</td>
										  <td>photo</td>
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
										  <th>Prix actuel</th>
										  <th>Nombre offre restant</th>
										  <th>Nouvelle offre</th>
										  
										</tr>
									  </thead>
									  <tbody>
										<tr>  <!-- mettre les classes pour PHP comme pr vendeur-->
										  <td>1</td>
										  <td>photo</td>
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
										<tr>
										  <th>#</th>
										  <th>Produit</th>
										  <th>Vendeur</th>
										  <th>Statut</th>
										  <th>Catégorie</th>
										  <th>Prix initial</th>
										  <th>Prix actuel</th>
										  <th>Fin enchère dans</th>
										  <th>Nouvelle offre</th>
										  
										</tr>
									  </thead>
									  <tbody>
										<tr>  <!-- mettre les classes pour PHP comme pr vendeur-->
										  <td>1</td>
										  <td>photo</td>
										  <td>Theo</td>
										  <td>En cours</td>
										  <td>VIP</td>
										  <td>390<sup>€</sup></td>
										  <td>560<sup>€</sup></td>
										  <td>
											  <input type="text" value="0:12min:33s">
											  
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