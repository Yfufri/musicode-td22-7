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
    <div class="monCompte">
        <form action="moncompte" method="POST">
            <div>
                <label for="nom">Nom d'affichage</label>
                <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="<?= htmlspecialchars($user['Nom_Utilisateur']) ?>"
                        required
                >
            </div>

            <div class="inputMdp">
                <div class="filsInputMdp">
                    <label for="nouveauMdp">Nouveau mot de passe</label>
                    <input
                            type="password"
                            id="nouveauMdp"
                            name="nouveauMdp"
                            placeholder="Laissez vide pour conserver l'actuel"
                    >
                    <p>Laissez vide pour conserver l'actuel</p>
                </div>
                <div class="filsInputMdp">
                    <label for="confirmMdp">Confirmation</label>
                    <input
                            type="password"
                            id="confirmMdp"
                            name="confirmMdp"
                            placeholder="Confirmez le nouveau mot de passe"
                    >
                </div>
            </div>

            <div class="btnMettreAJourMDP">
                <input type="submit" value="Mettre à jour">
            </div>
        </form>
    </div>
</section>