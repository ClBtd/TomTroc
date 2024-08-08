<?php 
/*
 *   Formulaire d'ajout d'un livre.
 */
?>

<div class="bookForm">

    <a href="index.php?action=account" class="back">&lt;- retour</a>

    <h2>Ajouter les informations</h2>

    <form action="index.php?action=addBook" method="post" class="bookInfos">
        <label for="title">Titre</label>
        <br>
        <input type="text" name="title" id="title">
        <br>
        <label for="author">Auteur</label>
        <br>
        <input type="text" name="author" id="author">
        <br>
        <label for="description">Commentaire</label>
        <br>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="disponibility">Disponibilité</label>
        <br>
        <select name="disponibility" id="disponibility">
            <option value="1">disponible</option>
            <option value="0">indisponible</option>
        </select>
        <br>
        <button type="submit">Valider</button>
    </form>
    
</div>

