<?php

class Veza {
    
    private $id_radni_nalog, $usluga, $cena_konacna;
    
    
     public function __construct($id_radni_nalog, $uslugaobj, $cena_konacna) {
        $this->id_radni_nalog=$id_radni_nalog;
        $this->usluga=$uslugaobj;
        $this->cena_konacna=$cena_konacna;
    }
   
    public function setIdradninalog ($value){
        $this->id_radni_nalog=$value;
        
    }
    public function getIdradninalog(){
        return $this->id_radni_nalog;
    }
    public function setUslugaobj($value){
        $this->usluga=$value;
    }
    public function getUslugaobj(){
        return $this->usluga;
    }
    public function setCenakonacna($value){
        $this->cena_konacna=$value;
    }
    public function getCenakonacna() {
        return $this->cena_konacna;
        
    }
}

?>