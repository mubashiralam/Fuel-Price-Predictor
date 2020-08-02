<?php
require_once('dbconnmgr.php');

//Class to hold users' quote history
class FuelQuote {
    //singelton instance
    private static $QuoteInstance = null;

    //Quotation Information
    private $quoteArray = array();

    //Private constructor
    private function __construct() {
        $this->initialize();
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$QuoteInstance == null)
        {
            self::$QuoteInstance = new FuelQuote();
        }
    
        return self::$QuoteInstance;
    }

    private function initialize() {
        $query = "  SELECT * FROM fuel_quote";

        $res = DBConnMgr::getInstance()->executeQueryV2($query);
    
        if ( $res != 0 ) {
            $this->quoteArray = $res;
        }
        else {
            echo '<script>alert("Unable to fetch quote(s).")</script>';
        }
    }

    public function getQuotationHistory( $username ) {
        $temp = array();
        $flag = false;

        for ( $i = 0 ; $i < count($this->quoteArray) ; $i++ ) {
            if ( $this->quoteArray[$i]['USERNAME'] == $username ) {
                array_push($temp, $this->quoteArray[$i]);
                $flag = true;
            }
        }

        if ( $flag ) {
            return $temp;
        }

        return $flag;
    }

    public function addQuotation( $username, $date, $gallons, $totalPrice ) {
        $query = "INSERT INTO `FUEL_QUOTE` (`USERNAME`, `DATE`, `GALLONS`, `TOTAL_PRICE`)
        VALUES ('$username', '$date', '$gallons', '$totalPrice')";

        $res = DBConnMgr::getInstance()->executeUpdate($query);

        if ( $res ) {
            $arr = array($username, $date, $gallons, $totalPrice);
            array_push( $this->quoteArray, $arr );
            return true;
        }
        else {
            echo '<script>alert("Unable to add user.")</script>';
            echo 'window.location = "http://localhost/home.php"';
            return false;
        }
    }
}
?>