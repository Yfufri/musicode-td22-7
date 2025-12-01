<?php if (isset($musiques)): ?>
    <div class="notif">
        Musique ajoutée à votre bibliothèque.
    </div>
<?php endif; ?>

<h2>Ma bibliothèque</h2>
<p>Gérez vos morceaux préférés et ajustez vos notes.</p>

<?php
if (isset($musiques)):
    foreach ($musiques as $musique): ?>
        <div class="musicCard">
            <h3><?php echo $musique['title'] ?></h3>
            <p>
                <?php echo $musique['artist'] . isset($musique['album']) ? ' · Album : ' . $musique['album'] : '' ?>
            </p>
            <div class="duration-text">
                Durée : <?php echo sprintf("%02d", $musique['duration'][0]); ?> "
                <?php echo sprintf("%02d", $musique['duration'][0]); ?> "
            </div>
            <form method="POST">
                Note
                <label for="note"><?php echo isset($musique['Note']) ? $musique['Note'] : '' ?></label>
                <input type="number" id="note" name="note" min=0 max=5>
                <input class="maj" type="submit" value="Mettre à Jour">
            </form>
            <form action="remove" method="POST">
                <input type="hidden" name="id_musique" value="<? echo $musique['Id_Musique'] ?>">
                <button type="submit">Retirer de ma bibliothèque</button>
            </form>
        </div>
    <?php endforeach;
endif; ?>