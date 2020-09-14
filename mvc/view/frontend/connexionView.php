<?php $title = "Mon super blog ! Connexion"; ?>

<h1>Connexion</h1>

<form method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label><br />
        <input class="form-control" type="text" id="pseudo" name="pseudo" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label><br />
        <input class="form-control" type="password" id="password" name="password" required></input>
    </div>
    <?php
    foreach ($error as $errors){
        echo $errors;
    }
    ?>
    <div>
    </br>
        <input type="submit" class="btn btn-primary" />
    </div>
</form>