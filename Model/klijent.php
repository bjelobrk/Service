<?php
class Klijent {
    
   private $preduzece, $id_klijent, $PIB,$naziv, $ime, $prezime, $adresa, $telefon, $email, $fax;
   
   public function __construct($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax) {
       
       
       $this->preduzece=$preduzece;
       $this->PIB=$PIB;
       $this->naziv=$naziv;
       $this->ime=$ime;
       $this->prezime=$prezime;
       $this->adresa=$adresa;
       $this->telefon=$telefon;
       $this->email=$email;
       $this->fax=$fax;
 
   }
 
       public function setIdklijent ($value){
           $this->id_klijent=$value;  
       }
    
       public function getIdklijent (){
           return $this->id_klijent;
       }
    
       public function setPreduzece ($value){
           $this->preduzece=$value;  
       }
       
       public function getPreduzece (){
           return $this->preduzece;
       }
       
         public function setPIB ($value){
           $this->id_PIB=$value;  
       }
       
           public function getPIB (){
           return $this->PIB;
       }
       
       public function setNaziv ($value){
           $this->naziv=$value;  
       }
       
       public function getNaziv (){
           return $this->naziv;
       }
        
       public function setIme ($value){
           $this->ime=$value;  
       }
       
       public function getIme (){
           return $this->ime;
       }
       public function setPrezime ($value){
           $this->prezime=$value;  
       }
       public function getPrezime (){
           return $this->prezime;
       }
       
       public function setAdresa ($value){
           $this->adresa=$value;  
       }
       
       public function getAdresa (){
           return $this->adresa;
       }
       
       public function setTelefon ($value){
           $this->telefon=$value;  
       }
       public function getTelefon (){
           return $this->telefon;
       }
       
       public function setEmail ($value){
           $this->email=$value;  
       }
       
       public function getEmail (){
           return $this->email;
       }
       
       public function setFax ($value){
           $this->fax=$value;  
       }
       
       public function getFax (){
           return $this->fax;
       }
}
    class klijent1 extends Klijent {
    
    public function __construct(){
        
}
       
       
}
?>
