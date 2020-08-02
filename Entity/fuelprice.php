<?php

class FuelPrice {
    private $pricePerGallon = 1.50;

    public function calculatePrice( $gallonsRequired ) {
        return $gallonsRequired * $this->pricePerGallon;
    }

    public function getPricePerGallon() {
        return $this->pricePerGallon;
    }
}
?>