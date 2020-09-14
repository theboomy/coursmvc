<?php $title = "Mon super blog ! Inscription"; ?>

<h1>Inscription</h1>

<form method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label><br />
        <input class="form-control" type="text" id="pseudo" name="pseudo" required/>
    </div>
    <div class="form-group">
        <label for="email">Email</label><br />
        <input class="form-control" type="email" id="email" name="email" required></input>
    </div>
    <div class="form-group">
        <label for="password">Password</label><br />
        <input class="form-control" type="password" id="password" name="password" required></input>
    </div>
    <?php 
    foreach ($errors as $error){
        echo $error;
    }
    ?>
    <div>
    </br>
        <input type="submit" class="btn btn-primary" />
    </div>
</form>
