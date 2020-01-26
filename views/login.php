<!-- Titre de la page -->
<?php $title = 'Connexion'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>

<h1>Connexion</h1>
<br />

<form action="" method="POST">

    <div class="form-group">
        <label for="">Pseudo :</label>
        <input type="text" name="pseudo" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Mot de passe :</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-primary">Me connecter</button>

</form>
<br />

<?php $content = ob_get_clean(); ?>

<!-- Vue requise -->
<?php require('views/template.php'); ?>
