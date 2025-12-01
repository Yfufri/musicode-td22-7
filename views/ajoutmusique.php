<a href="/catalogue">⬅️ Retour au catalogue</a><br><br>
<h1>Ajouter une Musique</h1>
<a>Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.</a>
<form action="/ajoutmusique" method="POST" enctype="multipart/form-data">
    <label for="title">Titre *</label>
    <input type=" " id="title" name="title" required><br><br>

    <label for="artist">Artiste *</label>
    <input type=" " id="artist" name="artist" required><br><br>

    <label for="album">Album </label>
    <input type="Optionnel " id="album" name="album"><br><br>

    <label for="genre">Durée *</label><br>
    <input type1="Minutes " id="duration" name="duration"> <t>: </t>
    <input type2="Secondes " id="duration" name="duration"><br><br>

    <input type="submit" value="Enregistrer la Musique">
</form>