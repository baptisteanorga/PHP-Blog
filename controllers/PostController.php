<?php

namespace controllers;

use models\PostManager;
use models\CommentManager;

class PostController {

    // Lister les billets à l'accueil
    public function indexAction()
    {
        $newPostManager = new PostManager();
        $posts = $newPostManager->getPreviousPosts();
        require 'views/listPosts.php';
    }

    // Afficher le dernier  billet en date
    public function showLastPostAction()
    {
        $newPostManager = new PostManager();
        $lastPost = $newPostManager->getLastPost();
        require 'views/lastPost.php';
    }

    // Afficher le contenu d'un billet
    public function showAction($id)
    {
        $newPostManager = new PostManager();
        $newCommentManager = new CommentManager();
        $post = $newPostManager->getPost($id);
        $comments = $newCommentManager->getComments($id);
        // Si l'id du billet n'existe pas alors on affiche une erreur
        if ($post->getId() == null)
        {
            // Vue
            require 'views/error.php';
        }
        else
        {
            // Vue
            require 'views/postView.php';
        }
    }
}