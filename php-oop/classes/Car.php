<?php

class Car {
    //Properties or Fields
   private $brand;
   private $color;
   public $vehicleType = "Car";

    //Constructor
   public function __construct($brand, $color = "none"){
    $this->brand = $brand;
    $this->color = $color;
   }

   //Method

   public function getCarInfo() {
    return "Brand: " . $this->brand . ", Color: " . $this->color;
   }
}


