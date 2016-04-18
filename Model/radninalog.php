<?php
class Radninalog {
    
   private $id_radni_nalog, $id_radnik, $id_klijent, $Rad_id_radnik, $datum_zahteva, $pocetak_rada, $zahtevano, $uradjeno, $drugi_komentar, $broj_sati;
   
   public function __construct($id_radnik, $id_klijent, $Rad_id_radnik, $datum_zahteva, $pocetak_rada, $zahtevano, $uradjeno, $drugi_komentar, $broj_sati) {
       
       
       $this->id_radnik=$id_radnik;
       $this->id_klijent=$id_klijent;
       $this->Rad_id_radnik=$Rad_id_radnik;
       $this->datum_zahteva=$datum_zahteva;
       $this->pocetak_rada=$pocetak_rada;
       $this->zahtevano=$zahtevano;
       $this->uradjeno=$uradjeno;
       $this->drugi_komentar=$drugi_komentar;
       $this->broj_sati=$broj_sati;
   }
 
       public function setIdradninalog ($value){
           $this->id_radni_nalog=$value;  
       }
    
       public function getIdradninalog (){
           return $this->id_radni_nalog;
       }
    
               
       public function setIdradnik ($value){
           $this->id_radnik=$value;  
       }
    
       public function getIdradnik(){
           return $this->id_radnik;
       }
    
            public function setIdklijent ($value){
           $this->id_klijent=$value;  
       }
       
       public function getIdklijent (){
           return $this->id_klijent;
       }   
       public function setIdradnikrad ($value){
           $this->Rad_id_radnik=$value;  
       }
    
       public function getIdradnikrad(){
           return $this->Rad_id_radnik;
       }
       
       public function setDatumzahtva ($value){
           $this->datum_zahteva=$value;  
       }
       
       public function getDatumzahteva (){
           return $this->datum_zahteva;
       }
       public function setPocetakrada ($value){
           $this->pocetak_rada=$value;  
       }
       public function getPocetakrada (){
           return $this->pocetak_rada;
       }
       
       public function setZahtevano ($value){
           $this->zahtevano=$value;  
       }
       public function getZahtevano (){
           return $this->zahtevano;
       }
       
       public function setUradjeno ($value){
           $this->uradjeno=$value;  
       }
       
       public function getUradjeno (){
           return $this->uradjeno;
       }
       
       public function setDrugikomentar($value){
           $this->drugi_komentar=$value;  
       }
       
       public function getDrugikomentar (){
           return $this->drugi_komentar;
       }
      public function setBrojsati($value){
           $this->broj_sati=$value;  
       }
       
       public function getBrojsati (){
           return $this->broj_sati;
       }
}
       class radninalog1 extends radninalog {
    
    public function __construct(){
        
}
       
}
?>
