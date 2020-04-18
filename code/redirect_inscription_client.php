<?php

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


function ajouter_livraison($id_user, $num_tel, $adreese1, $adresse2, $ville, $codepostal, $pays, $db_handle)
{
    echo $id_user . ' ' . $num_tel . ' ' . $adreese1 . ' ' . $adresse2 . ' ' . $ville . ' ' . $codepostal . ' ' . $pays;
    $sql =
        "INSERT INTO coord_livraison
    Values($id_user,$num_tel,$adreese1,$adresse2,$ville,$codepostal,$pays)";

    mysqli_query($db_handle, $sql);
}

function ajouter_bancaire($id_user, $num_carte, $type_carte, $nom_sur_carte, $date_expi, $code, $db_handle)
{
    $sql =
        "INSERT INTO info_bancaire
    Values($id_user,$num_carte,$type_carte,$nom_sur_carte,$date_expi,$code)";

    mysqli_query($db_handle, $sql);
}

function ajouter_collection($id_user, $db_handle)
{
    $sql =
        "INSERT INTO lacollection
    VALUES ($id_user, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

    mysqli_query($db_handle, $sql);
}

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


if (isset($_POST['submit_client_inscription'])) {

    $mail = $_POST["email_client_inscription"];

    if ($db_found) {
        $sql = "SELECT * FROM `user` WHERE email LIKE '$mail'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {
            #echo "Coder ici";

            $info_client["prenom"] = $_POST["prenom_client_inscription"];
            $info_client["nom"] = $_POST["nom_client_inscription"];
            $info_client["pseudo"] = $_POST["pseudo_client_inscription"];
            $info_client["mdp"] = $_POST["mdp_client_inscription"];
            $info_client["ad1"] = $_POST["ad1_client_inscription"];
            $info_client["ad2"] = $_POST["ad2_client_inscription"];
            $info_client["pays"] = $_POST["pays_client_inscription"];
            $info_client["ville"] = $_POST["ville_client_inscription"];
            $info_client["cp"] = $_POST["cp_client_inscription"];
            $info_client["phone"] = $_POST["phone_client_inscription"];
            $info_client["type_carte"] = $_POST["type_carte"];
            $info_client["paiement_nom"] = $_POST["paiement_nom"];
            $info_client["paiement_num_carte"] = $_POST["paiement_num_carte"];
            $info_client["paiement_date_expi"] = $_POST["paiement_date_expi"];
            $info_client["paiement_code"] = $_POST["paiement_code"];

            foreach ($info_client as $elements) {
                if ($elements == "") {
                    echo "error";
                    #header("location: inscription_client.php");
                } else {
                    #echo $elements;
                }
            }

            $info_client["id"] = trouver_id_dispo($db_handle);

            #ajouter livraison
            ajouter_livraison(
                $info_client["id"],
                $info_client["phone"],
                $info_client["ad1"],
                $info_client["ad2"],
                $info_client["ville"],
                $info_client["cp"],
                $info_client["pays"],
                $db_handle
            );
            #ajouter bancaire
            #ajouter user

        } else {
            echo "Vous êtes deja dans la bdd";

            #header("location: accueil.php");
        }
    }
}
