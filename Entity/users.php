<?php

//Class to hold users' data
class User {
    //singelton instance
    private static $UserInstance = null;

    //User information
    private $userArray = array();

    //Private constructor
    private function __construct() {}

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$UserInstance == null)
        {
            self::$UserInstance = new User();
        }
    
        return self::$UserInstance;
    }

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