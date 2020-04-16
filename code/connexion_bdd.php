<?php

if (isset($_POST["rechercher"])) {
    $email = isset($_POST["email_client_connexion"]) ? $_POST["email_client_connexion"] : "";
    $mdp = isset($_POST["mdp_client_connexion"]) ? $_POST["mdp_client_connexion"] : "";

    $database = "ebayece";
    $db_handle = mysqli_connect("localhost", "root", "");
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $sql = "SELECT * FROM user where email like '$email' and mdp like '$mdp' and rang like '1'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result)) {

            while ($data = mysqli_fetch_assoc($result)) {
                echo "ID: " . $data['id'] . '<br>';
                echo "mail:" . $data['email'] . '<br>';
                echo "Mot de passe: " . $data['mdp'] . '<br>';
                echo "Pseudo: " . $data['pseudo'] . '<br>';
                echo "Rank: " . $data['rang'] . '<br>';
            }
            header("Location :LoginTest.php ");
        } else {
            echo "Donnée non trouvée";
        }
    }

    mysqli_close($db_handle);
} else {
    echo "ERROR pas trouvé la reponse page html isset";
}