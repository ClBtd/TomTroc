<?php 
/*
 *   Page de gestion du compte de l'utilisateur.
 */
?>

<div class='userPage'>

    <h3>Mon compte</h3>

    <?php 
        /* Affichage des bannières de succès de modifictaions d'informations. */
    ?>

    <?php if (isset($_GET["success"])) : 
        switch($_GET["success"]) :
            case 1: ?>
                <p class="bannerSuccess">Votre image a été correctement chargée.</p>
                <?php break;
            case 2: ?>
                <p class="bannerSuccess">Vos informations personnelles ont été correctement modifiées.</p>
                <?php break;
            case 3: ?>
                 <p class="bannerSuccess">Les informations du livre ont été correctement modifiées.</p>
                 <?php break;
            case 4: ?>
                <p class="bannerSuccess">Votre livre a été correctement supprimé.</p>
                <?php break;
            case 5: ?>
                <p class="bannerSuccess">Votre livre a été correctement ajouté.</p>
                <?php break; 
            default:
                break; 
        endswitch ;
    endif; ?>

    <div class="container">

    <?php 
        /* Affichage des informations générales de l'utilisateur et gestion de l'image de profil. */
    ?>

        <div class="userInfos">
            <?php if ($userInfos->getPicture()): ?>
                <img src="img/users/<?=$userInfos->getPicture()?>" alt="Image de profil de <?=$userInfos->getLogin()?>" width='135'>
                <br>
                <a href="index.php?action=picture">modifier</a>
            <?php else : ?>
                <img src="img/users/default.png" alt="Pas d'image de profil" width="135">
                <br>
                <a href="index.php?action=picture">ajouter une image de profil</a>
            <?php endif; ?>
            <p id="line2"></p>
            <h4><?=$userInfos->getLogin()?></h4>
            <?php if (Utils::years($userInfos->getInscription()) === 0) : ?>
                <p>Membre depuis cette année.</p>
            <?php else : ?>
                <p>Membre depuis <?=Utils::years($userInfos->getInscription())?> ans.</p>
            <?php endif; ?>
            <h5>BIBLIOTHEQUE</h5>
            <div class="library">
                <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46556 0.160154L7.2112 0.00251429C6.65202 -0.0365878 6.16701 0.385024 6.12791 0.944207L5.32192 12.4705C5.28281 13.0296 5.70442 13.5147 6.26361 13.5538L8.51796 13.7114C9.07715 13.7505 9.56215 13.3289 9.60125 12.7697L10.4072 1.24345C10.4464 0.684262 10.0247 0.199256 9.46556 0.160154ZM6.84113 0.99408C6.85269 0.828798 6.99605 0.70418 7.16133 0.715737L9.41568 0.873377C9.58096 0.884935 9.70558 1.02829 9.69403 1.19357L8.88803 12.7198C8.87647 12.8851 8.73312 13.0097 8.56783 12.9982L6.31348 12.8405C6.1482 12.829 6.02358 12.6856 6.03514 12.5203L6.84113 0.99408Z" fill="#292929"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.27482 0.0648067H1.01496C0.454414 0.0648067 0 0.519224 0 1.07977V12.6342C0 13.1947 0.454416 13.6491 1.01496 13.6491H3.27482C3.83537 13.6491 4.28979 13.1947 4.28979 12.6342V1.07977C4.28979 0.519221 3.83537 0.0648067 3.27482 0.0648067ZM0.714965 1.07977C0.714965 0.914086 0.849279 0.779771 1.01496 0.779771H3.27482C3.44051 0.779771 3.57482 0.914086 3.57482 1.07977V12.6342C3.57482 12.7999 3.44051 12.9342 3.27482 12.9342H1.01496C0.849279 12.9342 0.714965 12.7999 0.714965 12.6342V1.07977Z" fill="#292929"/>
                </svg>
                <p><?=count($userBooks)?> livre(s)</p>
            </div>
        </div>

        <?php 
        /* Formulaire de modification des informations de l'utilisateur. */
        ?>

        <div class="userInfos">
            <h3>Vos informations personnelles</h3>
            <form action="index.php?action=updateUser" method="post">
                <input type="hidden" name="id" value="<?=$userInfos->getId()?>">
                <label for="email">Adresse mail</label>
                <br>
                <input type="email" name="email" id="email" value="<?=$userInfos->getEmail()?>">
                <br>
                <label for="password">Mot de passe</label>
                <br>
                <input type="password" name="password" id="password">
                <br>
                <label for="login">Pseudo</label>
                <br>
                <input type="text" name="login" id="login" value="<?=$userInfos->getLogin();?>">
                <br>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>

    <?php 
        /* Affichage du tableau récapitulatif et de gestion des livres de l'utilisateur. */
    ?>

    <?php if (!empty($userBooks)) : ?>
        <table>
            <thead>
                <tr>
                    <th>
                        PHOTO
                    </th>
                    <th>
                        TITRE
                    </th>
                    <th>
                        AUTEUR
                    </th>
                    <th>
                        DESCRIPTION
                    </th>
                    <th>
                        DISPONIBILITE
                    </th>
                    <th>
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userBooks as $book) : ?>
                    <tr class="userBook">
                        <td>
                            <?php if ($book->getCover()) :?>
                                <img src="img/covers/<?=$book->getCover()?>" alt="Couverture du livre <?=$book->getTitle()?>" width="78" class="cover">
                            <?php else : ?>
                                <img src="img/covers/default.png" alt="Pas de couverture pour ce livre <?=$book->getTitle()?>" width="78" class="cover">
                            <?php endif; ?>
                        </td>
                        <td><?=$book->getTitle()?></td>
                        <td><?=$book->getAuthor()?></td>
                        <td class="short-description"><?=$book->getDescription()?></td>
                        <?php if ($book->getDisponibility()) : ?>
                            <td>
                                <div class="dispo yes">disponible</div>
                            </td>
                        <?php else : ?>
                            <td>
                                <div class="dispo no">non dispo.</div>
                            </td>
                        <?php endif; ?>
                        <td class="td-links">
                            <div class="links">
                                <a href="index.php?action=bookForm&id=<?=$book->getId()?>">Editer</a>
                                <a href="index.php?action=deleteBook&id=<?=$book->getId()?>" class="delete">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php 
        /* Lien vers la page d'ajout de livre. */
    ?>

    <a href="index.php?action=bookAddForm" class="link-button">Ajouter un livre</a>

</div>


