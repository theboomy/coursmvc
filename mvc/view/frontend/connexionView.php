<?php $title = "Mon super blog ! Inscription"; ?>
<h1>Connexion</h1>

<form action="index.php?action=createNewMember" method="post">
    <div>
        <label for="pseudo">Pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="password">Password</label><br />
        <textarea id="password" name="password"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>