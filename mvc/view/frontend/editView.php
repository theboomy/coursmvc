<?php $title = "Edition de commentaire"; ?>

<p><a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</a></p>
<h3>Modifier votre commentaire :</h3>


<p>Pseudo : <?= $comment['author'] ?></p>
<p>Commentaire : <?= $comment['comment'] ?></p>
<hr class="my-4">

<form action="index.php?action=editedComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div class="form-group">
        <label for="comment">Modification du commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>