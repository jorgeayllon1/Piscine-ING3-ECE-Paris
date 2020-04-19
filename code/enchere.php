<?php
session_start();
if (isset($_SESSION["id_user"])) {
}
#Sinon, on le renvoit à la page principale
else {
  header("location: connexion.php");
}


$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

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
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vos enchères</title>

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

    <div class="row d-flex justify-content-center items-align-center">
      <div class="col-lg-12">


        <nav class="navbar navbar-expand-md col-lg-12 ">
          <a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>
          <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="myNavbar">
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
            </ul>
          </div>

        </nav>
      </div>
    </div>
  </div>
  <br>

  <!----------------------------------------->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p class="h4 mb-4">Information sur l'enchère en cours </p>

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
                  <th>Prix proposé</th>
                  <th>Fin enchère dans</th>


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

    <div class="col-lg-8">
      <!-- Check cette div, elle fait le café -->
      <form method="post" action="payer.php">
        <h5>Vous souhaitez enchérir? Veuillez saisir le produit et le montant ci-dessous :</h5>
        <input type="number" placeholder="ID" name="id_item">
        <input type="number" placeholder="XX€" name="prix_souh">
        <button class="btn btn-primary" name="payer" type="submit" value="1" style="background: #31405F; border:none;">Soumettre</button>
      </form>
      <p><em>Vous pourrez retrouver toutes vos enchères en cours dans votre compte dans le menu Enchères en cours.</em></p>

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