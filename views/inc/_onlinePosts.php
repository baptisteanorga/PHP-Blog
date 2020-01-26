<h4>Articles publiés</h4>
<br />
<br />
<!-- Tableau DESKTOP -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
    <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Titre</th>
        <th class="text-center">Date de publication</th>
        <th class="text-center">Dernière modification</th>
        <th class="text-center">Modifier</th>
        <th class="text-center">Supprimer</th>
    </tr>
    </thead>
    <?php
    foreach ($posts as $post)
    {
        ?>
        <tbody align="center">
        <tr>
            <td><?= $post->getId() ?></td>
            <td><a href="?controller=PostController&action=showAction&id=<?= $post->getId() ?>"
                   title="Lire le billet"><?= (html_entity_decode($post->getTitle())) ?></a></td>
            <td><?= $post->getAddedDatetime() ?></td>
            <td><?= $post->getUpdatedDatetime() ?></td>
            <td align="center">
                <a href="?controller=AdminController&action=editPostAction&id=<?= $post->getId() ?>"
                   title="Modifier le billet">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <a href="?controller=AdminController&action=deletePostAction&id=<?= $post->getId() ?>"
                   title="Supprimer le billet"
                   onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce billet ?'))">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        </tbody>
        <?php
    }
    ?>
</table>
<!-- Tableau RESPONSIVE -->
<?php
foreach ($posts as $post)
{
    ?>
    <div class="panel-group" id="accordionPosts">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse<?= $post->getId() ?>"><?= $post->getTitle() ?></a>
                </h4>
            </div>
            <div id="collapse<?= $post->getId() ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <a href="?controller=PostController&action=showAction&id=<?= $post->getId() ?>" title="Lire le billet">Lire le billet</a>
                </div>
                <div class="panel-body">
                    Ajouté : <?= $post->getAddedDatetime() ?>
                </div>
                <div class="panel-body">
                    Dernière modification : <?= $post->getUpdatedDatetime() ?>
                </div>
                <div class="panel-body text-center">
                    <a href="?controller=AdminController&action=editPostAction&id=<?= $post->getId() ?>" title="Modifier le billet">
                        Modifier&nbsp;<i class="fas fa-pencil-alt"></i>
                    </a>
                    <!-- espace 'cradatin' x2 = tabulation -->
                    &emsp;&emsp;
                    <a href="?controller=AdminController&action=deletePostAction&id=<?= $post->getId() ?>" title="Supprimer le billet" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce billet ?'))">
                        Supprimer&nbsp;<i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
<hr>