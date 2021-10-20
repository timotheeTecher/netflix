<?php 
    $title = 'Inscription';
    ob_start();
?>

<section>
    <div class="login-body">
        <h1>S'inscrire</h1>

        <?php
            if(!empty($_GET['success']) && $_GET['success'] == 1) {
        ?>
                <div class="alert success">
                    <p>Vous êtes maintenant inscrit. <a href="../">Connectez-vous.</a></p>
                </div>
        <?php
            } else if((isset($_GET['success']) && $_GET['success'] == 0) && !empty($_GET['message'])) {
                $message = htmlspecialchars($_GET['message']);
        ?>
                <div class="alert error">
                    <p><?= $message ?></p>
                </div>
        <?php
            }
        ?>

        <form method="POST" action="../?page=inscription">
            <input type="email" name="email" placeholder="Votre adresse email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
            <button type="submit">S'inscrire</button>
        </form>

        <p class="grey">Déjà sur Netflix ? <a href="../">Connectez-vous</a>.</p>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require('template.php');
?>