<?php if (isset($notif)): ?>
    <div class="notif">
        <?= htmlspecialchars($notif) ?>
    </div>
<?php endif; ?>
    <h2>Ma bibliothèque</h2>
    <p>Gérez vos morceaux préférés et ajustez vos notes.</p>
    <a href="ajoutmusique" class="btn-ajout"> + Nouvelle musique</a>
<?php
if (isset($musiques) && count($musiques) > 0):
    foreach ($musiques as $musique): ?>
        <div class="musicCard">
            <h3><?php echo htmlspecialchars($musique['titre']); ?></h3>
            <p>
                <?php
                echo htmlspecialchars($musique['artist']);
                if (isset($musique['album']) && !empty($musique['album'])) {
                    echo ' · Album : ' . htmlspecialchars($musique['album']);
                }
                ?>
            </p>
            <div class="duration-text">
                Durée : <?php echo sprintf("%02d", $musique['duration']['minutes']); ?>'<?php echo sprintf("%02d", $musique['duration']['seconds']); ?>"
            </div>

            <form action="update" method="POST">
                <label for="note_<?php echo $musique['Id_Musique']; ?>">Note :</label>
                <input
                        type="number"
                        id="note_<?php echo $musique['Id_Musique']; ?>"
                        name="note"
                        min="0"
                        max="5"
                        step="1"
                        value="<?php echo isset($musique['Note']) && $musique['Note'] !== null ? $musique['Note'] : ''; ?>"
                        placeholder="0-5"
                >
                <input type="hidden" name="id_musique" value="<?php echo $musique['Id_Musique']; ?>">
                <button class="maj" type="submit">Mettre à Jour</button>
            </form>

            <form action="remove" method="POST">
                <input type="hidden" name="id_musique" value="<?php echo $musique['Id_Musique']; ?>">
                <button type="submit" class="remove-btn">Retirer de ma bibliothèque</button>
            </form>
        </div>
    <?php endforeach;
else: ?>
    <p>Votre bibliothèque est vide. Ajoutez des musiques pour commencer !</p>
<?php endif; ?>