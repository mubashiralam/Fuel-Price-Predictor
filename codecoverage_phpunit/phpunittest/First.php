<?php
use PHPUnit\Framework\TestCase;

class First extends TestCase

{
    

    public function addUserCredentials( $username, $password ) {
        $this->userArray[ $username ][ "USERNAME" ]  = $username;
        $this->userArray[ $username ][ "PASSWORD" ]  = $password;
    }

    public function addUserData ( $username, $fullName, $address1, $address2, $city, $state, $zipCode ) {
        $this->userArray[ $username ][ "FULL_NAME" ]  = $fullName;
        $this->userArray[ $username ][ "ADDRESS1" ]  = $address1;
        $this->userArray[ $username ][ "ADDRESS2" ]  = $address2;
        $this->userArray[ $username ][ "CITY" ]  = $city;
        $this->userArray[ $username ][ "STATE" ]  = $state;
        $this->userArray[ $username ][ "ZIPCODE" ]  = $zipCode;
    }

    public function getUser( $username ) {
        return $this->userArray[$username];
    }
}

?>