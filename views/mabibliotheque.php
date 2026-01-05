<main>
    <div class="grid24px">
        <?php if (isset($notif)): ?>
            <div class="notif">
                <?= htmlspecialchars($notif) ?>
            </div>
        <?php endif; ?>
            <div class="homeTopBar">
                <div class="titleHeader">
                    <h2>Ma bibliothèque</h2>
                    <p class="subHeading">Gérez vos morceux préférés et ajustez vos notes.</p>
                </div>

                <a href="ajoutmusique" class="addMusic">+ Nouvelle Musique</a>
            </div>
        <?php
        if (isset($musiques) && count($musiques) > 0):
            ?> <div class="libraryGrid"> <?php
            foreach ($musiques as $musique): ?>
                <div class="musicCard">
                    <div>
                        <h3><?= htmlspecialchars($musique['titre']) ?></h3>
                        <p class="musicCardArtist"><?php echo htmlspecialchars($musique['artist']);
                                    echo isset($musique['album']) && !empty($musique['album']) ? ' · Album : ' . htmlspecialchars($musique['album']) : '' ?></p>
                    </div>
                    <p class="musicCardTime">
                        Durée : <?= sprintf("%02d", $musique['duration']['minutes']) ?>'<?= sprintf("%02d", $musique['duration']['seconds']) ?>"
                    </p>

                    <form action="update" method="POST" class="form-pad form-update">
                        <label for="note_<?php echo $musique['Id_Musique']; ?>">Note</label>
                        <input type="number" id="note_<?php echo $musique['Id_Musique']; ?>" name="note" min="0" max="5" step="1" value="<?php echo isset($musique['Note']) && $musique['Note'] !== null ? $musique['Note'] : ''; ?>" placeholder="0-5">
                        <input type="hidden" name="id_musique" value="<?php echo $musique['Id_Musique']; ?>">
                        <button class="btn-update" type="submit">Mettre à Jour</button>
                    </form>

                    <form action="remove" method="POST" class="form-pad">
                        <input type="hidden" name="id_musique" value="<?php echo $musique['Id_Musique']; ?>">
                        <button type="submit" class="btn-remove">Retirer de ma bibliothèque</button>
                    </form>
                </div>
            <?php endforeach;
            ?> </div> <?php
        else: ?>
            <p class="connectMessage">Votre bibliothèque est vide. <a href="home" class="link-creation">Ajoutez</a> des musiques pour commencer !</p>
        <?php endif; ?>
    </div>
</main>