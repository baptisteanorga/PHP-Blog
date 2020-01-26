<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="public/images/favicon.ico">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/css/bootstrap-paper.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <script src="public/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            mode : "textareas",
            editor_selector : "mceEditor"
        });
    </script>
</head>
<body>
<div class="container-fluid">
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active" title="Accueil">Billet simple pour l'Alaska</a>
  <a href="?controller=PostController&action=indexAction">Liste des chapitres</a>
    <?php
        if(isset($_SESSION) && empty($_SESSION)) {
    ?>
        <a href="?controller=UserController&action=loginAction" title="Se connecter">Connexion</a>
    <?php
        }
     ?>
    <?php
        if(isset($_SESSION) && !empty($_SESSION)) {
    ?>
        <!--<li><a href="?controller=UserController&action=registerAction" title="S'incrire">Inscription</a></li>-->
        <a href="?controller=AdminController&action=indexAction" title="Espace d'administration">Administration</a>
        <a href="?controller=UserController&action=logoutAction" title="Se déconnecter">Déconnexion</a>
    <?php
        }
    ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div class="container">
    <div id="message">
        <?php include 'inc/_alertMessage.php'; ?>
    </div>
<div class="banner">
<a><img src="public/images/banner.png"/></a>
</div>
    <!-- Contenu de la page -->
    <?= $content ?>

</div><!-- /.container -->
</body>
<footer class="footer">
    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <strong>© 2018 Copyright : Jean Forteroche</a></strong>
    </div>
</footer>
</body>
</html>
