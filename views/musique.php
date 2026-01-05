<main>
    <div class="grid24px">
        <a href="home" class="returnlink">🡐 Retour au catalogue</a>

        <?php if (isset($notif)): ?>
            <div class="notif">
                <?= htmlspecialchars($notif) ?>
            </div>
        <?php endif; ?>

        <div class="musicCard">
            <div>
                <h3><?= htmlspecialchars($musique['titre']) ?></h3>
                <p class="musicCardArtist">Par <?= htmlspecialchars($musique['artist']) ?> </p>
            </div>
            <?php if (isset($musique['album']) && !empty($musique['album'])): ?>
                    <p class="musicCardAlbum">Album : <?= htmlspecialchars($musique['album']) ?></p>
            <?php endif; ?>
            <p class="musicCardTime">
                Durée : <?= sprintf("%02d", $musique['duration']['minutes']) ?>'<?= sprintf("%02d", $musique['duration']['seconds']) ?>"
            </p>

            <?php if ($isConnected): ?>
                <?php if ($isInLibrary): ?>
                    <div class="in-library">
                        <p class="connectMessage">Cette musique est dans votre bibliothèque</p>
                        <!-- <?php if ($userNote !== null): ?>
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
                            <button type="submit" class="btn-connection">Mettre à jour</button>
                        </form> -->

                        <form action="remove" method="POST">
                            <input type="hidden" name="id_musique" value="<?= $musique['Id_Musique'] ?>">
                            <input type="hidden" name="redirect" value="catalogue">
                            <button type="submit" class="btn-connection btn-pad">Retirer de ma bibliothèque</button>
                        </form>
                    </div>
                <?php else: ?>
                    <form method="POST" action="ajouterMusique">
                        <input type="hidden" name="musicId" value="<?= $musique['Id_Musique'] ?>">
                        <input type="hidden" name="redirect" value="fiche_musique">
                        <button type="submit" class="btn-connection btn-pad">Ajouter à ma bibliothèque</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p class="connectMessage">
                    <a href="connexion" class="link-creation">Connectez-vous</a> pour ajouter cette musique à votre bibliothèque
                </p>
            <?php endif; ?>
        </div>
    </div>
</main>