<?php
    require('model/UserManager.php');

    function loadSignInView() {
        require('view/signInView.php');
    }

    function loadSignUpView() {
        require('view/signUpView.php');
    }

    function signUp($email, $password, $passwordTwo) {
        $userManager = new UserManager();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../?page=inscription&success=0&message=Adresse email invalide !');
            exit();
        } else if($userManager->isExisting($email)) {
            header('Location: ../?page=inscription&success=0&message=Vous êtes déjà inscrit !');
            exit();
        } else if($password != $passwordTwo) {
            header('Location: ../?page=inscription&success=0&message=Le mot de passe confirmé est différent !');
            exit();
        } else {
            $secret = sha1($email).time();
            $secret = md5('azerty'.$secret.'qsdfgh').time();
            $result = $userManager->insertUser($email, $password, $secret);
            if($result === false) {
                throw new Exception('Error : Impossible de se s\'inscrire pour le moment');
            } else {
                header('Location: ../?page=inscription&success=1');
                exit();
            }
        }
    }

    function signIn($email, $password) {
        $userManager = new UserManager();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../?success=0&message=Adresse email invalide !');
            exit();
        } else {
            $result = $userManager->getUser($email, $password);
            if(empty($result['email'])) {
                header('Location: ../?success=0&message=Vous n\'êtes pas encore inscrit !');
                exit();
            } else if($result['passwd'] != md5('azerty'.$password.'qsdf')) {
                header('Location: ../?success=0&message=Mot de passe incorrect !');
                exit();
            } else {
                $_SESSION['connect'] = 1;
                $_SESSION ['email']  = $result['email'];
                header('Location: ../');
                exit();
            }
        }   
    }

    function logOut() {
        session_unset();
        session_destroy();
        header('Location: ../');
        exit();
    }