<h2>Catalogue des musiques</h2>
<p class="subHeading">Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>

<div class="gridCards">
    <?php
    if (isset($musiques)):
        foreach ($musiques as $musique): ?>
            <div class="card">
                <h3><?=$musique['titre']?></h3>
                <p><?php echo $musique['artist']; 
                echo isset($musique['album']) ? ' · Album : ' . $musique['album'] : '' ?></p>
                <p>Durée : <?php echo sprintf("%02d", $musique['duration']['minutes']); ?>"
                <?php echo sprintf("%02d", $musique['duration']["seconds"]); ?>"</p>
                <div class="cardBottom">
                    <a href="#">Voir la fiche</a>
                    <p>Connectez-vous pour ajouter</p>
                </div>
            </div>
        <?php endforeach;
    endif; ?>
</div>
</body>