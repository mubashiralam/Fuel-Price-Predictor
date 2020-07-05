<?php

//Class to hold users' quote history
class FuelQuote {
    //singelton instance
    private static $QuoteInstance = null;

    //Quotation Information
    private $quoteArray = array();

    //Private constructor
    private function __construct() {}

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$QuoteInstance == null)
        {
            self::$QuoteInstance = new User();
        }
    
        return self::$QuoteInstance;
    }

    public function getQuotationHistory( $username ) {
        $temp = array();

        foreach ( $this->quoteArray as $quotation ) {
            if ( $quotation['USERNAME'] == $username ) {
                array_push($temp, $quotation);
            }

            return $temp;
        }
    }

    public function addQuotation( $quotation ) {
        array_push( $this->quoteArray, $quotation );
    }
}
?>