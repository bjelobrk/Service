<?php

class Usluga {
    
    private $id, $usluga, $cena;
    
    public function __construct($vrsta_usluge, $cena) {
        $this->usluga=$vrsta_usluge;
        $this->cena=$cena;
    }

    public function setID ($value){
        $this->id=$value;
        
    }
    public function getID(){
        return $this->id;
    }
    public function setUsluga($value){
        $this->usluga=$value;
    }
    public function getUsluga(){
        return $this->usluga;
    }
    public function setCena($value){
        $this->cena=$value;
    }
    public function getCena() {
        return $this->cena;
        
    }
}

?>