<?php include 'manu.php'; ?>
<div class="glavni">
    <h1>Radni nalog</h1>
    
  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
       var pickerOpts1 = {

        dateFormat:"yy-m-d"
   };  
   pickerOpts2 = {

        dateFormat:"yy-m-d"
   };  
    $( "#datepicker" ).datepicker( pickerOpts1);
    
    $( "#datepicker1" ).datepicker(pickerOpts2);
    
  });
 
  </script>
  <?php echo $error ?>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="unos_radninalog_klijent" />
        <table id="rounded-corner">
            <tr><th>ID:</th><th><?php echo $klijent->getIdklijent();?><input type="hidden" name="id_klijent" value="<?php echo $klijent->getIdklijent();?>"/></th></tr>
            <tr><th>Ime:</th><th><?php echo $klijent->getIme();?><input type="hidden" name="ime" value="<?php echo $klijent->getIme();?>"/></th></tr>
             <tr><th>Prezime:</th><th><?php echo $klijent->getPrezime();?><input type="hidden" name="prezime" value="<?php echo $klijent->getPrezime();?>"/></th></tr>
               <tr><th>Adresa:</th><th><?php echo $klijent->getAdresa();?><input type="hidden" name="adresa" value="<?php echo $klijent->getAdresa();?>"/></th></tr>
                 <tr><th>Telefon:</th><th><?php echo $klijent->getTelefon();?><input type="hidden" name="telefon" value="<?php echo $klijent->getTelefon();?>"/></th></tr>
                   <tr><th>E-mail:</th><th><?php echo $klijent->getEmail();?><input type="hidden" name="email" value="<?php echo $klijent->getEmail();?>"/></th></tr>
                   <tr><th>Izaberi uslugu:</th><th></th></tr>
                   <tr><th colspan="2">
                       <?php  foreach ($usluga_ispis as $ispis):  ?>
                                
                           <input type="checkbox"  name="usluga[]" value="<?php echo $ispis->getID(); ?>"/><?php echo $ispis->getUsluga(); ?> <br/>
                              
                                   <?php endforeach; ?>
                           </th></tr>
                   <tr><th>Broj sati:</th><th><div class="styled">
                           <select name="broj_sati">
                               <option value="0">izaberite</option>
                               <option value="1">1h</option>
                               <option value="1.5">1.5h</option>
                               <option value="2">2h</option>
                               <option value="2.5">2.5h</option>
                               <option value="3">3h</option>
                           </select></div></th></tr>
                   <tr><th>Izaberi vodju projekta:</th><th><div class="styled">
                       
                           <select name="vodja"><option>izaberite</option><?php foreach ($radnik_ispis as $ispis):?>
                               <option value="<?php echo $ispis->getIdradnik(); ?>"><?php echo $ispis->getIme() ;echo ' ';echo $ispis->getPrezime(); ?></option>
                               <?php endforeach; ?>
                           </select></div></th></tr>
                    <tr><th>Izaberi izvrsioca projekta:</th><th><div class="styled">
                        
                           <select name="izvrsilac"><option>izaberite</option><?php foreach ($radnik_ispis as $ispis):?>
                               <option  value="<?php echo $ispis->getIdradnik(); ?>"><?php echo $ispis->getIme(); echo ' '; echo $ispis->getPrezime(); ?></option>
                               <?php endforeach; ?>
                           </select></div></th></tr>
                   <tr><th>Datum zahteva:</th><th><input type="input" id="datepicker" name="datum_zahteva"/></th></tr>
                   <tr><th>Pocetak rada:</th><th><input type="input" id="datepicker1" name="pocetak_rada"/></th></tr>
                   <tr><th>Zahtevano:</th><th><textarea name="zahtevano" cols="25" rows="5"></textarea></th></tr>
                   <tr><th>Uradjeno:</th><th><textarea name="uradjeno" cols="25" rows="5"></textarea></th></tr>
                   <tr><th>Drugi komentar:</th><th><textarea name="drugi_komentar" cols="25" rows="5"></textarea></th></tr>
                   
                   
                   
                  
             <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
       
        </form>
    
</div>
<?php include 'footer.php'; ?>