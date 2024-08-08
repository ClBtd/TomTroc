<?php 
/**
 * Page d'accueil du site
 */
?>

<?php
    /* Présentation du site. */
?>

<div class="presentation">
    <div>
        <h2>Rejoignez nos lecteurs passionnés</h2>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=books" class="link-button">Découvrir</a>
    </div>
    <figure>
        <img src="img/hamza.png" alt="Photo d'un lecteur entouré de livres">
        <figcaption>Hamza</figcaption>
    </figure>
</div>

<?php
    /* Affichage des 4 derniers livres ajoutés disponibles à l'échange. */
?>

<div class="last-books">
    <h3>Les derniers livres ajoutés</h3>
    <div class="show-books">
        <?php foreach ($newBooks as $newBook) : ?>
            <a href="index.php?action=bookDetail&bookId=<?=$newBook->getId()?>">
                <div class="book-card">
                    <?php if ($newBook->getCover()) :?>
                        <img src="img/covers/<?=$newBook->getCover()?>" alt="Couverture de <?=$newBook->getTitle()?>">
                    <?php else :?> 
                        <img src="img/covers/default.png" alt="Ce livre n'a pas de couverture enregistrée.">
                    <?php endif;?>
                    <div class="text-card">
                        <h4><?=$newBook->getTitle()?></h3>
                        <h5><?=$newBook->getAuthor()?></h4>
                        <p>Vendu par : <?=$newBook->getLogin()?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <a href="index.php?action=books" class="link-button">Voir tous les livres</a>
</div>

<?php
    /* Description du fonctionnement du site. */
?>

<div class="description">
    <h3>Comment ça marche</h3>
    <h4>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</h4>
    <div>
        <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
        <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
        <p>Parcourez les livres disponibles chez d'autres membres.</p>
        <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
    </div>
    <a href="index.php?action=books">Voir tous les livres</a>
</div>

<div class="banner">
    <img src="img/library1.png" alt="Image d'une bibliothèque">
</div>

<?php
    /* Présentation des valeurs de l'équipe. */
?>

<div class="values">
    <h3>Nos valeurs</h3>
    <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
    <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
    <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <div class="signature">
        <address>L’équipe Tom Troc</address>
        <svg width="122" height="104" viewBox="0 0 122 104" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 96.2224V96.2224C2.29696 95.8216 6.2879 96.4842 7.64535 96.4785C34.2391 96.3656 77.2911 74.6923 96.4064 56.0062C109.127 40.7664 119.928 7.80529 85.8057 2.24352C65.0283 -1.1431 50.1873 26.7966 62.0601 33.1465C66.0177 35.2631 78.258 25.6112 65.0283 12.4034C51.7986 -0.804455 39.7279 0.126873 35.3463 2.24352C15.417 7.74679 2.27208 42.7137 71.8127 87.7558C96.4064 103.685 121 102.996 121 102.996" stroke="#00AC66" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </div>
</div>