<?php 
/*
 *   Page de détail d'un livre.
 */
?>

<div class="breadcrumb">
    <p>Nos livres > <?= $book->getTitle()?></p>
</div>

<div class="book-detail">

    <?php 
        /* Affichage de la couverture du livre. */
    ?>

    <?php if ($book->getCover()) :?>
        <img src="img/covers/<?=$book->getCover()?>" alt="Couverture du livre <?=$book->getTitle()?>">
    <?php else :?> 
        <img src="img/covers/default.png" alt="Ce livre n'a pas de couverture enregistrée.">
    <?php endif;?> 

    <?php 
        /* Affichage des informations du livre. */
    ?>

    <div class="infos">
        <h3><?=$book->getTitle()?></h3>
        <h4>par <?=$book->getAuthor()?></h4>
        <p id="line1"></p>
        <h5>DESCRIPTION</h5>
        <p class="book-description"><?=$book->getDescription()?></p>
        <h5>PROPRIETAIRE</h5>
        <div class="owner">
        <?php if ($book->getUserPicture()): ?>
            <img src="img/users/<?=$book->getUserPicture()?>" alt="Image de profil de l'utilisateur">
        <?php else : ?>
            <img src="img/users/default.png" alt="Pas d'image de profil">
        <?php endif; ?>
            <a href="index.php?action=userPage&userId=<?=$book->getUserId()?>"><?=$book->getLogin()?></a>
        </div>
        <a href="index.php?action=messages&userId=<?=$book->getUserId()?>" class="link-button">Envoyer un message</a>
    </div>

</div>