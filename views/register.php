<!-- Titre de la page -->
<?php $title = 'Inscription'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>

<h1>Inscription</h1>
<br />

<form action="" method="POST">

    <div class="form-group">
        <label for="">Pseudo :</label>
        <input type="text" name="pseudo" class="form-control" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
    </div>

    <div class="form-group">
        <label for="">Mot de passe :</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Confirmez le mot de passe :</label>
        <input type="password" name="password_confirm" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Email :</label>
        <input type="email" name="email" class="form-control" value="<?php if(isset($email)) { echo $email; } ?>">
    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>
<hr>

<?php $content = ob_get_clean(); ?>

<!-- Vue requise -->
<?php require('views/template.php'); ?>
