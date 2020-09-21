<?php $title = "Mon super blog !"; ?>


<?php
while ($data = $posts->fetch()) {
?>

    <div class="jumbotron">
        <h1 class="display-4"> <?= htmlspecialchars($data['title']) ?> </h1>
        <p class="lead"> <em>le <?= $data['creation_date_fr'] ?></em> </p>
        <hr class="my-4">
        <?= nl2br(htmlspecialchars($data['content'])) ?>
        <hr class="my-4">
        <p><a class="btn btn-primary btn-lg" href="index.php?action=post&amp;id=<?= $data['id'] ?>" role="button">Commentaires</a></p>
        <?php
        if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) {
        ?>
            <p><a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier</a></p>
        <?php
        };
        ?>
    </div>

<?php
}
$posts->closeCursor();
?>
<?php
if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) {
?>
    <form action="index.php?action=addPost" method="post">
        <div class="form-group">
            <input id="title" name="title" type="text" class="form-control" placeholder="Title" aria-label="Title" autocomplete="off">
        </div>
        <div class="form-group">
            <textarea id="content" name="content" class="form-control" rows="3" placeholder="Content"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
<?php
};
?>