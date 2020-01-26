<?php

namespace controllers;

session_start();

// Autoloader de classe
require 'vendor/autoload.php';

// Si présence d'un controller
if (isset($_GET['controller'])) {
    // Si présence d'une action
    if (isset($_GET['action'])) {
        // UserController
        if ($_GET['controller'] == 'UserController') {
            // Inscription
            if ($_GET['action'] == 'registerAction') {
                // Conditions ternaires
                $pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : NULL;
                $password_hash = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : NULL;
                $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
                $newUserController = new UserController();
                $newUserController->register($pseudo, $password_hash, $email);
            }
            // Connexion
            elseif ($_GET['action'] == 'loginAction') {
                // Conditions ternaires
                $pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : NULL;
                $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : NULL;
                $newUserController = new UserController();
                $newUserController->login($pseudo, $password);
            }
            // Déconnexion
            elseif ($_GET['action'] == 'logoutAction') {
                require 'views/logout.php';
            }
            // Si une autre action est tapée dans l'URL
            else {
                require 'views/error.php';
            }
        }
        // PostController
        elseif ($_GET['controller'] == 'PostController') {
            // Affiche la liste des billets en ligne
            if ($_GET['action'] == 'indexAction') {
                $newPostController = new PostController();
                $newPostController->indexAction();
            }
            // Affiche le contenu d'un billet et ses commentaires
            elseif ($_GET['action'] == 'showAction') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $newPostController = new PostController();
                    $newPostController->showAction($_GET['id']);
                } else {
                    // erreur 404
                    require 'views/error.php';
                }
            }
            // Publier un commentaire
            elseif ($_GET['action'] == 'addCommentAction') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    // Conditions ternaires
                    $author = isset($_POST['author']) ? htmlspecialchars($_POST['author']) : NULL;
                    $content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : NULL;
                    $newCommentController = new CommentController();
                    $newCommentController->addCommentAction($_GET['id'], $author, $content);
                } else {
                    // erreur 404
                    require 'views/error.php';
                }
            }
            // Signaler un commentaire sous un billet
            elseif ($_GET['action'] == 'alertCommentAction') {
                if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                    $newCommentController = new CommentController();
                    $newCommentController->alertCommentAction($_GET['id'], $_GET['post_id']);
                }
            }
            // Obtenir les informations sur l'auteur
            elseif ($_GET['action'] == 'about') {
                require 'views/about.php';
            }
            // Si une autre action est tapée dans l'URL
            else {
                require 'views/error.php';
            }
        }
        // Actions possibles depuis la page d'administration (connexion obligatoire)
        elseif (isset($_SESSION) && !empty($_SESSION)) {
            // AdminController
            if ($_GET['controller'] == 'AdminController') {
                // Affiche les billets en ligne et les commentaires signalés
                if ($_GET['action'] == 'indexAction') {
                    $newAdminController = new AdminController();
                    $newAdminController->indexAction();
                }
                // Publier un nouveau billet
                elseif ($_GET['action'] == 'postAction') {
                    // Conditions ternaires
                    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : NULL;
                    $content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : NULL;
                    $newAdminController = new AdminController();
                    $newAdminController->postAction($title, $content);
                }
                // Modifier un billet
                elseif ($_GET['action'] == 'editPostAction') {
                    $newAdminController = new AdminController();
                    $newAdminController->editPostAction($_GET['id']);
                }
                // Supprimer un billet
                elseif ($_GET['action'] == 'deletePostAction') {
                    $newAdminController = new AdminController();
                    $newAdminController->deletePostAction($_GET['id']);
                }
                // Modifier un commentaire signalé
                elseif ($_GET['action'] == 'editCommentAction') {
                    $newAdminController = new AdminController();
                    $newAdminController->editCommentAction($_GET['id']);
                }
                // Supprimer un commentaire signalé
                elseif ($_GET['action'] == 'deleteCommentAction') {
                    $newAdminController = new AdminController();
                    $newAdminController->deleteCommentAction($_GET['id']);
                }
                // Si une autre action est tapée dans l'URL
                else {
                    require 'views/error.php';
                }
            }
        }
        // Si on tente de se connecter sans être identifié
        else {
            require 'views/error.php';
        }
    }
    // Si on tente d'acéder à un autre controller
    else {
        require 'views/error.php';
    }
}
else {
    // Page d'accueil du site, affiche le dernier billet publié
    $newPostController = new PostController();
    $newPostController->showLastPostAction();
}

