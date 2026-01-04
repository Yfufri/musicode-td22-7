<main>
    <div class="grid24px">
        <a href="home" class="returnlink">🡐 Retour au catalogue</a>

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

        <div class="titleHeader">
            <h2>Ajouter une Musique</h2>
            <p class="subHeading">Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.</p>
        </div>

        <form action="ajoutmusique" method="POST" class="formFlex">
            <div class="form-part">
                <label for="title">Titre *</label>
                <input type="text" id="title" name="title" value="<?= isset($formData['title']) ? htmlspecialchars($formData['title']) : '' ?>" required>
            </div>

            <div class="form-part">
                <label for="artist">Artiste *</label>
                <input type="text" id="artist" name="artist" value="<?= isset($formData['artist']) ? htmlspecialchars($formData['artist']) : '' ?>" required>
            </div>

            <div class="form-part">
                <label for="album">Album</label>
                <input type="text" id="album" name="album" value="<?= isset($formData['album']) ? htmlspecialchars($formData['album']) : '' ?>">
            </div>

            <div class="form-part">
                <label for="duration_min">Durée *</label>
                <div class="duration-input">
                    <input type="number" id="duration_min" name="duration_min" min="0" max="99" value="<?= isset($formData['duration_min']) ? $formData['duration_min'] : '0' ?>" required>
                    <span>:</span>
                    <input type="number" id="duration_sec" name="duration_sec" min="0" max="59" value="<?= isset($formData['duration_sec']) ? $formData['duration_sec'] : '0' ?>" required>
                </div>
            </div>

            <div class="btn-small-pad">
                <input type="submit" class="btn-connection" value="Enregistrer la Musique">
            </div>
        </form>
    </div>
</main>