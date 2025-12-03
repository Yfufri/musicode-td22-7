<section>

    <h2>Inscription</h2>

    <form method="POST">

        <div class="form-part">
            <label for="nom">Nom d'affichage</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div class="form-part">
            <label for="mail">Adresse e-mail</label>
            <input type="text" id="mail" name="mail" required>
        </div>

        <div class="form-part">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-part">
            <label for="password">Confirmer le mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-creation">Créer mon compte</button>

    </form>

    <div class="txt-connection">
        Déjà inscrit ? <a href="?action=connexion" class="link-connection">Se connecter</a>
    </div>

</section>