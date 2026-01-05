<main>
    <section>
        <?php if (isset($notif)): ?>
            <div class="notif">
                <?= htmlspecialchars($notif) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <h2>Mon compte</h2>

        <form action="moncompte" method="POST" class="formFlex">
            <div class="form-part">
                <label for="nom">Nom d'affichage</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['Nom_Utilisateur']) ?>" required>
            </div>

            <div class="form-part-double">
                <div class="form-part">
                    <label for="nouveauMdp">Nouveau mot de passe</label>
                    <input type="password" id="nouveauMdp" name="nouveauMdp">
                    <p>Laissez vide pour conserver l'actuel</p>
                </div>
                <div class="form-part">
                    <label for="confirmMdp">Confirmation</label>
                    <input type="password" id="confirmMdp" name="confirmMdp">
                </div>
            </div>

            <input type="submit" value="Mettre à jour" class="btn-creation">

        </form>
    </section>
</main>