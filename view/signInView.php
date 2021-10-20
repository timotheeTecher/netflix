<?php
    $title = 'Connexion';
    ob_start();
?>

<section>
    <div class="login-body">
        <?php
            if(isset($_SESSION['connect'])) {
                require('loggedView.php');
            } else {
        ?>
                <h1>S'identifier</h1>
                
                <?php
                    if((isset($_GET['success']) && $_GET['success'] == 0) && !empty($_GET['message'])) {
                        $message = htmlspecialchars($_GET['message']);
                ?>
                        <div class="alert error">
                            <p><?= $message ?></p>
                        </div>
                <?php
                    }
                ?>

                <form method="POST" action="../">
                    <input type="email" name="email" placeholder="Votre adresse email" required />
                    <input type="password" name="password" placeholder="Mot de passe" required />
                    <button type="submit">S'identifier</button>
                    <label class="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
                </form>
            
                <p class="grey">Première visite sur Netflix ? <a href="../?page=inscription">Inscrivez-vous</a>.</p>
        <?php
            }
        ?>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require('template.php');
?>