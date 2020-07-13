<?php
    require_once('entity/users.php');
    $cipher = User::getInstance();
    $pwd = $cipher->getPassword("ali101");
    echo $pwd."<br>";
?>