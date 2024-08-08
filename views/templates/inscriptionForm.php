<?php 
/*
 *   Page d'inscription.
 */
?>

<div class="connection">

    <div class="connectionForm">

        <h2>Inscription</h2>

        <form action="index.php?action=recordUser" method="post">
            <label for="login">Pseudo</label>
            <br>
            <input type="text" name="login" id="login">
            <br>
            <label for="email">Adresse email</label>
            <br>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Mot de passe</label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <button type="">S'inscrire</button>            
        </form>

        <p>
            Déjà inscrit ?
            <a href="index.php?action=connectionForm">Connectez-vous</a>
        </p>

    </div>

    <img src="img/library2.png" alt="Image d'une librairie">
    
</div>