<?php
session_start();
require ('Model/database.php');
require ('Model/database2.php');
require ('Model/usluga.php');
require ('Model/usluga_db.php');
require ('Model/preduzece_db.php');
require ('Model/klijent_db.php');
require ('Model/preduzece.php');
require ('Model/klijent.php');
require ('Model/radnik.php');
require ('Model/radnik_db.php');
require ('Model/radninalog.php');
require ('Model/radni_nalog_db.php');
require ('Model/veza.php');
require ('Model/veza_db.php');
require ('fpdf/fpdf.php'); 
require ('Model/stampanje.php');
require ('Model/log.php');


if (isset ($_POST['action'])) {
    $action=$_POST['action'];
} else if (isset ($_GET ['action'])){
    $action= $_GET['action'];
} else {
    $action= 'prva_strana';
}
  $useragent = $_SERVER['HTTP_USER_AGENT'];
  $ipaddress= $_SERVER['REMOTE_ADDR'];
  $remotehost = @getHostByAddr($ipaddress);
  $date=date('Y-m-d H:i:s');
log::setLog($date, $ipaddress, $action, $useragent, $remotehost);


     $action = strtolower($action); 

     switch ($action){

         case 'prva_strana':
             
             if(isset($_SESSION['id'])) {
               include('view/prva_strana.php');
            } else {
                $error='';
               include('view/login.php');
            }
            
             break;
   ///////////////////////////USLUGA////////////////////////////////////////////////////////      
         case 'prikaz_usluga':
             
             $usluga_ispis= UslugaDB::getUsluga();
             
            
             include('view/lista_usluga.php');
             break;
         
         case 'editovanje_usluga';
             $usluga_ispis= UslugaDB::getUsluga();
             
             include ('view/lista_usluga_edit.php');
             break;
         
         case 'brisanje_usluge':
             
             $id_usluga=$_POST['id_usluga'];
           
             UslugaDB::brisanjeUsluge($id_usluga);
             
              header("Location: .?action=editovanje_usluga");
              break;
         
         case 'lista_modifikacija_usluge':
             
              $id= $_POST['id'];
              $usluga=$_POST['usluga'];
              $cena=$_POST['cena'];
    
              $usluga=new Usluga($usluga, $cena);
              $usluga->setID($id);
      
              include('view/modifikacija_usluga.php');
              break;

          case 'modifikacija_usluge':
             
             $vrsta_usluge=$_POST['usluga'];
             $cena=$_POST['cena'];
             
             $usluga=new Usluga($vrsta_usluge, $cena);
             $usluga->setID($_POST['id']);
             UslugaDB::modifikacijaUsluge($usluga);
        
             header("Location: .?action=editovanje_usluga");
             break;
         
          case 'forma_unos_usluge':
              $error='';
             include('view/unos_usluge.php');
             break;

         case 'unos_usluge';

             $vrsta_usluge=$_POST['usluga'];
             $cena=$_POST['cena'];


            if (empty($vrsta_usluge) || empty($cena))  {
            $error = "Pogrešno uneti podaci. Proverite sva polja i pokušajte ponovo.";
                include('view/unos_usluge.php');
         } 
             else {
       
        $usluga = new Usluga($vrsta_usluge, $cena);

         UslugaDB::setUsluga($usluga);
 
        header("Location: .?action=editovanje_usluga");
    }
              break;
/////////////////////////////////KLIJENT////////////////////////////////////////////////////              
         case 'prikaz_klijent' :
           
             $klijent_ispis= KlijentDB::getKlijent();
             include('view/lista_klijent.php');
        
             break;
             
         case 'prikaz_prvano':
             
             $klijent_ispis_pravno=  KlijentDB::getKlijentpravno();
             
         include('view/klijenti_pravno.php');
             
             break;
         
          case 'prikaz_fizicko':
              $klijent_ispis_fizicko= KlijentDB::getKlijentfizicko();
         include('view/klijenti_fizicko.php');
             
             break;
         case 'forma_unos_klijenta_pravno':
              $error='';
             include ('view/unos_klijent_pravno.php');
             
             break;

         case 'unos_klijent_pravno':
             
             $preduzece=1;
             $ime=null;
             $prezime=null;
             $PIB= $_POST['PIB'];
             $naziv= $_POST['naziv'];
             $adresa= $_POST['adresa'];
             $telefon= $_POST['telefon'];
             $email= $_POST['email'];
             $fax= $_POST['fax'];
     
                 if (empty($PIB) || empty($naziv)|| empty($adresa)|| empty($telefon)|| empty($email)|| empty($fax))  {
            $error = "Pogrešno uneti podaci. Proverite sva polja i pokušajte ponovo.";
                include('view/unos_klijent_pravno.php');
         } 
             else {
                 $klijent= new Klijent($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax);
                 
                 KlijentDB::setPravno($klijent);
                 
                  header("Location: .?action=prikaz_prvano");
                 }  
             break;
             
         case 'forma_unos_klijenta_fizicko':
              $error='';
             include ('view/unos_klijent_fizicko.php');
             
             break;
         
         case 'unos_klijent_fizicko':
             
             $preduzece=1;
             $PIB=null;
             $ime= $_POST['ime'];
             $prezime=$_POST['prezime'];
             $naziv=null;
             $adresa= $_POST['adresa'];
             $telefon= $_POST['telefon'];
             $email= $_POST['email'];
             $fax=null;

                 if (empty($ime) || empty($prezime)|| empty($adresa)|| empty($telefon)|| empty($email))  {
            $error = "Pogrešno uneti podaci. Proverite sva polja i pokušajte ponovo.";
                include('view/unos_klijent_fizicko.php');
         } 
             else {
                 $klijent= new Klijent($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax);
                 
                 KlijentDB::setFizicko($klijent);
                 
                  header("Location: .?action=prikaz_fizicko");
                 }  
             break;
             
          case 'pretraga_klijenata_ispis':
             $preduzece=1;
             $PIB=$_POST['PIB'];
             $ime= $_POST['ime'];
             $prezime=$_POST['prezime'];
             $naziv=$_POST['naziv'];
             $adresa= $_POST['adresa'];
             $telefon= $_POST['telefon'];
             $email= $_POST['email'];
             $fax=$_POST['fax'];  
            
            $klijent= new Klijent($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax);
           
           $klijent_ispis= KlijentDB::getKlijentPretraga($klijent);
          if($klijent_ispis=='nije upisan objekat') {
              $error='Nema klijenata pod tim kriterijumima pretrage';
               include('view/pretraga_klijent.php');
          }else {
        
            include('view/lista_klijent.php');
          }
          break;
  ////////////////////////////////////RADNI NALOG//////////////////////////////////////////////////////       
         case 'radni_nalog_unos_pravno':
             $preduzece=1;
             $id=$_POST['id_klijent'];
             $PIB=$_POST['PIB'];
             $naziv=$_POST['naziv'];
             $adresa=$_POST['adresa'];
             $telefon=$_POST['telefon'];
             $email=$_POST['email'];
             $fax=$_POST['fax'];
            
             $ime=null;
             $prezime=null;
             $error='';
             $klijent= new Klijent($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax);
             $klijent->setIdklijent($id);
  
             $usluga_ispis=UslugaDB::getUsluga();
             $radnik_ispis=RadnikDB::getRadnik();
             
             include('view/radni_nalog_unos_pravno.php');
             break;
         
          case 'radni_nalog_unos_fizicko':
             $preduzece=1;
             $id=$_POST['id_klijent'];
             $ime=$_POST['ime'];
             $prezime=$_POST['prezime'];
             $adresa=$_POST['adresa'];
             $telefon=$_POST['telefon'];
             $email=$_POST['email'];
             $PIB=null;
             $naziv=null;
             $fax=null;
             $error='';
             $klijent= new Klijent($preduzece, $PIB, $naziv, $ime, $prezime, $adresa, $telefon, $email, $fax);
             $klijent->setIdklijent($id);
   
             $usluga_ispis=UslugaDB::getUsluga();
             $radnik_ispis=RadnikDB::getRadnik();
             
             include('view/radni_nalog_unos_fizicko.php');
             break;
         
         case 'unos_radninalog_klijent':
 
             $id_radnik=$_POST['izvrsilac'];
             $id_klijent=$_POST['id_klijent'];
             $Rad_id_radnik=$_POST['vodja'];
             $datum_zahteva=$_POST['datum_zahteva'];
             $pocetak_rada=$_POST['pocetak_rada'];
             $zahtevano=$_POST['zahtevano'];
             $uradjeno=$_POST['uradjeno'];
             $drugi_komentar=$_POST['drugi_komentar'];
             $broj_sati=$_POST['broj_sati'];
                      if (empty($id_radnik) || empty($Rad_id_radnik)|| empty($datum_zahteva)|| empty($pocetak_rada))  {
             $error = "Pogrešno uneti podaci. Proverite sva polja i pokušajte ponovo.";
                include('view/error.php');
         } 
             else {
             $radninalog=new Radninalog($id_radnik, $id_klijent, $Rad_id_radnik, $datum_zahteva, $pocetak_rada, $zahtevano, $uradjeno, $drugi_komentar, $broj_sati);
             
             RadninalogDB::setRadninalog($radninalog);
 
            $id_radninalog= RadninalogDB::getIDradninalog();

            if(!empty($_POST['usluga'])) {
            
                 $usluga=$_POST['usluga']; 
                    
               }else {
                   $error='Niste uneli uslugu';
                   include('view/error.php');
               }

            $b=count($usluga);
            $n=0;
            for($x=1; $x<=$b; $x++){
             VezaDB::setVeza($usluga[$n],$id_radninalog);
            $n++;
            }
         
            VezaDB::getCena($id_radninalog, $broj_sati);

            header("Location: .?action=prikaz_radni_nalog");
            }
            break;
  
      case 'prikaz_radni_nalog':
                 
            $radni_nalog_ispis= RadninalogDB::getRadninalog();
      
            include ('view/lista_radni_nalog.php');
            break;
      
      case 'pretraga_klijenata':
           $error='';
           include('view/pretraga_klijent.php');
           break;
       
       ////////////////////Login/////////////////////////////////////////////////////
             
      case 'provera_logovanja':
          
            $email = ($_POST['email']);
            $pass = ($_POST['password']);
            $password = md5($pass);
            
             $login= RadnikDB::loginRadnik($email,$password );
             
             if ($login== 'nema podudaranja u bazi') {
                $error='Pogrešno uneti podaci. Proverite sva polja i pokušajte ponovo.';
                 include('view/login.php');
             }else {
                  $_SESSION['id']= $login;
             
                
                 include('view/prva_strana.php');
             }
       break;
       case 'logout':
           
           session_destroy();
           $error='';
           include ('view/login.php');
           break;
   ///////////////////////Stampanje (PDF)////////////////////////////////////////////////
       
         case 'pdf_stampanje':
           $imeiprezime=$_POST['ime_i_prezime']; 
           $naziv=$_POST['naziv'];  
           $vodja_projekta=$_POST['vodja_projekta'];
           $izvrsilac=$_POST['izvrsilac'];
           $datum_zahteva=$_POST['datum_zahteva'];
           $pocetak_rada=$_POST['pocetak_rada'];
           $zahtevano=$_POST['zahtevano'];
           $uradjeno=$_POST['uradjeno'];
           $drugi_komentar=$_POST['drugi_komentar'];
           $broj_sati=$_POST['broj_sati'];
           $cenakonacna=$_POST['cena_konacna'];
           $usluge=$_POST['usluge'];
           $title = "Radni Nalog";
           
            $pdf = new MyPDF('P', 'mm', 'Letter');

            $pdf->addPage();
            $pdf->setFont("Times", '', 12);

            $pdf->cell(0, 0, "Naziv:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0,$naziv, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Ime i prezime:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $imeiprezime, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Vodja projekta:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0,$vodja_projekta, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Izvrislac projekta:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $izvrsilac, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Datum zahteva:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0,$datum_zahteva, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Pocetak rada:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $pocetak_rada, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Zahtevano:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $zahtevano, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Uradjeno:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $uradjeno, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Drugi komentar:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $drugi_komentar, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Broj sati:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $broj_sati, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Cena konacna:", 0, 0, 'L');
            $pdf->ln();
            $pdf->cell(140, 0, $cenakonacna, 0, 0, 'C');
            $pdf->ln(8);
            $pdf->cell(0, 0, "Usluge:", 0, 0, 'L');
            $pdf->ln(8);
            $i=1;
            foreach ($usluge as $ispis) {
    
                 $pdf->Cell(0,10,$i.'. '.$ispis,0,1);
                    $i++;
                        }

                $pdf->output();
                
            break;
 }
   
