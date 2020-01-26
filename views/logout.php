<?php
session_start();
// Détruit les variables de session
$_SESSION = array();
// Détruit la session
session_destroy();
header("Location: index.php");
?>