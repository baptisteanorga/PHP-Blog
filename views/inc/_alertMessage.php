<!-- Message de bienvenue -->
<?php
if (isset($_SESSION) && !empty($_SESSION))
{
    echo "<p align='right'>Bonjour " . $_SESSION['pseudo'] . ", vous êtes connecté !</p>";
}
else {
    echo "<p align='right'> Bonjour visiteur !</p>";
}
?>

<!-- Message d'erreur (rouge) -->
<?php
if (isset($GLOBALS['alert']) && !empty($GLOBALS['alert']))
{
    ?>
    <div class="alert alert-danger">
        <p>
            <?php
            $message = $GLOBALS['alert'];
            echo $message['alertMessage'];
            ?>
        </p>
    </div>
    <?php
}
?>

<!-- Message de confirmation (vert) -->
<?php
if (isset($GLOBALS['success']) && !empty($GLOBALS['success']))
{
    ?>
    <div class="alert alert-success">
        <p>
            <?php
            $message = $GLOBALS['success'];
            echo $message['successMessage'];
            ?>
        </p>
    </div>
    <?php
}
?>