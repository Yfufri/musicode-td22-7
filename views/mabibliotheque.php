<?php if (isset($musiques)): ?>
    <div class="notif">
        Musique ajoutée à votre bibliothèque.
    </div>
<?php endif; ?>

<h2>Ma bibliothèque</h2>
<p>Gérez vos morceaux préférés et ajustez vos notes.</p>

<?php foreach ($musiques as $musique): ?>
    <div class="musicCard">
        <h3><?php echo $musique['title'] ?></h3>
        <p>
            <?php echo $musique['artist'] . isset($musique['album']) ? ' · Album : ' . $musique['album'] : '' ?>
        </p>
        <div class="duration-text">
            Durée : <?php echo sprintf("%02d", $musique['duration'][0]); ?> "
            <?php echo sprintf("%02d", $musique['duration'][0]); ?> "
        </div>
    </div>
<?php endforeach ?>