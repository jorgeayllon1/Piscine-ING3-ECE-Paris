<?php

session_start();
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


#S'appelle une fois
function enlever_les_photos_dun_item($id_de_item, $db_handle)
{
    $sql =
        "DELETE FROM photo
    WHERE id_item=$id_de_item";

    #echo  PHP_EOL . $sql . PHP_EOL;
    mysqli_query($db_handle, $sql);
}

#S'appelle une fois
function enlever_item_dans_les_items($id_item, $db_handle)
{
    $sql =
        "DELETE FROM les_items
    WHERE id = $id_item";

    #echo  PHP_EOL . $sql . PHP_EOL;

    mysqli_query($db_handle, $sql);
}

#S'appelle une fois
function enlever_item_dans_collection($id_item, $db_handle)
{

    $sql =
        "SELECT * from lacollection";

    $result = mysqli_query($db_handle, $sql);

    $recip = "id_item_";

    while ($data = mysqli_fetch_assoc($result)) {

        #print_r($data);

        for ($indice = 1; $indice <= 50; $indice++) {

            #echo $data[$recip.$indice];

            if ($data[$recip . $indice] == $id_item) {

                $sql_autre =
                    "UPDATE lacollection
                SET id_item_" . $indice . " = NULL
                WHERE lacollection.id=" . $data["id"] . "";

                #echo "CHEZ " . $data["id"] . " ON FAIT " . $sql_autre;
                mysqli_query($db_handle, $sql_autre);
                #break;
            }
        }
    }
}

/*
function ordonner_collection($id_user, $db_handle)
{
    $sql =
    "SELECT * from lacollection";

    $result=mysqli_query($db_handle,$sql);

    $temp="id_item_";

    while($data = mysqli_fetch_assoc($result))
    {
        for($indice=1;$indice<=50;$indice++)
        {

        }
    }
}
*/

#Elle crée une transaction pour chaque achat imediat
function payer_achat_immediat($id_user, $db_handle)
{

    $indice = 0;

    foreach (items_dans_panier($id_user, $db_handle) as $item) {
        if ($item["type"] == 2) {

            $transaction[$indice]["id_acheteur"] = $id_user;
            $transaction[$indice]["id_vendeur"] = $item["id_prop"];
            $transaction[$indice]["id_item"] = $item["id"];
            $transaction[$indice]["montant"] = $item["prix"];
            $transaction[$indice]["date_livraison"] = "2020-11-20";
            $transaction[$indice]["date_transaction"] = date("Y-m-d");
            $indice++;
        }
    }

    foreach ($transaction as $latransaction) {
        $sql_transaction =
            "INSERT INTO transaction
            VALUES(NULL," . $latransaction["id_acheteur"] . "," . $latransaction["id_vendeur"] . ",
            " . $latransaction["id_item"] . "," . $latransaction["montant"] . "," . $latransaction["date_livraison"] . ",
            " . $latransaction["date_transaction"] . ")";

        #echo $sql_transaction;
        #Erreur random, des fois la date marche des fois non
        mysqli_query($db_handle, $sql_transaction);
    }
}

function find_item($id_item, $db_handle)
{
    $sql =
        "SELECT * from les_items
    WHERE id = " . $id_item . "";

    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $leitem["id"] = $data["id"];
        $leitem["id_prop"] = $data["id_prop"];
        $leitem["nom"] = $data["nom"];
        $leitem["description"] = $data["description"];
        $leitem["prix"] = $data["prix"];
        $leitem["prix_souh"] = $data["prix_souh"];
        $leitem["video"] = $data["video"];
        $leitem["categorie"] = $data["categorie"];
        $leitem["type"] = $data["type"];
        $leitem["date_debut"] = $data["date_debut"];
        $leitem["date_fin"] = $data["date_fin"];
    }
    return $leitem;
}

if (isset($_POST['payer'])) {

    if ($db_found) {
        if ($_POST["payer"] == 2) {
            payer_achat_immediat($_SESSION["id_user"], $db_handle);

            $monchamps = items_dans_panier($_SESSION["id_user"], $db_handle);

            foreach ($monchamps as $element) {
                if ($element["type"] == 2) {
                    enlever_les_photos_dun_item($element["id"], $db_handle);
                    enlever_item_dans_les_items($element["id"], $db_handle);
                    enlever_item_dans_collection($element["id"], $db_handle);
                }
            }

            #detruire photo
            #detruire item
            #detruire item dans collection
            header("location:paiement.php");
        } else if ($_POST["payer"] == 1) {

            $leitem = find_item($_POST["id_item"], $db_handle);

            /*
            if ($leitem["type"] != 1) {
                header("location:enchere.php");
            }
            */

            if ($leitem["prix_souh"] == NULL) {
                if ($leitem["prix"] < $_POST["prix_souh"]) {

                    echo "1: je dis que " . $leitem["prix"] . " est plus petit que " . $_POST["prix_souh"];

                    $sql =
                        "UPDATE les_items
                SET prix_souh= '" . $_POST["prix_souh"] . "'
                WHERE id='" . $_POST["id_item"] . "'";

                    mysqli_query($db_handle, $sql);
                }
            } elseif ($leitem["prix_souh"] < $_POST["prix_souh"]) {
                echo "2: je dis que " . $leitem["prix_souh"] . " est plus petit que " . $_POST["prix_souh"];
                #faire le changement de prix
                $sql =
                    "UPDATE les_items
                SET prix_souh= '" . $_POST["prix_souh"] . "'
                WHERE id='" . $_POST["id_item"] . "'";

                mysqli_query($db_handle, $sql);
            }
            header("location:enchere.php");
        }
    }
}
