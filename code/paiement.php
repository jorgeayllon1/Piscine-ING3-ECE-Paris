<?php
    session_start();
    if (isset($_SESSION["id_user"])) {
    }
    else {
        header("location: connexion.php");
    }


$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

function taille_panier($id_user, $db_handle)
{
    $sql =
        "SELECT * from lacollection
    WHERE id = '" . $id_user . "'";

    $result = mysqli_query($db_handle, $sql);

    $compter = -1;

    while ($data = mysqli_fetch_assoc($result)) {
        foreach ($data as $elements) {
            if ($elements)
                $compter++;
        }
    }

    if ($compter == 0) {
        return false;
    } else {
        return $compter;
    }
}

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
        }
    }
    return $lesitems;
}

function somme_tot_achat_immediat($id_user, $db_handle)
{
    $somme_tot = 0;

    foreach (items_dans_panier($id_user, $db_handle) as $elements) {
        if ($elements["type"] == 2) {
            $somme_tot += $elements["prix"];
        }
    }

    return $somme_tot;
}

?>
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
                        <!-- La suite de ce code php va soit afficher des boutons de connexion si l'utilisateur n'est pas connecter-->
                                <!-- Soit afficher son nom et prenom avec une redirection vers son compte -->
                                <?php
                                if (!isset($_SESSION["id_user"])) {
                                    echo '<li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fa fa-user-plus"></i> S\'inscrire</a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fa fa-sign-in"></i> Se connecter</a></li>';
                                } else {
                                    echo '<li class="nav-item"><a class="nav-link" href="redirect_moncompte.php">' . $_SESSION["nom"] . ' ' . $_SESSION["prenom"] . '</a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>';
                                }
                                ?>

                        <li><i class="fa fa-power-off mt-3" style="color: #fff;"></i></li>

                    </ul>
                </div>
            </nav>


        </div>
    </div>

    <!-- Main Livraison + Paiement-->
    <div class="container">
        <div class="row col-lg-12">

            <div class="col-lg-7 my-3 shadow p-3 mb-5" style="border:solid black 1px">

                <h4 class="horizontal-text-center  my-2" style="text-align: center ; "><span id="selection" style="border-radius:5px; ">Livraison <i class="fa fa-truck" style="font-size:20px;"></i></span></h4><br>

                <div class="form-row ">
                    <div class="col">

                        <input type="text" name="prenom_paiement" id="prenom_paiement" class="form-control" placeholder="Prénom">
                    </div>
                    <div class="col">

                        <input type="text" name="nom_paiement" id="nom_paiement" class="form-control" placeholder="nom">
                    </div>
                </div>

                <label for="adresse_paiement" class="">Adresse</label>
                <input type="text" name="adresse_paiement" id="adresse_paiement" class="form-control " placeholder="5 rue...">

                <label for="adresse2_paiement" class="">Complément d'adresse</label>
                <input type="text" name="adresse2_paiement" id="adresse2_paiement" class="form-control mb-4 " placeholder="Numéro étage, porte...">
                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" name="pays_paiement" id="pays_paiement" class="form-control " placeholder="Pays">
                    </div>
                    <div class="col">
                        <input type="text" name="ville_paiement" id="ville_paiement" class="form-control" placeholder="Ville">
                    </div>
                </div>
                <input type="number" name="cp_client-inscription" id="cp_client-inscription" class="form-control mb-3" placeholder="Code Postal">

                <h4 class="horizontal-text-center" style="text-align: center ;"><span id="selection" style="border-radius:5px;">Paiement <i class="fa fa-credit-card" style="font-size:20px;"></i></span></h4><br>

                <p>Votre type de paiement <i class="fa fa-credit-card"></i> :</p>

                <div class="custom-control custom-radio">
                    <input type="radio" id="visa" name="type_carte" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="visa">Visa</label>
                    <i class="fa fa-cc-visa"></i>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="master" name="type_carte" class="custom-control-input" required>
                    <label class="custom-control-label" for="master">MasterCard</label>
                    <i class="fa fa-cc-mastercard"></i>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="express" name="type_carte" class="custom-control-input" required>
                    <label class="custom-control-label" for="express">American express</label>
                    <i class="fa fa-cc-amex"></i>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="paypal" name="type_carte" class="custom-control-input" required>
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

                <input type="checkbox" name="souvenir_cb" id="souvenir_cb"> Sauvegarder mes coordonnées pour la prochaine fois

                <div class="row">
                    <button class="btn btn-primary my-2 " name="payer" type="submit" style="margin: 0 auto; font-size: larger;">Finalisez mon paiment</button>
                    <!--CREATION PUIS VERIFICATION DES DONNEES DANS LA BDD PUIS AFFICHAGE MESSAGE PAIEMENT REUSSI-->
                </div>

            </div>

            <div class="col-lg-1 ">

            </div>

            <!--Affichage miniaturisée sur le côté avec prix total avec option de continuer à faire shopping-->
            <div class="col-lg-3 my-3  info-paiement ">

                <div class="card shadow p-3 mb-5" style="border:solid black 1px">

                    <div class="card-body text-center">
                        <p><em>Vous avez un code promo?</em></p>

                        <div class="input-group">
                            <input type="text" id="champ_code" class="form-control" placeholder="Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary m-0" id="code_promo" type="button">Appliquer</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card mt-2 shadow p-3 mb-5" style="border:solid black 1px">

                    <div class="card-body text-center">
                        <h4 class="mb-3  text-center font-weight-bold">Récapitulatif</h4>
                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                            <dd class="col-sm-8">
                                <!--<p>Panier (<span id="nb_item">2</span>)</p>-->
                                <p>Panier (<?php echo taille_panier($_SESSION["id_user"], $db_handle) ?>)</p>
                            </dd>
                        </dl>
                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                            <dd class="col-sm-8">

                                <?php if (taille_panier($_SESSION["id_user"], $db_handle)) {

                                    foreach (items_dans_panier($_SESSION["id_user"], $db_handle) as $elements) {
                                        if ($elements["type"] == 2)
                                            echo '<p class="nom_item">' . $elements["nom"] . '<span class="prix_item"> ' . $elements["prix"] . '<sup>€</sup></span></p>';
                                    }
                                } ?>

                            </dd>
                        </dl>

                        <dl class="row">
                            <dd class="col-sm-8">
                                Sous-total
                            </dd>

                            <dd class="col-sm-4">
                                <?php echo somme_tot_achat_immediat($_SESSION["id_user"], $db_handle) ?><sup>€</sup>
                            </dd>

                        </dl>

                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                            <dd class="col-sm-8">
                                <em>Livraison</em>
                            </dd>
                            <dd class="col-sm-4">
                                <em>0€</em>
                            </dd>
                        </dl>

                        <hr style="border-top: dotted 1px;" />

                        <dl class="row">
                            <dd class="col-sm-8 font-weight-bold">

                                Total
                                <i class="fa fa-euro"></i>
                            </dd>
                            <dd class="col-sm-4">
                                <?php echo somme_tot_achat_immediat($_SESSION["id_user"], $db_handle) ?><sup>€</sup>
                            </dd>
                        </dl>

                    </div>

                </div>
                <div class="row">
                    <button class="btn btn-primary my-2 " style="margin: 0 auto; font-size: larger;">Finalisez mon paiment</button>

                </div>
                <div class="row">
                    <img src="images/logo-footer.png" width="80%" class="ml-4 mt-4">
                </div>

            </div>
        </div>
    </div>

    <!--FOOTER-->
    <div class="container">

        <div class="row-width-max">

            <?php include('footer_client.php'); ?>

        </div>

    </div>

    <!--JAVASCRIPT-->

    <script>
        $(document).ready(function() {

            $('#code_promo').click(function() {
                if ($('#champ_code').val() == '') {
                    alert("champ vide");
                } else {
                    alert("code faux");
                    $('#champ_code').val(''); /* Le champ redevient vide*/

                }

            });
        });
    </script>



</body>

</html>