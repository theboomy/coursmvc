<?php
while ($message = $messages->fetch()) {
?>
    <p> <strong><?= htmlspecialchars($message['pseudo']) ?> : </strong> <?= htmlspecialchars($message['message']) ?></p>
<?php
}
?>