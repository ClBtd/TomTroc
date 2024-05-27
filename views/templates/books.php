<div class="book-page">
    <h2>Nos livres à l'échange</h2>
    <form action="index.php?search" method="get">
        <input type="text" name="bookTitle" placeholder="Rechercher un livre" class="searchfield">
    </form>
</div>

<div class="show-books">
        <?php foreach ($books as $book) : ?>
            <div class="book-card">
                <img src="img/covers/<?=$book->getCover()?>" alt="Couverture de <?=$book->getTitle()?>">
                <div class="text-card">
                    <h4><?=$book->getTitle()?></h3>
                    <h5><?=$book->getAuthor()?></h4>
                    <p>Vendu par : <?=$book->getUsername()?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>