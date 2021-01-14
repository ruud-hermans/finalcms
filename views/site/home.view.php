<?php require 'views/partials/header.view.php' ?>

<form method="POST" action="user/store">
    <?= generateFormTokenHTML() ?>
    <input type="text" name="first_name" />
    <input type="submit" value="Submit">
</form>