<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Paiement</title>

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
                            <li class="nav-item"><a class="nav-link" href="accueil.php">Se déconnecter</a></li>
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

			  
			   
			   

			   
			</div>
        </div>
        
        <!-- Main Livraison + Paiement-->
        <div class="container">
            <div class="row col-lg-12" >

                <div class="col-lg-7 my-3" style="border:solid black 1px">

                    <h4 class="horizontal-text-center  my-2" style="text-align: center ;"><span id="selection">Livraison</span></h4><br>
                    

                    <div class="form-row ">
                        <div class="col">
                            
                            <input type="text" id="prenom_paiement" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="col">
                            
                            <input type="text" id="nom_paiement" class="form-control" placeholder="nom">
                        </div>
                    </div>

                    <label for="adresse_paiement" class="">Adresse</label>
                    <input type="text" id="adresse_paiement" class="form-control " placeholder="5 rue...">

                    <label for="adresse2_paiement" class="">Complément d'adresse</label>
                    <input type="text" id="adresse2_paiement" class="form-control mb-4 " placeholder="Numéro étage, porte...">
                    <div class="form-row mb-4">
                        <div class="col">
                            <input type="text" id="pays_paiement" class="form-control " placeholder="Pays">
                        </div>
                        <div class="col">
                            <input type="text" id="ville_paiement" class="form-control" placeholder="Ville">
                        </div>
                    </div>
                    <input type="number" id="cp_client-inscription" class="form-control mb-3" placeholder="Code Postal">

                    <h4 class="horizontal-text-center" style="text-align: center ;"><span id="selection">Paiement</span></h4><br>

                    <p>Votre type de paiement <i class="fa fa-credit-card"></i> :</p>

                    
                    <input type="radio" name="type-carte" value="visa" id="visa">
                    <label for="visa">Visa</label>

                    <input type="radio" name="type-carte" value="master" id="master">
                    <label for="master">MatserCard</label><br>


                    
                    <input type="radio" name="type-carte" value="express" id="express">
                    <label for="express" class="">American Express</label>

                    <input type="radio" name="type-carte" value="paypal" id="paypal">
                    <label for="paypal">Paypal</label>

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

                    <input type="checkbox" name="souvenir_cb" id="souvenir_cb">Sauvegarder mes coordonnées pour la prochaine fois

                    <div class="row">
                        <button class="btn btn-primary my-2 " style="margin: 0 auto; font-size: larger;">Finalisez mon paiment</button>

                    </div>

                        

                </div>

                <div class="col-lg-1">

                </div>
                
                <!--Affichage miniaturisée sur le côté avec prix total avec option de continuer à faire shopping-->
                <div class="col-lg-3 my-3 info-paiement" >
                                   

                    <div class="card mt-2" style="border:solid black 1px" >

                    <div class="card-body text-center">
                        <h4 class="mb-3  text-center font-weight-bold">Récapitulatif</h4>
                        <hr style="border-top: dotted 1px;" />
                        <dl class="row">
                        <dd class="col-sm-8">
                            Sous-total
                        </dd>
                        <dd class="col-sm-4">
                            168<sup>€</sup>
                        </dd>
                        </dl>

                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                        <dd class="col-sm-8">
                            Livraison
                        </dd>
                        <dd class="col-sm-4">
                            0€
                        </dd>
                        </dl>

                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                        <dd class="col-sm-8 font-weight-bold">
                            Total
                        </dd>
                        <dd class="col-sm-4">
                            168<sup>€</sup>
                        </dd>
                        </dl>
                        
                    </div>

                    </div>
                    <div class="row">
                        <button class="btn btn-primary my-2 " style="margin: 0 auto; font-size: larger;">Finalisez mon paiment</button>

                    </div>

                </div>
            </div>
        </div>

		

		

		<div class="container">

			<div class="row-width-max">

				<footer class="page-footer font-small blue-grey lighten-5">

                    <div style="background-color: #31405F;">
                      <div class="container">								
                        <div class="row py-4 d-flex align-items-center">
                          
                          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 >Restons en contact !</h6>
                          </div>
                                                           
                          <div class="col-md-6 col-lg-7 text-center text-md-right">									
                            <a class="fb-ic" style="color: #fff;">
                              <i class="fa fa-facebook-f  ml-4"> </i>
                            </a>
                            
                            <a class="tw-ic" style="color: #fff;">
                              <i class="fa fa-twitter  ml-4"> </i>
                            </a>
                            
                            <a class="ins-ic" style="color: #fff;">
                              <i class="fa fa-instagram  ml-4"> </i>
                            </a>
                          </div>
                        </div>								
                      </div>
                    </div>

                    
                    <div class="container text-center text-md-right mt-4">							  
                      <div class="row mt-3 dark-grey-text">
                        
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-3">							 
                          <img src="images/logo-footer.png" alt="logo ece ebay" width="50%">								  
                          <p>Enchérissez !</p>
                        </div>
                       
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-3" style="color: #000;">								  
                          <h5 class="font-weight-bold">Acheter</h5>
                          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                          <p>
                            <a  href="#!">Ferraille ou trésor</a>
                          </p>
                          <p>
                            <a  href="#!">Bon pour musée</a>
                          </p>
                          <p>
                            <a  href="#!">Accessoire VIP</a>
                          </p>								  
                        </div>
                        
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-3">							 
                          <h5 class="font-weight-bold">Vendre</h5>
                          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                          <p>
                            <a  href="#!">S'inscrire</a>
                          </p>
                          <p>
                            <a  href="#!">Comment vendre ?</a>
                          </p>
                          <p>
                            <a  href="#!">Vos ventes</a>
                          </p>								  
                        </div>
                        
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-3">								 
                          <h5 class="font-weight-bold">Contact</h5>
                          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                          <p>
                            <i class="fa fa-graduation-cap "></i> EBAY ECE</p>
                          <p>
                            <i class="fa fa-envelope mr-3"></i> ebay-ece@mail.fr</p>
                          <p>
                            <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>								  
                        </div>							    
                      </div>						  
                    </div>
                                                 
                    <div class="footer-copyright text-center text-black-50 py-3">© 2020 Copyright: All rights reserved
                      <a class="dark-grey-text" href="accueil.php"> www.ebay-ece.fr</a>
                    </div>
                    
                </footer>

			</div>

        </div>
        
        

	</body>
</html>