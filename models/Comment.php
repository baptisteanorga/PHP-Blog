<?php

namespace models;

class Comment {

    /* Attributs */
    private $id;
    private $post_id;
    private $author;
    private $content;
    private $alert;
    private $added_datetime;
    private $updated_datetime;

    /* Constantes */

    /* Constructeur */
    public function __construct ($id, $post_id, $author, $content, $alert, $added_datetime, $updated_datetime) {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->author = $author;
        $this->content = $content;
        $this->alert = $alert;
        $this->added_datetime = $added_datetime;
        $this->updated_datetime = $updated_datetime;
    }

    /* Getters */
    public function getId() {
        return $this->id;
    }
    public function getPostId() {
        return $this->post_id;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function getContent() {
        return $this->content;
    }
    public function getAlert() {
        return $this->alert;
    }
    public function getAddedDatetime() {
        return $this->added_datetime;
    }
    public function getUpdatedDatetime() {
        return $this->updated_datetime;
    }

    /* Setters */
    public function setId($id) {
        $this->id = $id;
    }
    public function setPostId($post_id) {
        $this->post_id = $post_id;
    }
    public function setAuthor($author) {
        $this->author = $author;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setAlert($alert) {
        $this->alert = $alert;
    }
    public function setAddedDatetime($added_datetime) {
        $this->added_datetime = $added_datetime;
    }
    public function setUpdatedDatetime($updated_datetime) {
        $this->updated_datetime = $updated_datetime;
    }
}