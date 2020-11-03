1. Créer une page d'accueil avec un lien vers la page de connexion.
2. Créer une connexion à la base de données (avec PDO) dans un config.php dans le dossier includes, qui contient tous fichiers qui seront inclus sur des pages.
3. Créer une base données qui représente la structure de notre projet [le_chouette_coin>users,products,categories].
4. Créer un formulaire pour l'inscription des utilisateurs qui reprend les informations de connexion.
    -> Ne pas oublier l'action et la méthode POST du formulaire.
    -> Ne pas oublier les name sur les input (pour les retrouver lors du $_POST)
    -> ** Rajouter des vérification en front **
5. Récupérer les données du formulaire en prenant soin de les sécuriser
    -> htmlspecialchars sur nos variables POST
    -> ** On peut aussi utiliser strip_tags **
6. Créer une logique pour l'ajout d'utilisateurs dans la base de données.
    -> Un utilisateur doit forcément posséder un email, un password, un username et avoir cliqué sur le bouton d'inscription (1er if : avec !empty et isset)
    -> Un utilisateur ne peut pas avoir le même username ou la même adresse mail que quelqu'un d'autre. Pour ce faire, nous allons compter le nombre de fois que l'email ou le username sera trouvé dans la base de données. (2e if pour l'email, et 3e if pour l'username)
    -> Un utilisateur doit être sûr de son mot de passe (4e if avec la vérification de la concordance des mots de passe entrés "$pass1 === $pass2")
    -> LES MOTS DE PASSE SONT TOUJOURS CRYPTES DANS LA BASE DE DONNEES (RGPD 2018) - Le mot de passe doit être crypté avec la fonction password_hash (la clé PASSWORD_DEFAULT suffit, mais vous pouvez explorer les autres ! A savoir : Les clés de hashage md5 (et les ) et sha1 sont faciles à décrypter donc à eviter)
    -> Créer une requête d'insertion avec la preparation de requête en PDO et des marqueurs nommés. (prepare(), :value et bindValue(:value))
7. Factoriser le code, en créant une fonction qui réalise l'ajout d'utilisateurs à partir des variables nécessaires pour chaque utilisateurs.

