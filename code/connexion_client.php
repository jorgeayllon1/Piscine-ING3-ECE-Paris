<?php

#Code de demarage de session, a mettre en première ligne de chaque page
# C'est OBLIGATOIRE, sinon cookie marche pas
session_start();
setcookie('id_user','' , time() + 365 * 24 * 3600);
setcookie('rang', '', time() + 365 * 24 * 3600);

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if (isset($_POST['submit'])) {
    if ($_POST['submit']) {
        $mdp = $_POST["mdp"];
        $mail = $_POST["mail"];
        if ($db_found) {
            $sql = "SELECT * FROM `user` WHERE rang LIKE '1' AND email LIKE '$mail' AND mdp LIKE '$mdp'";
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
                //echo "Erreur, veuillez vérifier vos informations de connexion.";
            } else {
                echo "trouvé";
                while ($data = mysqli_fetch_assoc($result)) {
                    $c_ID = $data['id'];
                    $c_rang = $data['rang'];
                    #$fp = fopen('cookie.php', 'w');

                    #Cette ligne va ecrire dans le cookies la valeur qu'on veut
                    $_SESSION["id_user"] = $data['id'];
                    $_SESSION["rang"] = $data['rang'];
                    $_SESSION["nom"]=$data['nom'];
                    $_SESSION["prenom"]=$data['prenom'];

                    /*
                    fwrite($fp, "<?php 
                            define('C_ID', '$c_ID');
                            define('C_RANG', '$c_rang'); 
                        ?>");
                    fclose($fp);
                    */
                    header("location: accueil.php");
                }
            }
        }
    }
}

mysqli_close($db_handle);
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion client</title>

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


                <nav class="navbar d-flex justify-content-center items-align-center ">
                    <a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>

                </nav>
            </div>
        </div>
    </div>
    <br>

    <!----------------------------------------->



    <div class="container">

        <div class="back-vendeur">
            <div class="row">



                <div class="col-md-5 ">

                    <form class="text-center border border-light p-2 form-vendeur" method="post" action="connexion_client.php" style="background-color: #fff; ">
                        <!--PHP-->

                        <p class="h4 mb-4">Se connecter</p>






                        <input type="email" id="email_client_connexion" name="mail" class="form-control mb-3" placeholder="E-mail">

                        <!-- Password -->
                        <input type="password" id="mdp_client_connexion" name="mdp" class="form-control" placeholder="Mot De Passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                        <small id="mdp_client_connexion" class="form-text text-muted mb-4">
                            Au moins 8 caractères et un chiffre

                        </small>

                        <!-- Sign up button -->

                        <input name="submit" class="btn my-3 " style="background: #31405F; border:none; color:#fff;" type="submit" value="Se connecter">

                        <!-- Social register -->
                        <p>ou avec:</p>

                        <a href="#" class="mx-2" role="button"><i class="fa fa-facebook-f light-blue-text"></i></a>
                        <a href="#" class="mx-2" role="button"><i class="fa fa-linkedin-in light-blue-text"></i></a>
                        <a href="#" class="mx-2" role="button"><i class="fa fa-github light-blue-text"></i></a>

                        <hr>

                        <p>Pas encore inscrit ? Inscrivez-vous</p>
                        <a href="inscription_client.php">S'inscrire</a>



                    </form>



                </div>

                <div class="col-md-5">
                    <div class="jumbotron jumbo-vendeur">
                        <h2 class="display-6 join ">Rejoignez-nous !</h2>
                        <p class="lead">Deja des milliers de vendeurs sur notre plateforme.</p>
                        <hr class="my">
                        <p>Décrivez, choisissez le moyen d'achat et vendez !</p>
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