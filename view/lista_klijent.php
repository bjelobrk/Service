<?php include 'manu.php'; ?>
<div>
    <h1>Lista Klijenata</h1>
    
    <div class="glavni">
        
        
        <table id="rounded-corner">
            <tr>
                <th class="rounded-company">ID</th>
               
                
                <th>PIB</th>
                <th>Naziv</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>E-mail</th>
                <th >Fax</th>
                <th class="rounded-q4"></th>
             
            </tr>
             
              <?php $x=0; foreach ($klijent_ispis as $ispis):
                  if ($x%2==0){
                  $class="svetlo";
              }  else {
                  $class="tamno";
              } $x++;
                  ?>
            <tr class="<?php echo $class ?>">
                
                    
                    <td><?php echo $ispis->getIdklijent ();?></td>
                    <td><?php echo $ispis->getPIB();?></td>
                    <td><?php echo $ispis->getNaziv();?></td>
                    <td><?php echo $ispis->getIme();?></td>
                    <td><?php echo $ispis->getPrezime();?></td>
                    <td><?php echo $ispis->getAdresa();?></td>
                    <td><?php echo $ispis->getTelefon();?></td>
                    <td><?php echo $ispis->getEmail();?></td>
                    <td><?php echo $ispis->getFax();?></td>
                     <td><form action="." method="post">
                           <input type="hidden" name="action" value="radni_nalog_unos_fizicko"/>
                           <input type="hidden" name="id_klijent" value="<?php echo $ispis->getIdklijent();?>"/>
                           <input type="hidden" name="ime" value="<?php echo $ispis->getIme();?>"/>
                           <input type="hidden" name="prezime" value="<?php echo $ispis->getPrezime();?>"/>
                           <input type="hidden" name="adresa" value="<?php echo $ispis->getAdresa();?>"/>
                           <input type="hidden" name="telefon" value="<?php echo $ispis->getTelefon();?>"/>
                           <input type="hidden" name="email" value="<?php echo $ispis->getEmail();?>"/>
                           <input type="submit" value="radni nalog"/>
                       </form></td>
                    
              </tr>
               <?php endforeach; ?>
        </table>
   
  
    </div>
    
</div>

<?php include 'footer.php'; ?>