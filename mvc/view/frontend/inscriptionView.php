<?php $title = "Mon super blog ! Inscription"; ?>

<h1>Inscription</h1>

<form action="index.php?action=createNewMember" method="post">
    <div>
        <label for="pseudo">Pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="email">Email</label><br />
        <input type="email" id="email" name="email"></input>
    </div>
    <div>
        <label for="password">Password</label><br />
        <input type="password" id="password" name="password"></input>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>