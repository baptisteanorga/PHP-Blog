<!-- Titre de la page -->
<?php $title = 'Administration'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>
<div class="title">
<h1>Administration</h1>
</div>
<hr>
<br/>

<!-- Publier un nouvel article -->
<h4>Publier un article</h4>
<br />
<br />
<form action="?controller=AdminController&action=postAction" method="post">
    <label for="title">Titre :</label></br>
    <input type="text" id="title" name="title" class="form-control"/></br>
    <label for="content">Contenu :</label></br>
    <textarea id="content" name="content" cols="30" rows="5" class="mceEditor"></textarea></br>
    <button class="btn btn-primary">Publier</button>
</form>
<hr>
<br />

<!-- Liste des billets en ligne -->
<?php
    include 'inc/_onlinePosts.php';
?>
<br />

<!-- Commentaires signalés -->
<?php
    include 'inc/_reportedComments.php';
?>
<hr>

<?php $content = ob_get_clean(); ?>

<!-- Vue requise -->
<?php require('views/template.php'); ?>
