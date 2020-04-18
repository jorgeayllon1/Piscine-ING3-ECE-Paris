<?php

session_start();

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


function ajouter_item($id, $id_prop, $nom, $description, $prix, $video, $categorie, $type, $date_debut, $date_fin, $db_handle)
{
    $sql =
        "INSERT INTO les_items
    VALUES('" . $id . "','" . $id_prop . "','" . $nom . "','" . $description . "',
    '" . $prix . "',NULL,'" . $video . "','" . $categorie . "','" . $type . "','" . $date_debut . "','" . $date_fin . "')";

    mysqli_query($db_handle, $sql);
}


function ajouter_photo($chemin, $db_handle, $id_item)
{
    $sql =
        "INSERT INTO photo
    VALUES(NULL,'" . $id_item . "','" . $chemin . "')";

    mysqli_query($db_handle, $sql);
}

function id_item_max($db_handle)
{
    $sql =
        "SELECT max(id) from les_items";

    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $lemax = $data["max(id)"];
    }
    $lemax++;

    return $lemax;
}

if (isset($_POST['ajouter_item_vendeur'])) {
    if ($db_found) {
        #$litem["id"]=NULL;
        $litem["id_prop"] = $_SESSION["id_user"];
        $litem["nom"] = $_POST["ajout_nom"];
        $litem["description"] = $_POST["ajout_description"];
        $litem["prix"] = $_POST["ajout_prix"];
        #$litem["prix_souh"]=NULL;
        $litem["video"]=$_POST["ajout_video"];
        $litem["categorie"] = $_POST["ajout_categorie"];
        #changer le type de l'item
        $litem["type"] = $_POST["ajout_type"];
        $litem["date_debut"] = "2020-05-21";
        $litem["date_fin"] = "2020-05-28";

        foreach ($litem as $elements) {
            if ($elements == "") {
                echo "erreur";
                #header("location: compte_vendeur");
            } else {
                echo $elements;
            }
        }
        $litem["id"] = id_item_max($db_handle);

        #Ajouter item dans collection
        
        /*
        ajouter_item(
            $litem["id"],
            $litem["id_prop"],
            $litem["nom"],
            $litem["description"],
            $litem["prix"],
            $litem["video"],
            $litem["categorie"],
            $litem["type"],
            $litem["date_debut"],
            $litem["date_fin"],
            $db_handle
        );
        */
    }
} else {
    echo "ERROR";
}
