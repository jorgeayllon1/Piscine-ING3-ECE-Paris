<?php
session_start();
if (isset($_SESSION["id_user"])) {
    if ($_SESSION["rang"] != 1) {
		header("location: connexion_client.php");
	}
} else {
    header("location: connexion_client.php");
}

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

# Retourne un tableau 2 dimension avec les items qui appartienne à la collection
# On met aussi le id de l'utilisateur pour gagner un peu de temps dans le code

# Cherche pas a comprendre le code, j'ai déjà oublié
# pour utiliser le tableau, il faut faire un foreach et la variable de parcours sera l'item
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

function collection_vide($id_user, $db_handle)
{
    $sql =
        "SELECT * from lacollection
    where lacollection.id=$id_user";

    $result = mysqli_query($db_handle, $sql);

    $recip = "id_item_";

    while ($data = mysqli_fetch_assoc($result)) {

        for ($indice = 1; $indice <= 50; $indice++)
            if ($data[$recip . $indice]) {
                return true;
            }
    }

    return false;
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
    <title>Mon panier</title>

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

<body style="background-color:#FBFBFB  ;">

    <div style="font-family: Arial, Helvetica, sans-serif;">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <nav class="navbar navbar-expand-md col-lg-12" style="border-bottom:solid #E7E7E7">
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

                <div class="col-lg-8 my-1 d-flex justify-content-center">
                    <img src="images/logo-footer.png" width="80%">
                </div>






            </div>
        </div>

        <!-- Main Panier-->
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!--Affichage produit, quantite, prix total-->
                <div class="col-lg-7 my-3 shadow p-3 mb-5" style="border: solid black 1px">

                    <div class="table-responsive ">
                        <div class="caption text-center font-weight-bold my-2" style="font-size: 30px;">Votre panier<i class="fa fa-shopping-basket ml-2"></i></div>
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Produit</th>
                                    <th scope ="id">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Qté</th>
                                    <th scope="col">Moyen achat</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Fin enchère dans</th>
                                    <!--If fin enchère != 0min alors paiement bloqué-->
                                    <th scope="col">Négociation</th>
                                    <!--If négociation!=finie alors paiement bloqué-->
                                    <th scope="col">Prix</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (collection_vide($_SESSION["id_user"], $db_handle)) {

                                    $lesitems = items_dans_panier($_SESSION["id_user"], $db_handle);

                                    foreach ($lesitems as $unitem) {

                                        echo '<tr class="text-center">';
                                        echo '<td><img src=' . chemins_dune_image($unitem["id"], $db_handle)[0] . ' width="90px" height="90px" /> </td>';
                                        echo'<td>'.$unitem["id"].'</td>';
                                        echo '<td>' . $unitem["nom"] . '</td>';
                                        echo '<td>(1)</td>';

                                        switch ($unitem["type"]) {
                                            case 1:
                                                echo '<td>Enchères</td>';
                                                break;
                                            case 2:
                                                echo '<td>Achetez-le Maintenant</td>';
                                                break;
                                            case 3:
                                                echo '<td>Meilleure Offre</td>';
                                                break;
                                        }

                                        switch ($unitem["categorie"]) {
                                            case 1:
                                                echo '<td>Ferraille ou trésor</td>';
                                                break;
                                            case 2:
                                                echo '<td>Bon pour le Musée</td>';
                                                break;
                                            case 3:
                                                echo '<td>Accessoire VIP</td>';
                                                break;
                                        }

                                        echo '<td>' . $unitem["date_fin"] . '</td>';
                                        echo '<td>' . $unitem["prix_souh"] . '</td>';
                                        echo '<td class="prix-article-1">' . $unitem["prix"] . '€</td>';
                                        echo '<td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                                
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td id="total_item_panier"><?php echo taille_panier($_SESSION["id_user"], $db_handle)-1 ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sous-Total</td>
                                    <td class="text-right"><?php echo somme_tot_achat_immediat($_SESSION["id_user"], $db_handle) ?></td>
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
                                    <td class="text-right light-grey-text">Gratuite</td>
                                </tr>
                                <tr style="background-color: #D0D0D0; font-size:larger;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right "><strong><?php echo somme_tot_achat_immediat($_SESSION["id_user"], $db_handle) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!--Affichage miniaturisée sur le côté avec prix total avec option de continuer à faire shopping-->
                <div class="col-lg-3 my-3 ">

                    <div class="card  shadow p-3 mb-5" style="border:solid black 1px">

                        <div class="card-body text-center">
                            <h4 class="mb-3  text-center font-weight-bold">Récapitulatif</h4>
                            <hr style="border-top: dotted 1px;" />
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
                                    0€
                                </dd>
                            </dl>

                            <hr style="border-top: dotted 1px;" />

                            <dl class="row">
                                <dd class="col-sm-8 font-weight-bold">
                                    Total €
                                </dd>
                                <dd class="col-sm-4">
                                <?php echo somme_tot_achat_immediat($_SESSION["id_user"], $db_handle) ?><sup>€</sup>
                                </dd>
                            </dl>
                            <a href="paiement.php"><button class="btn btn-primary my-2">Paiement</button></a>
                            <a href="achat.php"><button class="btn" style="background-color: darkgrey;">Continuer vos achats</button></a>
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