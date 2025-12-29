<a href="index.php">⬅️ Retour au catalogue</a>

<?php if (isset($notif)): ?>
    <div class="notif">
        <?= htmlspecialchars($notif) ?>
    </div>
<?php endif; ?>

<div class="musicDetail">
    <div class="card">
        <h3><?= htmlspecialchars($musique['titre']) ?></h3>
        <p>
            <strong>Artiste :</strong> <?= htmlspecialchars($musique['artist']) ?>
            <?php if (isset($musique['album']) && !empty($musique['album'])): ?>
                <br><strong>Album :</strong> <?= htmlspecialchars($musique['album']) ?>
            <?php endif; ?>
        </p>
        <p>
            <strong>Durée :</strong>
            <?= sprintf("%02d", $musique['duration']['minutes']) ?>'<?= sprintf("%02d", $musique['duration']['seconds']) ?>"
        </p>

        <?php if ($isConnected): ?>
            <?php if ($isInLibrary): ?>
                <div class="in-library">
                    <p>Cette musique est dans votre bibliothèque</p>
                    <?php if ($userNote !== null): ?>
                        <p><strong>Votre note :</strong> <?= $userNote ?>/5</p>
                    <?php endif; ?>

                    <form action="update_note" method="POST" class="note-form">
                        <label for="note">Modifier la note :</label>
                        <input
                            type="number"
                            id="note"
                            name="note"
                            min="0"
                            max="5"
                            step="1"
                            value="<?= $userNote ?? '' ?>"
                            placeholder="0-5"
                        >
                        <input type="hidden" name="id_musique" value="<?= $musique['Id_Musique'] ?>">
                        <input type="hidden" name="redirect" value="fiche_musique">
                        <button type="submit" class="btn-update">Mettre à jour</button>
                    </form>

                    <form action="remove" method="POST" class="remove-form">
                        <input type="hidden" name="id_musique" value="<?= $musique['Id_Musique'] ?>">
                        <input type="hidden" name="redirect" value="catalogue">
                        <button type="submit" class="btn-remove">Retirer de ma bibliothèque</button>
                    </form>
                </div>
            <?php else: ?>
                <form method="POST" action="ajouterMusique" class="add-form">
                    <input type="hidden" name="musicId" value="<?= $musique['Id_Musique'] ?>">
                    <input type="hidden" name="redirect" value="fiche_musique">
                    <button type="submit" class="btn-ajouter">Ajouter à ma bibliothèque</button>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <p class="login-message">
                <a href="connexion">Connectez-vous</a> pour ajouter cette musique à votre bibliothèque
            </p>
        <?php endif; ?>
    </div>
</div>