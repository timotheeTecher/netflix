<?php
    session_start();
    require('controller/controller.php');

    try {
        if(!empty($_GET['page'])) {
            $page = htmlspecialchars($_GET['page']);
            switch($page) {
                case 'inscription':
                    if(isset($_SESSION['connect'])) {
                        header('Location: ../');
                    } else {
                        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {
                            $email       = htmlspecialchars($_POST['email']);
                            $password    = htmlspecialchars($_POST['password']);
                            $passwordTwo = htmlspecialchars($_POST['password_two']);
                            signUp($email, $password, $passwordTwo);
                        } else {
                            loadSignUpView();
                        }
                    }
                    break;
                case 'deconnexion':
                    logOut();
                    break;
                default:
                    throw new Exception('Cette page n\'existe pas ou a été suprimée !');
                    break;
            }
        } else {
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
                $email    = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                signIn($email, $password);
            } else {
                loadSignInView();
            }
        }
    } catch(Exception $e) {
        die('Error : '.$e->getMessage());
    }