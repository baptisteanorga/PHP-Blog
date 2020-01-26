<!-- Titre de la page -->
<?php $title = 'Modifier un commentaire'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>

<h3>Modifier un commentaire :</h3>

<form action="?controller=AdminController&action=editCommentAction&id=<?php echo $comment->getId() ?>" method="post">
    <label for="author" value="<?php echo $comment->getAuthor() ?>">Auteur :</label></br>
    <!-- Le pseudo n'est volontairement pas modifiable -> 'disabled' -->
    <input type="text" id="author" name="author" class="form-control" value="<?php echo $comment->getAuthor() ?>" disabled="disabled"></br>
    <label for="content">Contenu :</label></br>
    <textarea name="content" id="content" cols="30" rows="10" class="mceEditor"><?php echo $comment->getContent() ?></textarea></br>
    <button class="btn btn-primary">Modifier</button>
</form>
<hr>

<?php $content = ob_get_clean(); ?>

<!-- Requiert le fichier template.php -->
<?php require('views/template.php'); ?>