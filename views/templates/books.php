<div class="book-page">
    <h2>Nos livres à l'échange</h2>
    <?php /* Formulaire de recherche qui s'active avec la touche entrée */ ?>
    <form action="index.php" method="get">
        <input type="hidden" name="action" value="search">
        <input type="text" name="title" placeholder="Rechercher un livre" class="searchfield">
    </form>
</div>

<?php /* Affichage de tous les livres de la base de donnée, où de ceux recherchés */ ?>
<div class="show-books">
        <?php foreach ($books as $book) : ?>
            <a href="index.php?action=bookDetail&bookId=<?=$book->getId()?>">
                <div class="book-card">
                    <div class="<?= $book->getDisponibility() == 1 ? 'dispo' : 'no-dispo' ?>">
                        <img src="img/covers/<?=$book->getCover()?>" alt="Couverture de <?=$book->getTitle()?>">
                        <div class="text-overlay">
                            <p>non dispo.</p>
                        </div>
                    </div>
                    <div class="text-card">
                        <h4><?=$book->getTitle()?></h3>
                        <h5><?=$book->getAuthor()?></h4>
                        <p>Vendu par : <?=$book->getUsername()?></p>
                    </div>
                </div>
            </a>
        <?php endforeach;
        ?>

    </div>