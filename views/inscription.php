<main>
    <section>
        <h2>Inscription</h2>

        <?php if (isset($error)): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="formFlex">

            <div class="form-part">
                <label for="nom">Nom d'affichage</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom ?? '') ?>" required>
            </div>

            <div class="form-part">
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail" value="<?= htmlspecialchars($mail ?? '') ?>" required>
            </div>

            <div class="form-part">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-part">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
            </div>

            <button type="submit" class="btn-creation">Créer mon compte</button>

        </form>

        <div class="txt-connection">
            Déjà inscrit ? <a href="connexion" class="link-connection">Se connecter</a>
        </div>

    </section>
</main>