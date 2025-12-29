<a href="catalogue.php">⬅️ Retour au catalogue</a>

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

<h2>Ajouter une Musique</h2>
<p>Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.</p>

<form action="ajoutmusique" method="POST">
    <label for="title">Titre *</label>
    <input
            type="text"
            id="title"
            name="title"
            value="<?= isset($formData['title']) ? htmlspecialchars($formData['title']) : '' ?>"
            required
    >

    <label for="artist">Artiste *</label>
    <input
            type="text"
            id="artist"
            name="artist"
            value="<?= isset($formData['artist']) ? htmlspecialchars($formData['artist']) : '' ?>"
            required
    >

    <label for="album">Album</label>
    <input
            type="text"
            id="album"
            name="album"
            value="<?= isset($formData['album']) ? htmlspecialchars($formData['album']) : '' ?>"
    >

    <label for="duration_min">Durée *</label>
    <div class="duration-input">
        <input
                type="number"
                id="duration_min"
                name="duration_min"
                min="0"
                max="99"
                value="<?= isset($formData['duration_min']) ? $formData['duration_min'] : '0' ?>"
                required
        >
        <span>:</span>
        <input
                type="number"
                id="duration_sec"
                name="duration_sec"
                min="0"
                max="59"
                value="<?= isset($formData['duration_sec']) ? $formData['duration_sec'] : '0' ?>"
                required
        >
    </div>

    <input type="submit" value="Enregistrer la Musique">
</form>