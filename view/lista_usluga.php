<?php include 'manu.php'; ?>

<div class="glavni">
    <h1>Lista usluga</h1>
    
    <div>
        <table id="rounded-corner">
            <tr>
                <th class="rounded-company">ID</th>
                <th>Naziv Usluge</th>
                <th class="rounded-q4">Cena</th>
                
                
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
                   <td><?php echo $ispis->getCena().'din';?></td>
              </tr>
               <?php endforeach; ?>
        </table>

    </div>
    
</div>
<?php include 'footer.php'; ?>
