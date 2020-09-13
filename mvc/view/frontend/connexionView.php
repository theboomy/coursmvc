<?php $title = "Mon super blog ! Connexion"; ?>
<h1>Connexion</h1>

<form action="index.php?action=newConnexion" method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label><br />
        <input class="form-control" type="text" id="pseudo" name="pseudo" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label><br />
        <input class="form-control" type="password" id="password" name="password" required></input>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" />
    </div>
</form>