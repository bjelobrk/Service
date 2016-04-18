<?php
class Radnik {
    
   private $preduzece, $id_radnik, $ime, $prezime, $telefon, $email, $password;
   
   public function __construct($preduzece, $ime, $prezime, $telefon, $email) {
       
       
       $this->preduzece=$preduzece;
       $this->ime=$ime;
       $this->prezime=$prezime;
       $this->telefon=$telefon;
       $this->email=$email;
   }
 
       public function setIdradnik ($value){
           $this->id_radnik=$value;  
       }
    
       public function getIdradnik (){
           return $this->id_radnik;
       }
    
       public function setPreduzece ($value){
           $this->preduzece=$value;  
       }
       
       public function getPreduzece (){
           return $this->preduzece;
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
       
          public function setPassword ($value){
           $this->password=$value;  
       }
       
       public function getPassword (){
           return $this->password;
       }
       
        
       
}
    class radnik1 extends Radnik {
    
    public function __construct(){
        
}
       
       
}

?>
