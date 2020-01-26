<?php

namespace models;

class Message {

    public function __contruct()
    {

    }

    // Renvoie un message d'erreur
    public function setError($message)
    {
        global $alert;
        $alert = [
            'alertMessage' => $message
        ];
    }

    // Renvoie un message de confirmation
    public function setSuccess($message)
    {
        global $success;
        $success = [
            'successMessage' => $message
        ];
    }
}