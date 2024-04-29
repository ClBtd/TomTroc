<?php
    /**
     * Présentation. 
     */
?>
<h2>Rejoignez nos lecteurs passionnés</h2>
<p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
<a href="#">Découvrir</a>

<?php
    /**
     * Affichage des 4 derniers livres ajoutés disponibles à l'échange. 
     */
?>
<?php foreach ($books as $book) : ?>
    <img src="img/<?=$book->getCover()?>" alt="Couverture de <?=$book->getTitle()?>">
    <h3><?=$book->getTitle()?></h3>
    <h4><?=$book->getAuthor()?></h4>
<?php endforeach; ?>

