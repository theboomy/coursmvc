<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Accueil</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=incription">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=connect">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=deconnexion">Deconnexion</a>
            </li>
        </ul>
        <span class="navbar-text">
            <?php
            if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) {
            ?>
                Bonjour <?= $_SESSION['pseudo'] ?> </h1>
            <?php
            };
            ?>
        </span>
    </div>
</nav>

<body>

    <div class="container">
        <?= $content ?>
    </div>

    <?php
    if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) {
    ?>
        <div id="live_chat" class="fixed-bottom">
            <div class="scrollbar">
            </div>

            <div class="header_chat">
                ChatBox
            </div>
            <div class="chat">
                <div class=" chat_post">
                    <?php include __DIR__ . "/../../controller/minichat.php"; ?>
                </div>
                <div class="chat_form">
                    <form action="index.php?action=miniChat" method="post">
                        <div class="input-group mb-3">
                            <input type="text" id="message" name="message" class="form-control" placeholder="Type your message here" aria-describedby="button-addon2" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    };
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>