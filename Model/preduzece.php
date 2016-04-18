<?php
class Preduzece {
    
   private  $id_preduzece, $PIB, $naziv, $adresa, $email, $telefon, $fax;
   
   

   public function __construct( $PIB, $naziv, $adresa, $email, $telefon, $fax) {
       
     
      
       $this->PIB=$PIB;
       $this->naziv=$naziv;
       $this->adresa=$adresa;
       $this->email=$email;
       $this->fax=$fax;
       $this->telefon=$telefon;
 
   }
   public static function setIdpreduzecestatic ($value){
           $this->id_preduzece=$value;  
       }
       public  function setIdpreduzece ($value){
           $this->id_preduzece=$value;  
       }
       
       public function getIdpreduzece (){
           return $this->id_preduzece;
       }
       
         public function setPIB ($value){
           $this->id_PIB=$value;  
       }
       
           public function getPIB (){
           return $this->PIB;
       }
       
       public function setNaziv_p ($value){
           $this->id_Naziv=$value;  
       }
       
       public function getNaziv_p (){
           return $this->naziv;
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
class preduzece1 extends preduzece {
    
    public function __construct(){
        
}
}
?>
