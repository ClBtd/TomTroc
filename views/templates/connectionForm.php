<div class="connection">
    <div class="connectionForm">
        <h2>Connexion</h2>

        <?php if (isset($_GET["success"])) : 
            if ($_GET["success"] === 1) : ?>
                <p class="bannerSuccess">Votre inscription a étét correctement réalisée, vous pouvez désormais vous connecter.</p> 
            <?php endif; 
        endif; ?>

        <form action="index.php?action=connectUser" method="post">
            <label for="email">Adresse email</label>
            <br>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Mot de passe</label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <button type="">Se connecter</button>            
        </form>
        <p>
            Pas de compte ?
            <a href="index.php?action=inscriptionForm">Inscrivez-vous</a>
        </p>
    </div>
    <img src="img/library2.png" alt="Image d'une librairie">
</div>