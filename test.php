<?php
require_once('entity/user.php');

$users = User::getInstance();
$userData = $users->getUserData("moc525");

print_r($userData);
?>