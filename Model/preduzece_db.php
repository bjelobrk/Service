<?php
class PreduzeceDB{
    
    public static function getPreduzece() {
        $db=  Database::getDB();
        $query= "SELECT * FROM Preduzece";
        $result= $db->query($query);
        
        foreach ($result as $row){
            
            $preduzece= new Preduzece($row['id_preduzece'],$row['PIB'],$row['naziv'], $row['adresa'],$row['telefon'],$row['email'],$row['fax']);
            
            
            $preduzeca[]=$preduzece;
        }
        return $preduzeca;
    }
}