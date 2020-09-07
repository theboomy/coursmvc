<?php $title = "Edition de post"; ?>
<h1>Mon super blog !</h1>
<h3>Modifie ton post !</h3>


<p>Titre : <?= $post['title'] ?></p>
<p>Commentaire : <?= $post['content'] ?></p>

<form action="index.php?action=editedPost&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="title">Modification du titre</label><br />
        <textarea id="title" name="title"><?= $post['title'] ?></textarea>
        <label for="content">Modification du contenu</label><br />
        <textarea id="content" name="content"><?= $post['content'] ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>