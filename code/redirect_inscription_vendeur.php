<?php

session_start();

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

#Retourne l'id disponible dans la table user (il vaut l'id max + 1)
function trouver_id_dispo($db_handle)
{
    $sql =
        "SELECT max(id) from user";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $lemax = $data["max(id)"];
    }
    $lemax++;
    return $lemax;
}

#Ajoute la photo dans la table
function ajouter_photo($chemin, $db_handle, $id_item = NULL, $id_prop = NULL)
{
    $sql =
        "INSERT INTO photo
    VALUES(NULL,'" . $id_item . "','" . $id_prop . "','" . $chemin . "')";

    mysqli_query($db_handle, $sql);
}

function ajouter_vendeur($id_user, $email, $mdp, $pseudo, $nom, $prenom, $photo_perso, $photo_back, $db_handle)
{
    $sql =
        "INSERT INTO user
    VALUES('" . $id_user . "',NULL,
    NULL,'" . $id_user . "','" . $email . "','" . $mdp . "','" . $pseudo . "',2
    ,'" . $nom . "','" . $prenom . "','" . $photo_perso . "','" . $photo_back . "')";

    mysqli_query($db_handle, $sql);
}

#ajoute une ligne dans collection (mettre l'id_user et pas l'id_collection)
function ajouter_collection($id_user, $db_handle)
{
    $sql =
        "INSERT INTO lacollection
    VALUES ('" . $id_user . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

    mysqli_query($db_handle, $sql);
}


if (isset($_POST["submit_vendeur_inscription"])) {

    $mail = $_POST["email_vendeur_inscription"];

    /*if ($mail = "") {
        header("location: inscription_client");
    }*/

    echo $mail;

    if ($db_found) {
        $sql = "SELECT * FROM `user` WHERE email LIKE '$mail'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {
            #echo "Coder ici";

            $info_client["prenom"] = $_POST["prenom_vendeur_inscription"];
            $info_client["nom"] = $_POST["nom_vendeur_inscription"];
            $info_client["pseudo"] = $_POST["pseudo_vendeur_inscription"];
            $info_client["email"] = $mail;
            $info_client["rang"] = 2;
            $info_client["mdp"] = $_POST["mdp_vendeur_inscription"];
            $info_client["image"] = $_POST["file_pdp"];
            $info_client["image_back"] = $_POST["file_back"];

            foreach ($info_client as $elements) {
                if ($elements == "") {
                    echo "error";
                    #header("location: inscription_client.php");
                } else {
                    echo $elements;
                }
            }

            $info_client["id"] = trouver_id_dispo($db_handle);


            #ajouter collection
            ajouter_collection(
                $info_client["id"],
                $db_handle
            );


            #ajouter images
            #ajouter_photo($info_client["image"],$db_handle,NULL,$info_client["id"]);
            #ajouter_photo($info_client["image_back"],$db_handle,NULL,$info_client["id"]);

            #ajouter user
            ajouter_vendeur(
                $info_client["id"],
                $info_client["email"],
                $info_client["mdp"],
                $info_client["pseudo"],
                $info_client["nom"],
                $info_client["prenom"],
                $info_client["image"],
                $info_client["image_back"],
                $db_handle
            );


            $_SESSION["id_user"] = $info_client['id'];
            $_SESSION["rang"] = $info_client['rang'];
            $_SESSION["nom"] = $info_client['nom'];
            $_SESSION["prenom"] = $info_client['prenom'];
            $_SESSION["id_collection"] = $info_client['id'];

            #echo "arriver au session";
            header("location: accueil.php");
        } else {
            echo "Vous êtes deja dans la bdd";

            #header("location: inscription_client");
        }
    } else {
        echo "ERROR";
    }
} else {
    echo "ERROR";
}
