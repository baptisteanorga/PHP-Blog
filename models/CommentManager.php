<?php

namespace models;

class CommentManager extends Manager {

    public function getComments($post_id)
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('SELECT id, post_id, author, content, alert, DATE_FORMAT(added_datetime, \'%d/%m/%Y à %Hh%i\') AS added_datetime_fr, updated_datetime FROM comments WHERE post_id = ?');
        // Exécute la requête
        $request->execute(array($post_id));
        // Transformation en tableau
        $result = $request->fetchAll();
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['content'], $comment['alert'], $comment['added_datetime_fr'], $comment['updated_datetime']);
            $comments[] = $newComment;
        }
        // Résultat
        return $comments;
    }

    // Publier new comment
    public function postComment($post_id, $author, $content)
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $comments = $db->prepare('INSERT INTO comments (post_id, author, content, alert, added_datetime) VALUES (?, ?, ?, 0, NOW())');
        // Exécute la requête
        $affectedLines = $comments->execute(array($post_id, $author, $content));
        // Résultat
        return $affectedLines;
    }
    //report comments
    public function reportComment($id)
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('UPDATE comments SET alert = alert + 1 WHERE id = ?');
        // Exécute la requête
        $alertedComment = $request->execute(array($id));
        // Résultat
        return $alertedComment;
    }

   // get Report Comments
    public function getReportedComments()
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->query('SELECT id, post_id, author, content, alert, DATE_FORMAT(added_datetime, \'le %d/%m/%Y à %Hh%i\') AS added_datetime_fr, DATE_FORMAT(updated_datetime, \'le %d/%m/%Y à %Hh%i\') AS updated_datetime_fr FROM comments ORDER BY alert DESC LIMIT 10');
        // Exécute la requête
        $request->execute(array());
        // Transformation en tableau
        $result = $request->fetchAll();
        $comments = [];
        foreach ($result as $comment) {
            $newComment = new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['content'], $comment['alert'], $comment['added_datetime_fr'], $comment['updated_datetime_fr']);
            $comments[] = $newComment;
        }
        return $comments;
    }

    // get ID comment
    public function getComment($id)
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('SELECT id, post_id, author, content, alert, added_datetime, updated_datetime FROM comments WHERE id = ?');
        // Exécute la requête
        $request->execute(array($id));
        // Résultat
        $comment = $request->fetch();
        return new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['content'], $comment['alert'], $comment['added_datetime'], $comment['updated_datetime']);
    }

    // update Comment
    public function updateComment($id, $content)
    {
        // Connexion bdd
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('UPDATE comments SET content = ?, updated_datetime = NOW() WHERE id = ?');
        $comment = $request->execute(array($content, $id));
        // Résultat
        return $comment;
    }

    // Delete Comment
    public function deleteComment($id)
    {
        // Connexion à la base de données
        $newManager = new Manager();
        $db = $newManager->dbConnect();
        // Requête
        $request = $db->prepare('DELETE FROM comments WHERE id = ?');
        // Résultat
        $deletedComment = $request->execute(array($id));
        return $deletedComment;
    }
}