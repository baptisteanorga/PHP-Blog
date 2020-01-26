<?php

namespace models;

class PostManager extends Manager {

    // get all Posts
    public function getPosts()
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->query('SELECT id, author, title, content, DATE_FORMAT(added_datetime, \'le %d/%m/%Y à %Hh%i\') AS added_datetime_fr, DATE_FORMAT(updated_datetime, \'le %d/%m/%Y à %Hh%i\') AS updated_datetime_fr FROM posts ORDER BY added_datetime DESC');
        // Résultat
        $request->execute(array());
        $result = $request->fetchAll();
        $posts = [];
        foreach ($result as $post) {
            $newPost = new Post($post['id'], $post['author'], $post['title'], $post['content'], $post['added_datetime_fr'], $post['updated_datetime_fr']);
            $posts[] = $newPost;
        }
        return $posts;
    }

    public function getPreviousPosts()
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->query('SELECT id, author, title, content, DATE_FORMAT(added_datetime, \'%d/%m/%Y à %Hh%i\') AS added_datetime_fr, updated_datetime FROM posts ORDER BY added_datetime DESC LIMIT 1, 99999');
        return $request;
    }

    // Get Last Post
    public function getLastPost()
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('SELECT id, author, title, content, DATE_FORMAT(added_datetime, \'%d/%m/%Y à %Hh%i\') AS added_datetime_fr FROM posts ORDER BY id DESC LIMIT 1');
        // Exécute la requête
        $request->execute(array());
        // Résultat
        $lastPost = $request->fetch();
        return $lastPost;
    }

    public function getPost($id)
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('SELECT id, author, title, content, DATE_FORMAT(added_datetime, \'%d/%m/%Y à %Hh%i\') AS added_datetime_fr, DATE_FORMAT(updated_datetime, \'le %d/%m/%Y à %Hh%i\') AS updated_datetime_fr FROM posts WHERE id = ?');
        // Exécute la requête
        $request->execute(array($id));
        // Résultat
        $post = $request->fetch();
        return new Post($post['id'], $post['author'], $post['title'], $post['content'], $post['added_datetime_fr'], $post['updated_datetime_fr']);
    }

    public function addPost($title, $content)
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('INSERT INTO posts (author, title, content, added_datetime) VALUES ("Jean Forteroche", ?, ?, NOW())');
        // Execution
        $request->execute(array($title, $content));
    }

    public function updatePost($id, $title, $content)
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('UPDATE posts SET title = ?, content = ?, updated_datetime = NOW() WHERE id = ?');
        $post = $request->execute(array($title, $content, $id));
        // Résultat
        return $post;
    }

    // delete post
    public function deletePost($id)
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('DELETE FROM posts WHERE id = ?');
        // Résultat
        $request->execute(array($id));
    }

}