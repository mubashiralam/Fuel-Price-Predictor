<?php

class DBConnMgr {
    //singelton instance
    private static $DBinstance = null;

    //DB credentials
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "project";
    private $sqlDBConn;

    //Private constructor
    private function __construct() { 
        $this->sqlDBConn =  new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);

        if ( $this->sqlDBConn->connect_error ) {
            die("Connection failed: " . $this->sqlDBConn->connect_error);
        }
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$DBinstance == null)
        {
            self::$DBinstance = new DBConnMgr();
        }
        return self::$DBinstance;
    }

    public function executeUpdate($query) {
        if ( $this->sqlDBConn->query($query) === TRUE ) {
          return true;
        }
        else {
          $error = "Error: " . $query . "<br>" . $this->sqlDBConn->error;

          echo '<script language="javascript">';
          echo 'alert("'. $error .'");';
          echo 'window.location = "http://localhost/login.php"';
          echo '</script>';
          return false;
        }
    }

    public function executeQuery($query) {
        $result = $this->sqlDBConn->query($query);

        $dataArr = array();

        if  ( $result->num_rows > 0 ) {
          while( $row = $result->fetch_assoc() ) {
              $dataArr[$row["USERNAME"]] = $row;
          }
          return $dataArr;

        } else {
          return 0;
        }
        
    }

    public function executeQueryV2($query) {
      $result = $this->sqlDBConn->query($query);

      $dataArr = array();

      if  ( $result->num_rows > 0 ) {
        $i = 0;
        while( $row = $result->fetch_assoc() ) {
            $dataArr[$i++] = $row;
        }
        return $dataArr;

      } else {
        return 0;
      }
  }
}
      

?>