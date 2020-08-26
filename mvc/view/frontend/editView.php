<?php $title = 'Modification de commentaires !'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<h3>Modifier votre commentaires :</h3>


<p>Pseudo : <?= $comment['author'] ?></p>
<p>Commentaire : <?= $comment['comment'] ?></p>

<form action="index.php?action=editedComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="comment">Modification du commentaire</label><br />
        <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>