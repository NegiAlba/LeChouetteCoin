<?php

    $title = 'Processing - Le Chouette Coin';
    require 'includes/header.php';

    // Verrouiller l'accès à la page process aux méthodes POST.
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // Le elseif va servir au traitement du formulaire de création de produits
    } elseif (isset($_POST['product_submit'])) {
        // Vérification back-end du remplissage du formulaire
        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) && !empty($_POST['product_city']) && !empty(['product_category'])) {
            // Définition des variables
            $name = strip_tags($_POST['product_name']);
            $description = strip_tags($_POST['product_description']);
            $price = intval(strip_tags($_POST['product_price']));
            $city = strip_tags($_POST['product_city']);
            $category = strip_tags($_POST['product_category']);
            // Assigne la variable user_id à partir du token de session
            $user_id = $_SESSION['id'];
            // Lancement de la fonction d'ajout de produits
            ajoutProduits($name, $description, $price, $city, $category, $user_id);
        }
        // 2nd elseif pour le formulaire de modification
    } elseif (isset($_POST['product_edit'])) {
        // Vérification back-end du formulaire d'édition
        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) && !empty($_POST['product_city']) && !empty(['product_category'])) {
            // Définition des variables
            $name = strip_tags($_POST['product_name']);
            $description = strip_tags($_POST['product_description']);
            $price = intval(strip_tags($_POST['product_price']));
            $city = strip_tags($_POST['product_city']);
            $category = strip_tags($_POST['product_category']);
            // Assigne la variable user_id à partir du token de session
            $user_id = $_SESSION['id'];
            $id = strip_tags($_POST['product_id']);

            modifProduits($name, $description, $price, $city, $category, $id, $user_id);
        }
    } elseif (isset($_POST['product_delete'])) {
        // echo "<div class='alert alert-danger'> Vous tentez de supprimer l'article n°".$_POST['product_id'].'</div>';

        try {
            $sth = $conn->prepare('DELETE FROM products WHERE products_id = :products_id AND user_id =:user_id');
            $sth->bindValue(':products_id', $_POST['product_id']);
            $sth->bindValue(':user_id', $_SESSION['id']);
            $sth->execute();

            echo "<div class='alert alert-danger'> Vous avez supprimé l'article n°".$_POST['product_id'].'</div>';
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
    require 'includes/footer.php';
