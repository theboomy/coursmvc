<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>

    <h1>Hello world</h1>


    <?= $content ?>
    <section class="chat">
        <form action="index.php?action=miniChat" method="post">
            <label for="pseudo">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" required /><br />
            <label for="message">Message : </label> <input type="text" name="message" id="message" required /><br />
            <input type="submit" value="Envoyer" />
        </form>
        <div class="chat_post">
            <?php include __DIR__ . "/../../controller/minichat.php" ?>
        </div>
    </section>

</body>

</html>