<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon panier</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="style_piscine.css">
	    
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
			        <a class="navbar-brand" href="accueil.html"><img src="images/logo.png" width="20%"></a>
			        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="main-navigation">
			            <ul class="navbar-nav">
			                <li class="nav-item"><a class="nav-link" href="compte_client.html">WANG David</a></li>
                            <li class="nav-item"><a class="nav-link" href="accueil.html">Se déconnecter</a></li>
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
        
        <!-- Main Panier-->
        <div class="container">
            <div class="row">
                <!--Affichage produit, quantite, prix total-->
                <div class="col-lg-9 my-3" style="border: solid black 1px">

                    <div class="table-responsive">
                        <div class="caption text-center font-weight-bold" style="font-size: larger;">Votre panier<i class="fa fa-shopping-basket ml-2"></i></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Qté</th>
                                    <th scope="col">Moyen achat</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Fin enchère dans</th> <!--If fin enchère != 0min alors paiement bloqué-->
                                    <th scope="col">Négociation</th> <!--If négociation!=finie alors paiement bloqué-->
                                    <th scope="col">Prix</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td><img src="images/item/item1.jpg" width="90px" height="90px"/> </td>
                                    <td>Lampe</td>
                                    <td>(1)</td>
                                    <td>Achat immédiat</td>
                                    <td>Ferraille</td>
                                    <td>0min0s</td>
                                    <td></td>
                                    <td class="prix-article-1">56€</td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
                                <tr class="text-center">
                                    <td><img src="images/item/item2.jpg" width="90px" height="90px"/> </td>
                                    <td>Lampe</td>
                                    <td>(1)</td>
                                    <td>Enchère</td>
                                    <td>Ferraille</td>
                                    <td>0min30s</td>
                                    <td></td>
                                    <td prix-article-2>56€</td>
                                    <!--Si on clique sur la poubelle, on remove l'article du panier-->
                                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
                                <tr class="text-center">
                                    <td><img src="images/item/item3.jpg" width="90px" height="90px"/> </td>
                                    <td>Lampe</td>
                                    <td>(1)</td>
                                    <td>Meilleure offre</td>
                                    <td>Ferraille</td>
                                    <td>0min0s</td>
                                    <td>En cours</td>
                                    <td prix-article-3>56€</td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sous-Total</td>
                                    <td class="text-right">168 €</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><em>Livraison</em></td>
                                    <td class="text-right">Gartuite</td>
                                </tr>
                                <tr style="background-color: lightgrey; font-size:larger;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right "><strong>168 €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!--Affichage miniaturisée sur le côté avec prix total avec option de continuer à faire shopping-->
                <div class="col-lg-3 my-3" >

                    <div class="card" style="border:solid black 1px" >

                        <div class="card-body text-center">
                            <p><em>Vous avez un code promo?</em></p>
                            <input type="text" placeholder="CODE" class="text-center">
                            <button class="btn mt-2">Appliquer</button>
                        </div>
    
                     </div>

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
                        <a href="paiement.html"><button class="btn btn-primary my-2">Paiement</button></a>                     
                        <a href="achat.html"><button class="btn" style="background-color: darkgrey;">Continuer vos achats</button></a>
                    </div>

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
                      <a class="dark-grey-text" href="accueil.html"> www.ebay-ece.fr</a>
                    </div>
                    
                </footer>

			</div>

        </div>
        
        

	</body>
</html>