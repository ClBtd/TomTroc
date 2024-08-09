<?php 
/*
 *   Page de messagerie.
 */
?>

<div class="messages <?= (isset($_GET['userId'])) ? 'write' : 'conversations' ?>">

    <?php
        /* Affichage en cas d'absence de messages. */
    ?>

    <?php if (!$infos) : ?>
        <p class = "bannerSuccess">Vous n'avez aucun message à afficher pour l'instant.</p>
    <?php else : ?>

    <?php
        /* Affichage de toutes les conversations en cours, avec le dernier message reçu. */
    ?>

    <aside>
        <h3>Messagerie</h3>
        <?php if (empty($conversations)) : ?>
            <div class="conversation">
                <p>Aucune conversation pour l'instant</p>
            </div>
        <?php else :
            foreach($conversations as $conversation) : 
                if ($conversation->getSenderId() !== $infos['userId']) : ?>
                    <div class="conversation <?= ($conversation->getSenderId() === $infos['senderId']) ? 'current' : '' ?>">
                        <a href="index.php?action=messages&userId=<?=$conversation->getSenderId()?>">
                            <?php if ($conversation->getSenderPicture()) : ?>
                                <img src="img/users/<?=$conversation->getSenderPicture()?>" alt="Image de profil" width="48">
                            <?php else : ?>
                                <img src="img/users/default.png" alt="Pas d'image de profil" width="48">
                            <?php endif; ?>
                        </a>
                        <div class="conversationContent">
                            <div class="conversationInfos">
                                <h4><?=$conversation->getSenderLogin()?></h4>
                                <span class="date_hour"><?=Utils::convertDateToHour($conversation->getDate())?></span>
                            </div>
                            <p><?=$conversation->getContent()?></p>
                        </div>
                    </div>        
                <?php else : ?>
                    <div class="conversation <?= ($conversation->getUserId() === $infos['senderId']) ? 'current' : '' ?>">
                        <a href="index.php?action=messages&userId=<?=$conversation->getUserId()?>">
                            <?php if ($conversation->getUserPicture()) : ?>
                                <img src="img/users/<?=$conversation->getUserPicture()?>" alt="Image de profil" width="48">
                            <?php else : ?>
                                <img src="img/users/default.png" alt="Pas d'image de profil" width="48">
                            <?php endif; ?>
                        </a>
                        <div class="conversationContent">
                            <div class="conversationInfos">
                                <h4><?=$conversation->getUserLogin()?></h4>
                                <span class="date_hour"><?=Utils::convertDateToHour($conversation->getDate())?></span>
                            </div>
                            <p><?=$conversation->getContent()?></p>
                        </div>
                    </div>
                <?php endif; 
            endforeach; 
        endif;?>
    </aside>

    <?php
    /* Affichage de la discussion avec l'utilisateur choisi ou de la dernière discussion en cours. */
    ?>

    <div class="discussion">
        <div class="discussionInfos">
            <?php if ($infos['senderPicture']) : ?>
                <img src="img/users/<?=$infos['senderPicture']?>" alt="Image de profil" width="48">
            <?php else : ?>
                <img src="img/users/default.png" alt="Pas d'image de profil" width="48">
            <?php endif; ?>
            <a href="index.php?action=userPage&userId=<?=$infos['senderId']?>"><?=$infos['senderLogin']?></a>
        </div>
        <div class="messagesContent">
            <?php foreach ($messages as $message) :
                if ($message->getSenderId() === (int)$infos['senderId']) : ?>
                    <div class="senderMessage">
                        <div class="senderMessageInfos">
                            <?php if ($infos['senderPicture']) : ?>
                                <img src="img/users/<?=$infos['senderPicture']?>" alt="Image de profil" width="24">
                            <?php else : ?>
                                <img src="img/users/default.png" alt="Pas d'image de profil" width="24">
                            <?php endif; ?>
                            <span class="date_hour"><?=Utils::convertDateToFrenchFormat($message->getDate())?></span>
                        </div>
                        <p><?=$message->getContent()?></p>
                    </div>
                <?php else : ?>
                    <div class="userMessage">
                        <span class="date_hour"><?=Utils::convertDateToFrenchFormat($message->getDate())?></span>
                        <p><?=$message->getContent()?></p>
                    </div>
                <?php endif;
            endforeach; ?>
            <form action="index.php?action=sendMessage" method="post">
                <input type="hidden" name="userId" value="<?=$infos['senderId']?>">
                <input type="hidden" name="senderId" value="<?=$infos['userId']?>">
                <label for="message" hidden>Taper votre message</label>
                <input type="text" name="message" id="message" placeholder="Tapez votre message ici">
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
    
    <?php endif; ?>

</div>
