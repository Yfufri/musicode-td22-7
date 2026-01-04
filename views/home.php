<main>
    <?php if ($isConnected): ?>
        <div class="homeTopBar">
            <div>
                <h2>Catalogue des musiques</h2>
                <p class="subHeading">Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>
            </div>

            <a href="ajoutmusique" class="addMusic">+ Nouvelle Musique</a>
        </div>
    <?php else: ?>
        <h2>Catalogue des musiques</h2>
        <p class="subHeading">Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>
    <?php endif; ?>

    <?php if (isset($notif)): ?>
        <div class="notif">
            <?= htmlspecialchars($notif) ?>
        </div>
    <?php endif; ?>

    <div class="gridCards">
        <?php
        if (isset($musiques)):
            foreach ($musiques as $musique): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($musique['titre']) ?></h3>
                    <p class="author"><?php echo htmlspecialchars($musique['artist']);
                        echo isset($musique['album']) && !empty($musique['album']) ? ' · Album : ' . htmlspecialchars($musique['album']) : '' ?></p>
                    <p class="time">Durée : <?php echo sprintf("%02d", $musique['duration']['minutes']); ?>'<?php echo sprintf("%02d", $musique['duration']['seconds']); ?>"</p>
                    <div class="cardBottom">
                        <a href="musique?id=<?= $musique['Id_Musique'] ?>" class="cardLink">Voir la fiche</a>
                        <?php if ($isConnected): ?>
                            <form method="POST" action="ajouterMusique" >
                                <input type="hidden" name="musicId" value="<?= $musique['Id_Musique'] ?>">
                                <button type="submit" class="btn-ajouter">Ajouter</button>
                            </form>
                        <?php else: ?>
                            <p class="connectMessage">Connectez-vous pour ajouter</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
</main>