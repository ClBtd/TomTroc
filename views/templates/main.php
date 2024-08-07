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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="img/logo-title.png" alt="Logo de TomTroc">
        <input type="checkbox" id="burger-toggle" class="burger-toggle">
        <label for="burger-toggle" class="burger-menu">&#9776;</label>
        <div class='nav'>
        <nav class="main-menu navMenu">
            <a href="index.php?action=home" class="<?php echo (empty($_GET['action']) || $_GET['action'] === 'home') ? 'focus' : ''; ?>">Accueil</a>
            <a href="index.php?action=books" class="<?php echo Utils::focus($_GET['action'] ?? '', 'books'); ?>">Nos livres à l'échange</a>
        </nav>
        <nav class='secondaryNav navMenu'>
            <a href="index.php?action=messages" class="<?php echo Utils::focus($_GET['action'] ?? '', 'messages'); ?>">
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                    <path d="M12.5342 10.8594L12.3182 11.0439L12.4441 11.2822V12.7332L11.1804 12.0036L11.0119 11.8558L10.8037 11.9494C9.81713 12.3931 8.6938 12.645 7.5 12.645C3.50458 12.645 0.355 9.84779 0.355 6.5C0.355 3.15221 3.50458 0.355 7.5 0.355C11.4954 0.355 14.645 3.15221 14.645 6.5C14.645 8.19467 13.8458 9.73885 12.5342 10.8594ZM11.1765 12.0014C11.1765 12.0014 11.1766 12.0014 11.1766 12.0014L11.1765 12.0014L11.1765 12.0014Z" stroke="#292929" stroke-width="0.71"/>
                </svg>
                Messagerie
                <?php if (isset($_SESSION['conversations'])) : ?>
                    <span><?=$_SESSION['conversations']?></span>
                <?php endif; ?>
            </a>
            <a href="index.php?action=account" class="<?php echo Utils::focus($_GET['action'] ?? '', 'account'); ?>">
                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                    <mask id="path-1-inside-1_227_966" fill="white">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.42801 9.28571C7.99219 9.28571 10.0709 7.20704 10.0709 4.64286C10.0709 2.07868 7.99219 0 5.42801 0C2.86383 0 0.785156 2.07868 0.785156 4.64286C0.785156 7.20704 2.86383 9.28571 5.42801 9.28571ZM5.42801 9.28571C2.86383 9.28571 0.785156 10.1172 0.785156 11.1429C0.785156 12.1685 2.86383 13 5.42801 13C7.99219 13 10.0709 12.1685 10.0709 11.1429C10.0709 10.1172 7.99219 9.28571 5.42801 9.28571Z"/>
                    </mask>
                    <path d="M9.36087 4.64286C9.36087 6.81491 7.60007 8.57571 5.42801 8.57571V9.99571C8.38431 9.99571 10.7809 7.59916 10.7809 4.64286H9.36087ZM5.42801 0.71C7.60007 0.71 9.36087 2.4708 9.36087 4.64286H10.7809C10.7809 1.68656 8.38431 -0.71 5.42801 -0.71V0.71ZM1.49516 4.64286C1.49516 2.4708 3.25596 0.71 5.42801 0.71V-0.71C2.47171 -0.71 0.0751563 1.68656 0.0751563 4.64286H1.49516ZM5.42801 8.57571C3.25596 8.57571 1.49516 6.81491 1.49516 4.64286H0.0751563C0.0751563 7.59916 2.47171 9.99571 5.42801 9.99571V8.57571ZM5.42801 8.57571C4.07872 8.57571 2.82447 8.79318 1.88133 9.17044C1.41173 9.35828 0.984055 9.59971 0.662168 9.90412C0.338782 10.2099 0.0751563 10.6283 0.0751563 11.1429H1.49516C1.49516 11.1387 1.49538 11.1236 1.51157 11.0919C1.52924 11.0574 1.56597 11.0038 1.63786 10.9358C1.78586 10.7959 2.03811 10.6371 2.4087 10.4889C3.14595 10.194 4.21313 9.99571 5.42801 9.99571V8.57571ZM0.0751563 11.1429C0.0751563 11.6574 0.338783 12.0758 0.662168 12.3816C0.984055 12.686 1.41173 12.9274 1.88133 13.1153C2.82447 13.4925 4.07872 13.71 5.42801 13.71V12.29C4.21313 12.29 3.14595 12.0917 2.4087 11.7968C2.03811 11.6486 1.78586 11.4898 1.63786 11.3499C1.56597 11.2819 1.52924 11.2283 1.51157 11.1938C1.49538 11.1621 1.49516 11.147 1.49516 11.1429H0.0751563ZM5.42801 13.71C6.77731 13.71 8.03156 13.4925 8.9747 13.1153C9.4443 12.9274 9.87197 12.686 10.1939 12.3816C10.5172 12.0758 10.7809 11.6574 10.7809 11.1429H9.36087C9.36087 11.147 9.36064 11.1621 9.34445 11.1938C9.32679 11.2283 9.29005 11.2819 9.21817 11.3499C9.07017 11.4898 8.81791 11.6486 8.44732 11.7968C7.71008 12.0917 6.6429 12.29 5.42801 12.29V13.71ZM10.7809 11.1429C10.7809 10.6283 10.5172 10.2099 10.1939 9.90412C9.87197 9.59971 9.4443 9.35828 8.9747 9.17044C8.03156 8.79318 6.77731 8.57571 5.42801 8.57571V9.99571C6.6429 9.99571 7.71008 10.194 8.44732 10.4889C8.81791 10.6371 9.07017 10.7959 9.21817 10.9358C9.29005 11.0038 9.32679 11.0574 9.34445 11.0919C9.36064 11.1236 9.36087 11.1387 9.36087 11.1429H10.7809Z" fill="#292929" mask="url(#path-1-inside-1_227_966)"/>
                </svg>
                Mon Compte
            </a>
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="index.php?action=disconnectUser">Déconnexion</a>
            <?php else : ?> 
                <a href="index.php?action=connectionForm" class="<?php echo Utils::focus($_GET['action'] ?? '', 'connectionForm'); ?>">Connexion</a>
            <?php endif; ?>
        </nav> 
        </div>
    </header>

    <main>    
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <footer>
        <p>Politique de confidentialité</p>
        <p>Mentions légales</p> 
        <p>TomTroc©</p>
        <img src="img/logo-simple.png" alt="Logo de TomTroc">
    </footer>

</body>
</html>