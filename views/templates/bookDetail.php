<div class="breadcrumb">
    <p>Nos livres > <?= $book->getTitle()?></p>
</div>

<div class="book-detail">
    <?php if ($book->getCover()) :?>
        <img src="img/covers/<?=$book->getCover()?>" alt="Couverture du livre <?=$book->getTitle()?>">
    <?php else :?> 
        <img src="img/covers/default.png" alt="Ce livre n'a pas de couverture enregistrée.">
    <?php endif;?>    
    <div class="infos">
        <h2><?=$book->getTitle()?></h2>
        <h4>par <?=$book->getAuthor()?></h4>
        <p id="line1"></p>
        <h5>DESCRIPTION</h5>
        <p class="description"><?=$book->getDescription()?></p>
        <h5>PROPRIETAIRE</h5>
        <div class="owner">
            <img src="img/users/<?=$book->getUserPicture()?>" alt="Image de profil de <?=$book->getLogin()?>">
            <p><?=$book->getLogin()?></p>
        </div>
        <a href="index.php?action=sendMessage&userId=<?=$book->getUserId()?>">Envoyer un message</a>
    </div>
</div>