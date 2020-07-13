<?php
require_once('../entity/users.php');

//Class to carry out validation of a user for login
class UserValidation {

    public function validateUser( $username, $password ) {
        $usersData = User::getInstance();

        $userProfile = $usersData->getUser( $username );

        $uname = $userProfile["USERNAME"];
        $pwd = $usersData->getPassword($uname);

        if ( $uname == $username && $pwd == $password ) {
            return true;
        }

        return false;
    }

    public function isDuplicate( $username ) {
        $usersData = User::getInstance();
        $userProfile = $usersData->getUser( $username );

        if ( $userProfile != NULL ) {
            return true;
        }

        return false;
    }
}
?>