<?php
class KlijentDB {
        public static function getKlijent(){
        $db=  Database::getDB();
        $query="SELECT * FROM klijent ORDER BY id_klijent DESC";
        $result= $db->query($query);
        foreach ($result as $row) {
            $klijent= new Klijent($row['id_preduzece'],$row['PIB_k'],$row['naziv_k'], $row['ime_k'],
                    $row['prezime_k'], $row['adresa_k'],$row['telefon_k'],$row['email_k'],$row['fax_k']);
            $klijent->setIdklijent($row['id_klijent']);
            $klijenti[]=$klijent;        
        }
        return $klijenti;
    }/**
    public static function getKlijentPreduzece(){
        $db=  Database::getDB();
        $query="SELECT * FROM Klijent 
                INNER JOIN Preduzece
                ON klijent.id_preduzece= klijent.id_preduzece";
        $result= $db->query($query);
        foreach ($result as $row) {
            $preduzece= new Preduzece($row['PIB'],$row['naziv'], $row['adresa'],$row['email'],$row['telefon'],$row['fax']);
            $preduzece->setIdpreduzece($row['id_preduzece']);
            $klijent= new Klijent($preduzece,$row['PIB_k'],$row['naziv_k'], $row['ime_k'],
                    $row['prezime_k'], $row['adresa_k'],$row['telefon_k'],$row['email_k'],$row['fax_k']);
            $klijent->setIdklijent($row['id_klijent']);
            $klijenti[]=$klijent;        
        }return $klijenti;
    } **/
    public static function getKlijentpravno (){
        
        $db=  Database::getDB();
        $query= "SELECT * FROM klijent WHERE  PIB_k IS NOT NULL ORDER BY id_klijent DESC";
        $result= $db->query($query);
        foreach ($result as $row){
            $preduzece= new Preduzece1();
            $preduzece->setIdpreduzece($row['id_preduzece']);
            $klijent= new Klijent($preduzece,$row['PIB_k'],$row['naziv_k'], $row['ime_k'],
                    $row['prezime_k'], $row['adresa_k'],$row['telefon_k'],$row['email_k'],$row['fax_k']);
            $klijent->setIdklijent($row['id_klijent']);
            $klijenti[]=$klijent;
        }
            return $klijenti;
    }
    public static function getKlijentfizicko (){
        
        $db=  Database::getDB();
        $query= "SELECT * FROM klijent WHERE  PIB_k IS NULL ORDER BY id_klijent DESC";
        $result= $db->query($query);
        foreach ($result as $row){
       $preduzece= new Preduzece1();
            $preduzece->setIdpreduzece($row['id_preduzece']);
            
            $klijent= new Klijent($preduzece,$row['PIB_k'],$row['naziv_k'], $row['ime_k'],
                    $row['prezime_k'], $row['adresa_k'],$row['telefon_k'],$row['email_k'],$row['fax_k']);
            
            $klijent->setIdklijent($row['id_klijent']);
            $klijenti[]=$klijent;  
        } return $klijenti;
} public static function setPravno($klijent) {
        $db = Database::getDB();
        $preduzece=$klijent->getPreduzece ();
        $ime=$klijent->getIme();
        $prezime=$klijent->getPrezime();
        $PIB=$klijent->getPIB();
        $naziv=$klijent->getNaziv();
        $adresa=$klijent->getAdresa();
        $telefon=$klijent->getTelefon();
        $email=$klijent->getEmail();
        $fax=$klijent->getFax();
        $query = "INSERT INTO klijent
                 ( id_preduzece, PIB_k, naziv_k, adresa_k, telefon_k, email_k, fax_k)
             VALUES
                 ( '$preduzece', '$PIB', '$naziv', '$adresa', '$telefon', '$email', '$fax')";
       
        $row_count = $db->exec($query);
        return $row_count;  
  
    }
    
    public static function setFizicko($klijent) {
        $db = Database::getDB();
        $preduzece=$klijent->getPreduzece();
        $PIB=$klijent->getPIB();
        $naziv=$klijent->getNaziv();
        $ime=$klijent->getIme();
        $prezime=$klijent->getPrezime();
        $adresa=$klijent->getAdresa();
        $telefon=$klijent->getTelefon();
        $email=$klijent->getEmail();
        $fax=$klijent->getFax();
        $query = "INSERT INTO klijent
                 ( id_preduzece,ime_k, prezime_k, adresa_k, telefon_k, email_k)
             VALUES
                 ( '$preduzece','$ime', '$prezime', '$adresa', '$telefon', '$email')";
       $row_count = $db->exec($query);
        return $row_count;
 }
 
  public static function getKlijentPretraga($klijent){
        $db=  Database::getDB();
        $preduzece=$klijent->getPreduzece();
        $PIB=$klijent->getPIB();
        $naziv=$klijent->getNaziv();
        $ime=$klijent->getIme();
        $prezime=$klijent->getPrezime();
        $adresa=$klijent->getAdresa();
        $telefon=$klijent->getTelefon();
        $email=$klijent->getEmail();
        $fax=$klijent->getFax();
        
          IF (strlen($PIB) < 1 ) {
          $PIB= ' ';
         
     }  
               IF (strlen($naziv) < 1 ) {
          $naziv= ' ';
         
     }  
               IF (strlen($ime) < 1 ) {
          $ime= ' ';
         
     }  
               IF (strlen($prezime) < 1 ) {
          $prezime= ' ';
         
     }  
               IF (strlen($adresa) < 1 ) {
          $adresa= ' ';
         
     }  
               IF (strlen($telefon) < 1 ) {
          $telefon= ' ';
         
     }  
               IF (strlen($email) < 1 ) {
          $email= ' ';
         
     }  
               IF (strlen($fax) < 1 ) {
          $fax= ' ';
         
     }  
     
        $query="select * from klijent where PIB_k like '%".$PIB."%' 
         or naziv_k like '%".$naziv."%' or ime_k like '%".$ime."%'or prezime_k like '%".$prezime."%' or adresa_k like '%".$adresa."%' or telefon_k like '%".$telefon."%' or email_k like '%".$email."%' or fax_k like '%".$fax."%' limit 10" ;
      
        $result= $db->query($query);
foreach ($result as $row) {
            $klijent= new Klijent($row['id_preduzece'],$row['PIB_k'],$row['naziv_k'], $row['ime_k'],
                    $row['prezime_k'], $row['adresa_k'],$row['telefon_k'],$row['email_k'],$row['fax_k']);
            $klijent->setIdklijent($row['id_klijent']);
            $klijenti[]=$klijent;        
        }
        if (!isset ( $klijenti)){
            return 'nije upisan objekat';
        }else{
        
        return $klijenti;
        }
  }
}