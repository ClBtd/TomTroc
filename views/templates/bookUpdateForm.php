<?php 
/*
 *   Page de modification des informations d'un livre.
 */
?>

<div class="bookForm">

    <a href="index.php?action=account" class="back">&lt;- retour</a>

    <h2>Modifier les informations</h2>

    <div class="container">

        <?php 
            /* Affichage et gestion de l'image de couverture.*/ 
        ?>

        <div class="item">
            <h4>Photo</h4>
            <?php if ($book->getCover()) :?>
                <img src="img/covers/<?=$book->getCover();?>" alt="Couverture du livre <?=$book->getTitle();?>">
            <?php else :?> 
                <img src="img/covers/default.png" alt="Ce livre n'a pas de couverture enregistrée.">
            <?php endif;?>    
            <a href="index.php?action=cover&id=<?=$book->getId()?>">Modifier la photo</a>
        </div>
        
        <?php 
            /* Formulaire de modification des informations. */ 
        ?>
        
        <div class="bookInfos">
            <form action="index.php?action=updateBook" method="post">
                <label for="title">Titre</label>
                <br>
                <input type="text" name="title" id="title" value="<?=$book->getTitle()?>">
                <br>
                <label for="author">Auteur</label>
                <br>
                <input type="text" name="author" id="author" value="<?=$book->getAuthor()?>">
                <br>
                <label for="description">Commentaire</label>
                <br>
                <textarea name="description" id="description"><?=$book->getDescription()?></textarea>
                <br>
                <label for="disponibility">Disponibilité</label>
                <br>
                <select name="disponibility" id="disponibility">
                    <option value="1">disponible</option>
                    <option value="0">indisponible</option>
                </select>
                <br>
                <input type="hidden" name="id" value="<?=$book->getId()?>">
                <button type="submit">Valider</button>
            </form>
        </div>

    </div>
    
</div>

