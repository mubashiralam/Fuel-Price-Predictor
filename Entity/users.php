<?php

require_once('dbconnmgr.php');

//Class to hold users' data
class User {
    //singelton instance
    private static $UserInstance = null;
    private static $key = null;

    //User information
    private $userArray = array();

    //encrypt-decrypt params
    private $cipher = "aes-128-ctr";
    private $tag;

    //Private constructor
    private function __construct() {
        $this->initialize();
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$UserInstance == null)
        {
            self::$UserInstance = new User();
            self::$key = "0123456789abcdefghijklmnob123456";
        }
    
        return self::$UserInstance;
    }

    private function initialize() {
        $query = "  SELECT * FROM client_information
                    INNER JOIN user_credentials
                    ON client_information.USERNAME = user_credentials.USERNAME";

        $res = DBConnMgr::getInstance()->executeQuery($query);
    
        if ( $res != 0 ) {
            $this->userArray = $res;
        }
        else {
            echo '<script>alert("Unable to fetch user(s).")</script>';    
        }
    }

    public function addUserCredentials( $username, $password ) {

        $password = $this->encrypt($password);
        $query = "INSERT INTO `user_credentials` (`USERNAME`, `PASSWORD`) VALUES ('$username', '$password')";

        $res = DBConnMgr::getInstance()->executeUpdate($query);

        if ( $res ) {
            $this->userArray[ $username ][ "USERNAME" ]  = $username;
            $this->userArray[ $username ][ "PASSWORD" ]  = $password;
            return true;
        }
        else {
            echo '<script>alert("Unable to add user credentials.")</script>';
            return false;
        }
    }

    public function addUserData ( $username, $fullName, $address1, $address2, $city, $state, $zipCode ) {

        $query = "INSERT INTO `client_information` (`USERNAME`, `FULL_NAME`, `ADDRESS1`, `ADDRESS2`, `CITY`, `STATE`, `ZIPCODE`)
        VALUES ('$username', '$fullName', '$address1', '$address2', '$city', '$state', '$zipCode')";

        $res = DBConnMgr::getInstance()->executeUpdate($query);

        if ( $res ) {
            $this->userArray[ $username ][ "FULL_NAME" ]  = $fullName;
            $this->userArray[ $username ][ "ADDRESS1" ]  = $address1;
            $this->userArray[ $username ][ "ADDRESS2" ]  = $address2;
            $this->userArray[ $username ][ "CITY" ]  = $city;
            $this->userArray[ $username ][ "STATE" ]  = $state;
            $this->userArray[ $username ][ "ZIPCODE" ]  = $zipCode;
            return true;
        }
        else {
            echo '<script>alert("Unable to add user.")</script>';
            return false;
        }
    }

    public function getUser( $username ) {
        return $this->userArray[$username];
    }

    public function getPassword ( $username ) {
        $password = $this->decrypt($this->userArray[$username]["PASSWORD"]);
        return $password;
    }

    public function encrypt ( $string ) {
        if (in_array($this->cipher, openssl_get_cipher_methods()))
        {
            $ciphertext = openssl_encrypt($string, $this->cipher, self::$key, $options=0);
            $string = $ciphertext;
        }
        return $string;
    }

    public function decrypt ( $string ) {
        if (in_array($this->cipher, openssl_get_cipher_methods()))
        {
            $original_plaintext = openssl_decrypt($string, $this->cipher, self::$key, $options=0);
            $string = $original_plaintext;
        }
        return $string;
    }
}
?>