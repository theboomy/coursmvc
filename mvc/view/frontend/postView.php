<?php $title = "Poste n° : " . $post["id"] .  " Vos commentaires"; ?>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="jumbotron">

    <h1 class="display-4"><?= htmlspecialchars($post['title']) ?></h1>
    <p class="lead"> <em>le <?= $post['creation_date_fr'] ?></em> </p>
    <hr class="my-4">
    <?= nl2br(htmlspecialchars($post['content'])) ?>
    <hr class="my-4">
</div>


<div class="row">
    <h2>Commentaires</h2>
</div>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input class="form-control" type="text" id="author" name="author" />
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Send</button>
    </div>
</form>

<?php
while ($comment = $comments->fetch()) {
?>
    <hr class="my-4">
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <em><?= $comment['comment_date_fr'] ?></em> <a href="index.php?action=editComment&amp;id=<?= $comment['id'] ?>">Modifier</a></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>