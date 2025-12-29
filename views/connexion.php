<section>

    <h2>Connexion</h2>

    <?php if (isset($notif)): ?>
        <div class="success-message">
            <?= htmlspecialchars($notif) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="error-message">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="form-part">
            <label for="mail">Adresse e-mail</label>
            <input type="text" id="mail" name="mail" required>
        </div>

        <div class="form-part">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>


        <button type="submit" class="btn-connection">Se connecter</button>

    </form>

    <div class="txt-inscription">
        Pas encore de compte ?<a href="inscription" class="link-creation">Créer un compte</a>
    </div>

</section>