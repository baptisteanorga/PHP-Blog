<h4>Commentaires signalés</h4>
<br />
<br />

<!-- Commentaires DESKTOP -->
<table class="table table-striped table-hover" id="reportedComments">
    <thead>
        <tr>
            <th class="text-center">Auteur</th>
            <th class="text-center">Commentaire</th>
            <th class="text-center">Date de publication</th>
            <th class="text-center">Dernière modification</th>
            <th class="text-center">Signalements</th>
            <th class="text-center">Modifier</th>
            <th class="text-center">Supprimer</th>
        </tr>
    </thead>
    <?php
    foreach ($comments as $comment)
    {
        ?>
            <tbody align="center">
                <tr>
                    <td><?= $comment->getAuthor() ?></td>
                    <td><a href="?controller=PostController&action=showAction&id=<?= $comment->getPostId() ?>" title="Lire le commentaire"><?= substr (nl2br(html_entity_decode($comment->getContent())), 0, 25) . '...' ?></a></td>
                    <td><?= $comment->getAddedDatetime() ?></td>
                    <td><?= $comment->getUpdatedDatetime() ?></td>
                    <td><?= $comment->getAlert() ?></td>
                    <td>
                        <a href="?controller=AdminController&action=editCommentAction&id=<?= $comment->getId() ?>" title="Modifier le commentaire">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                    <td>
                        <a href="?controller=AdminController&action=deleteCommentAction&id=<?= $comment->getId() ?>" title="Supprimer le commentaire" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce commentaire ?'))">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php
    }
    ?>
</table>

<!-- Commentaires RESPONSIVE -->
<?php
foreach ($comments as $comment)
{
    ?>
    <div class="panel-group" id="accordionComments">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Posté par : <a data-toggle="collapse" href="#collapseId<?= $comment->getId() ?>"><?= $comment->getAuthor() ?></a>
                </h4>
            </div>
            <div id="collapseId<?= $comment->getId() ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    Commentaire : <a href="?controller=PostController&action=showAction&id=<?= $comment->getPostId() ?>" title="Lire le commentaire"><?= nl2br(html_entity_decode($comment->getContent())) ?></a>
                </div>
                <div class="panel-body">
                    Ajouté : <?= $comment->getAddedDatetime() ?>
                </div>
                <div class="panel-body">
                    Dernière modification : <?= $comment->getUpdatedDatetime() ?>
                </div>
                <div class="panel-body text-center">
                    <a href="?controller=AdminController&action=editCommentAction&id=<?= $comment->getId() ?>" title="Modifier le commentaire">
                        Modifier&nbsp;<i class="fas fa-pencil-alt"></i>
                    </a>
                    <!-- espace 'cradatin' x2 = tabulation -->
                    &emsp;&emsp;
                    <a href="?controller=AdminController&action=deleteCommentAction&id=<?= $comment->getId() ?>" title="Supprimer le commentaire" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce commentaire ?'))">
                        Supprimer&nbsp;<i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
