<?php
class RadnikDB{
    
    public static function getRadnik() {
        $db=  Database::getDB();
        $query= "SELECT * FROM radnik";
        $result= $db->query($query);
        
        foreach ($result as $row){
            
            $radnik= new Radnik($row['id_preduzece'],$row['ime_r'],$row['prezime_r'],$row['telefon_r'],$row['email_r']);
            $radnik->setIdradnik($row['id_radnik']);
            
            $radnici[]=$radnik;
        }
        return $radnici;
    }
    
    public static function loginRadnik ($email,$password){
        $db=  Database::getDB();
       
        
        $st = $db->prepare("SELECT * FROM `radnik` WHERE `email_r` = :email AND `password_r` = :password LIMIT 1");
                 
        $st->execute(array(":email" => $email,":password" => $password)); 
            $result = $st->fetch(PDO::FETCH_OBJ);
           
            
                 if (( $result)==false){
            return 'nema podudaranja u bazi';
        }else{
        
        return $result->id_radnik;
        }
    }
    
    public static function getRadnikId($radnik_id) {
        $db=  Database::getDB();
        $query= "SELECT * FROM radnik WHERE id_radnik= '$radnik_id'";
        $result= $db->query($query);
        
        $radnik= $result->fetch(PDO::FETCH_OBJ);
        
   /**     foreach ($result as $row){
            
            $radnik= new Radnik($row['id_preduzece'],$row['ime_r'],$row['prezime_r'],$row['telefon_r'],$row['email_r']);
            $radnik->setIdradnik($row['id_radnik']);
            
            $radnici[]=$radnik;
            
        } **/
        return $radnik;
       
    }
    
}