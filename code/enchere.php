<?php
session_start();
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
              <li class="nav-item"><a class="nav-link" href="compte_client.php">Mon compte</a></li>

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
                  <th>Prix actuel</th>
                  <th>Fin enchère dans</th>


                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- mettre les classes pour PHP comme pr vendeur-->
                  <td>1</td>
                  <td>
                    <input type="file">image
                  </td>
                  <td>Theo</td>
                  <td>En cours</td>
                  <td>VIP</td>
                  <td>390<sup>€</sup></td>
                  <td>560<sup>€</sup></td>
                  <td>
                    <input type="text" value="0:12min:33s">

                  </td>



                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

    <div class="col-lg-8">
      <h5>Vous souhaitez enchérir? Veuillez saisir le montant ci-dessous :</h5>
      <input type="number" placeholder="XX€">
      <button class="btn btn-primary" style="background: #31405F; border:none;">Soumettre</button>
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