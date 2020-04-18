<?php
session_start();
?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mes négociations - Vendeur</title>

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

    <body style="font-family: Arial, Helvetica, sans-serif;">

        <div class="container-fluid">

            <div class="row d-flex justify-content-center items-align-center">
                <div class="col-lg-12">


                    <nav class="navbar navbar-expand-md col-lg-12 nav-vendeur " style="border-bottom:solid #E7E7E7 ;">
                        <a class="navbar-brand" href="accueil.php"><img src="images/logo-vendeur.png" width="30%"></a>
                        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="compte_client.php">Mon compte</a></li>

                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
        <br>

        <!----------------------------------------->
        <!-- Infos sur la négociation-->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <p class="h4 mb-4 mx-3" style="font-size:30px;"><u>Informations sur la négociation : </u></p>
                    </div>
                    <p>Mail vendeur: 677gdr6@mail.fr</p>
                    <p>Mail client: david@mail.fr</p>

                    <div class="table  shadow ">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produit</th>
                                        <th>Client</th>
                                        <th>Statut</th>
                                        <th>Description</th>
                                        <th>Catégorie</th>
                                        <th>Première offre</th>
                                        <th>Offre actuelle</th>
                                        <th>Nombre offre(s) restant au client</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- mettre les classes pour PHP comme pr vendeur-->
                                        <td>1</td>
                                        <td><input type="file"></td>
                                        <td>David</td>
                                        <td>En cours</td>
                                        <td>Bon etat</td>
                                        <td>Ferraille</td>
                                        <td>390<sup>€</sup></td>
                                        <td>560<sup>€</sup></td>
                                        <td>3</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <div class="col-lg-8">
                    <h4>Vous souhaitez accepter l'offre ? Il reste encore <span id="nb_offre_client">3 </span>offres(s) au client </h4>
                    <button class="btn btn-primary btn-lg " style="background: #E52714; border:none;" onClick="accepter_offre();">Accepter l'offre</button>
                    <p style="color:red; font-size:15px;">Attention, une fois que vous accepter cette offre, 
                    vous ne pourrez plus retourner en arrière et les autres acheteurs négociant pour cette offre se verront automatiquement informés de
                    l'indisponibilité du produit.</p>
                    

                    <h4 class="mt-4">Vous souhaitez effectuer une contre-offre? Il reste encore <span id="nb_offre_client">3 </span>offres(s) au client </h4>
                    <input type="number" name="contre_offre">
                    <button class="btn btn-primary ml-2" style="background: #E52714; border:none;" >Proposer nouvelle contre offre</button>
                    <p style="color:red; font-size:15px;">Attention, le montant de votre contre-offre doit être supérieur au montant proposé actuel.</p>
                    <p style="color:#AAAAAA;"><em>Vous pourrez retrouver toutes vos négociations en cours dans votre compte dans le menu Mes négociations.</em></p>
                </div>
            </div>
        </div>

        <!--Demande pour confirmation, possibilité de le faire avec PHP-->

        <script>
            function accepter_offre()
            {
                if(confirm("Voulez-vous vraiment accepter cette offre ?"))
                {


                }
            }
        </script>

        <div class="container">
            <div class="row-width-max">
                <?php include('footer_vendeur.php'); ?>
            </div>
        </div>

    </body>

</html>