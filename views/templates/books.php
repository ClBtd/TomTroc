<?php 
/*
 *   Page de tous les livres du site.
 */
?>


<div class="book-page">

    <h2>Nos livres à l'échange</h2>

    <?php 
        /* Formulaire de recherche qui s'active avec la touche entrée */ 
    ?>

    <form action="index.php" method="get">
        <input type="hidden" name="action" value="search">
        <input type="text" name="title" placeholder="Rechercher un livre" class="searchfield">
    </form>

</div>

<?php 
    /* Affichage de tous les livres de la base de donnée, où de ceux recherchés */ 
?>

<div class="show-books">
    <?php foreach ($books as $book) : ?>
        <a href="index.php?action=bookDetail&bookId=<?=$book->getId()?>">
            <div class="book-card">
                <div class="<?= $book->getDisponibility() == 1 ? 'available' : 'no-available' ?>">
                    <?php if ($book->getCover()) : ?>
                        <img src="img/covers/<?=$book->getCover()?>" alt="Couverture de <?=$book->getTitle()?>">
                    <?php else :?> 
                        <img src="img/covers/default.png" alt="Ce livre n'a pas de couverture enregistrée.">
                    <?php endif;?>
                    <div class="text-overlay">
                        <p>non dispo.</p>
                    </div>
                </div>
                <div class="text-card">
                    <h4><?=$book->getTitle()?></h4>
                    <h5><?=$book->getAuthor()?></h5>
                    <p>Vendu par : <?=$book->getLogin()?></p>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>