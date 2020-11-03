<?php
$title = 'Identification - Le Chouette Coin';
require 'includes/header.php';
require 'includes/functions.php';

if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['username_signup']) && isset($_POST['submit_signup'])) {
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    if (inscription($email, $username, $password1, $password2, $conn)) {
        echo "L'utilisateur à bien été enregistré";
    } else {
        unset($_POST);
    }
}
?>
<div class="row">
    <div class="col-6">
        <form
            action="<?php $_SERVER['REQUEST_URI']; ?>"
            method="POST">
            <div class="form-group">
                <label for="InputEmail1">Adresse mail</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                    name="email_signup" required>
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que
                    ce soit.</small>
            </div>
            <div class="form-group">
                <label for="InputUsername1">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="InputUsername1" aria-describedby="userHelp"
                    name="username_signup" required>
                <small id="userHelp" class="form-text text-muted">Choisissez un nom d'utilisateur, il doit être unique
                    !</small>
            </div>
            <div class="form-group">
                <label for="InputPassword1">Choisissez un mot de passe</label>
                <input type="password" class="form-control" id="InputPassword1" name="password1_signup" required>
            </div>
            <div class="form-group">
                <label for="InputPassword2">Entrez votre mot de passe de nouveau</label>
                <input type="password" class="form-control" id="InputPassword2" name="password2_signup" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required>
                <label class="form-check-label" for="Check1">Accepter les <a href="#">termes et conditions</a></label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit_signup" value="inscription">S'inscrire</button>
        </form>
    </div>
    <div class="col-6">
        <form>
            <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" class="form-control" id="InputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
require 'includes/footer.php';
