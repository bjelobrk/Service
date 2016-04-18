<?php include 'manu.php'; ?>
<div class="glavni">
    <h1>Lista Radnih naloga</h1>
    
    <div>
        
        
        <table id="rounded-corner">
            <tr>
                <th class="rounded-company">ID radni nalog</th>
               
                
               
                <th>Naziv (Ime i Prezime)</th>
                <th>Vodja projekta</th>
                <th>Izvršilac projekta</th>
                <th>Datum zahteva</th>
                <th>Početak rada</th>
                <th>Zahtevano</th>
                <th>Urađeno</th>
                <th>Drugi komentar</th>
                <th>Broj sati</th>
                <th style="width: 170px;">Usluge</th>
                 
                <th>Cena konačna</th>
                <th class="rounded-q4">PDF</th>
            </tr>
              
              <?php $x=0; foreach ($radni_nalog_ispis as $ispis):
                  if ($x%2==0){
                  $class="svetlo";
              }  else {
                  $class="tamno";
              } $x++;
                  ?>
            <tr class="<?php echo $class ?>">
                
                    
                    <td><?php echo $ispis->getIdradninalog ();?></td>
                    <td><?php echo $ispis->getIdklijent ()->getNaziv(); echo $ispis->getIdklijent ()->getIme().' ';echo $ispis->getIdklijent ()->getPrezime(); ?></td>
                    <td><?php echo $ispis->getIdradnik()->getIme().' ';echo $ispis->getIdradnik()->getPrezime();?></td>
                    <td><?php echo $ispis->getIdradnikrad()->getIme().' '; echo $ispis->getIdradnikrad()->getPrezime();?></td>
                    <td><?php echo $ispis->getDatumzahteva ();?></td>
                    <td><?php echo $ispis->getPocetakrada ();?></td>
                    <td><?php echo $ispis->getZahtevano ();?></td>
                    <td><?php echo $ispis->getUradjeno ();?></td>
                    <td><?php echo $ispis->getDrugikomentar ();?></td>
                    <td><?php echo $ispis->getBrojsati().'h';?></td>
                    
                    <?php $veza_ispis=VezaDB::getVeza($ispis->getIdradninalog ());?>
                    
                    <td><ol><?php foreach ($veza_ispis as $ispis1):?>  <li><?php echo $ispis1->getUslugaobj()->getUsluga(); echo '='.$ispis1->getUslugaobj()->getCena().'din'.'<br>'; endforeach;?></li></ol></td> 
                    
                    <?php foreach ($veza_ispis as $ispis1):  ?>
                     
                     <td><?php echo $ispis1->getCenakonacna().'din';break;  ?> </td>  
                     <?php  endforeach; ?>
                      <td><form action="." method="post">
                           <input type="hidden" name="action" value="pdf_stampanje"/>
                           <input type="hidden" name="naziv" value="<?php echo $ispis->getIdklijent ()->getNaziv();?>"/>
                            <input type="hidden" name="ime_i_prezime" value="<?php echo $ispis->getIdklijent ()->getIme().' ';echo $ispis->getIdklijent ()->getPrezime();?>"/>
                             <input type="hidden" name="vodja_projekta" value="<?php echo $ispis->getIdradnik()->getIme().' ';echo $ispis->getIdradnik()->getPrezime();?>"/>
                              <input type="hidden" name="izvrsilac" value="<?php echo $ispis->getIdradnikrad()->getIme().' '; echo $ispis->getIdradnikrad()->getPrezime();?>"/>
                               <input type="hidden" name="datum_zahteva" value="<?php echo $ispis->getDatumzahteva ();?>"/>
                                <input type="hidden" name="pocetak_rada" value="<?php echo $ispis->getPocetakrada ();?>"/>
                                 <input type="hidden" name="zahtevano" value="<?php echo $ispis->getZahtevano ();?>"/>
                                 <input type="hidden" name="uradjeno" value="<?php echo $ispis->getUradjeno ();?>"/>
                                 <input type="hidden" name="drugi_komentar" value="<?php echo $ispis->getDrugikomentar ();?>"/>
                                 <input type="hidden" name="broj_sati" value="<?php echo $ispis->getBrojsati().'h';?>"/>
                                 <input type="hidden" name="cena_konacna" value="<?php foreach ($veza_ispis as $ispis1){echo $ispis1->getCenakonacna().'din';break;}?>"/>
                                 <?php foreach ($veza_ispis as $ispis1): ?>
                                 <input type="hidden" name="usluge[]" value="<?php echo  $ispis1->getUslugaobj()->getUsluga(); echo '='.$ispis1->getUslugaobj()->getCena().'din'.' ';?>"/>
                                <?php endforeach; ?>
                           <input type="submit" value="štampanje"/>
                       </form></td>
                    
              </tr>
               <?php  endforeach; ?>
             
        </table>

  
    </div>
    
</div>
<?php include 'footer.php'; ?>
