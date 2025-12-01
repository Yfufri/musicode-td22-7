<a href="/catalogue">⬅️ Retour au catalogue</a>
<h2>Ajouter une Musique</h2>
<a>Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.</a>
<form action="mabibliotheque" method="POST" enctype="multipart/form-data">
    <label for="title">Titre *</label>
    <input type="text" id="title" name="title" required>

    <label for="artist">Artiste *</label>
    <input type="text" id="artist" name="artist" required>

    <label for="album">Album </label>
    <input type="text" id="album" name="album">

    <label for="genre">Durée *</label>
    <input type="number" id="duration" name="duration" min=0 max=99> <t>: </t>
    <input type="number" id="duration" name="duration" min=0 max=59>

    <input type="submit" value="Enregistrer la Musique">
</form>