<?php
class UslugaDB{
    
    public static function  getUsluga() {
        $db=  Database::getDB();
        $query= "SELECT * FROM usluga";
        $result= $db->query($query);
        
        foreach ($result as $row){
            
            $usluga= new Usluga($row['vrsta_usluge'], $row['cena']);
            $usluga->setID($row['id_usluga']);
            $usluge[]=$usluga;
        }
        return $usluge;
    }
    
    public static function brisanjeUsluge($id_usluga){
        
        $db= Database::getDB();
        $query="DELETE FROM usluga WHERE id_usluga= '$id_usluga'";
        $result = $db->exec($query);
        return $result;
    }
    public static function modifikacijaUsluge ($usluga){
         $db = Database::getDB();
         
         $id= $usluga->getID();
         $vrsta_usluge = $usluga->getUsluga();
         $cena = $usluga->getCena();

         $query ='UPDATE usluga 
         SET vrsta_usluge=:vrsta_usluge ,
            cena=:cena
                WHERE id_usluga =:id' ;
            
        $statement = $db->prepare($query);
        
        $statement->bindValue(':id', $id);
        $statement->bindValue(':vrsta_usluge', $vrsta_usluge);
        $statement->bindValue(':cena', $cena);
        $statement->execute();
        $statement->closeCursor();
      
        
    }  
     public static function setUsluga ($usluga) {
        $db = Database::getDB();
    
         $vrsta_usluge = $usluga->getUsluga();
         $cena = $usluga->getCena();
 
        $query =
            "INSERT INTO usluga
                 ( vrsta_usluge, cena)
             VALUES
                 ( '$vrsta_usluge', '$cena')";
       
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
        
}
?>

