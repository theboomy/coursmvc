<?php $title = "Mon super blog ! Inscription"; ?>
<h1>Connexion</h1>

<form action="index.php?action=newConnexion" method="post">
    <div>
        <label for="pseudo">Pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="password">Password</label><br />
        <input type="password" id="password" name="password"></input>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>