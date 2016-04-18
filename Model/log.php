<?php


class log{
    
public static function setLog ($date, $ipaddress, $action, $useragent, $remotehost  ) {
  $db=  Database2::getDB();

   $query = "INSERT INTO log
                 ( vreme, ip_adresa, action, useragent, remotehost)
             VALUES
                 ( '$date', '$ipaddress', '$action', '$useragent', '$remotehost')";
       
        $row_count = $db->exec($query);
         
}

public static function getLog (){
    
    $db=  Database2::getDB();
        $query= "SELECT * FROM log";
        $result= $db->query($query);
        return $result;
}

}