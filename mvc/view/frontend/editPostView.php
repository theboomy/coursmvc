<?php $title = "Edition de post"; ?>

<p><a href="index.php">Retour à la liste des billets</a></p>
<h3>Modifie ton post !</h3>


<div class="jumbotron">
    <h1 class="display-4"> <?= $post['title'] ?></h1>
    <hr class="my-4">
    <p>Commentaire : <?= $post['content'] ?></p>
</div>




<form action="index.php?action=editedPost&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
        <label for="title">Modification du titre</label><br />
        <textarea class="form-control" id="title" name="title"><?= $post['title'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Modification du contenu</label><br />
        <textarea class="form-control" id="content" name="content" rows="5"><?= $post['content'] ?></textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Send</button>
    </div>
</form>