<div class="loadPicture">

    <h3>Couverture du livre</h3>

    <form action="index.php?action=loadCover" method="post" enctype="multipart/form-data">
        <label for="cover">Choisissez une image de couverture (au format jpg ou png) :</label>
        <br>
        <input type="file" name="cover" id="cover" required>
        <br>
        <input type="hidden" name="id" value = <?=htmlspecialchars($_GET['id'])?>>
        <button type="submit" class="link-button">Charger l'image</button>
    </form>

</div>