<?php include 'manu.php'; ?>

<div class="glavni">
    <h1>Lista usluga</h1>
     
    <div>
        <table id="rounded-corner">
            
            <tr>
                <th class="rounded-company">ID</th>
                <th>Naziv Usluge</th>
                <th>Cena</th>
                <th>&nbsp;</th>
                <th class="rounded-q4">&nbsp;</th>
              </tr>
            
              <?php $x=0; foreach ($usluga_ispis as $ispis):
                  
              if ($x%2==0){
                  $class="svetlo";
              }  else {
                  $class="tamno";
              } $x++;
              ?>
              <tr class="<?php echo $class ?>">
                  <td><?php echo $ispis->getID();?></td>
                   <td><?php echo $ispis->getUsluga();?></td>
                   <td><?php echo $ispis->getCena().' din';?></td>
                   <td><form action="." method="post">
                           <input type="hidden" name="action" value="brisanje_usluge"/>
                           <input type="hidden" name="id_usluga" value="<?php echo $ispis->getID();?>"/>
                           <input type="submit" value="brisanje"/>
                       </form></td>
                       <td><form action="." method="post">
                           <input type="hidden" name="action" value="lista_modifikacija_usluge" />
                           <input type="hidden" name="id" value="<?php echo $ispis->getID(); ?>" />
                           <input type="hidden" name="usluga" value="<?php echo $ispis->getUsluga(); ?>" />
                           <input type="hidden" name="cena" value="<?php echo $ispis->getCena(); ?>" />
                           <input type="submit" value="Modifikacija" />
                </form></td>
              </tr>
                <?php endforeach; ?>
        </table>
        
     
        
    </div>
    </div>
<?php include 'footer.php'; ?>