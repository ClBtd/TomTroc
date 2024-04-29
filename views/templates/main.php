<?php 
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div>
            <img src="img/logo.png" alt="Logo de TomTroc">
            <nav>
                <a href="index.php">Accueil</a>
                <a href="index.php">Nos livres à l'échange</a>
            </nav>
        </div>
        
    </header>

    <main>    
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <footer>
        <a href="#">Politique de confidentialité</a>
        <p>Mentions légales</p> 
        <p>TomTroc©</p>
    </footer>

</body>
</html>