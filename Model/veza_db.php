<?php
class VezaDB{
    
    public static function setVeza($usluga,$id_radni_nalog) {
        $db = Database::getDB();
       
       $cena_konacna=1000;
    

        $query =
            "INSERT INTO veza
                 ( id_radni_nalog, id_usluga, Cena_konacna)
             VALUES
                 ( '$id_radni_nalog', '$usluga', '$cena_konacna')";
       
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
     public static function getCena($id_radninalog,$broj_sati) {
        $db = Database::getDB();
  
        $query1= "select cena,vrsta_usluge
        from veza, usluga
        where veza.id_usluga=usluga.id_usluga
          and veza.id_radni_nalog='$id_radninalog'";
         $result= $db->query($query1);
          $r= $result->fetchall(PDO::FETCH_ASSOC);
         
         foreach ($r as $row){
            
             if ($row['vrsta_usluge']== "Izlazak na teren"){
               $niz[]= $row['cena']* $broj_sati;
            
              
             }else
                          
             $niz[]=$row['cena'];
             
         
        }
        $suma = array_sum($niz);
    
  
        
         $query1 ='UPDATE veza 
         SET Cena_konacna=:cena WHERE id_radni_nalog =:id' ;
            
        $statement = $db->prepare($query1);
        
        $statement->bindValue(':id', $id_radninalog);
        $statement->bindValue(':cena', $suma);
        
        $statement->execute();
        $statement->closeCursor();
      
        
    }  
    
         public static function getVeza($id_radni_nalog) {
        $db=  Database::getDB();
        $query= "SELECT  u.vrsta_usluge, u.cena, u.id_usluga, v.id_radni_nalog, v.Cena_konacna
                 FROM  veza v,  usluga u WHERE v.id_usluga=u.id_usluga and v.id_radni_nalog='$id_radni_nalog'";
        $result= $db->query($query);
        
        foreach ($result as $row){
            
           $uslugaobj=new Usluga($row['vrsta_usluge'], $row['cena']);
           $uslugaobj->setID($row['id_usluga']);
           $veza= new Veza($row['id_radni_nalog'], $uslugaobj, $row['Cena_konacna']);
           $veze[]=$veza;
        }
        
        return $veze;
        
    }
    
   
    
}
