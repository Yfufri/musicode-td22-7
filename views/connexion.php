<section>

    <h2>Connexion</h2>

    <form method="POST">

        <div class="form-part">
            <label for="mail">Adresse e-mail</label>
            <input type="text" id="mail" name="mail" required>
        </div>

        <div class="form-part">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<div class='error'>Identifiant ou mot de passe incorrect.</div>";
        } ?>

        <button type="submit" class="btn-connection">Se connecter</button>

    </form>

    <div class="txt-inscription">
        Pas encore de compte ?<a href="?action=inscription" class="link-creation">Créer un compte</a>
    </div>

</section>