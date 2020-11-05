<?php

$title = 'Page de profil - Le Chouette Coin';
require 'includes/header.php';
$user_id = $_SESSION['id'];
?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Categorie</th>
            <th scope="col" colspan=3>Fonctions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            affichageProduitsByUser($user_id);
        ?>
    </tbody>
</table>

<?php
require 'includes/footer.php';
