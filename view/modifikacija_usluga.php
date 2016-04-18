<?php include 'manu.php'; ?>

<div class="glavni">
    
    <h1>Modifikacija usluge</h1><br>
    
    
    
     <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifikacija_usluge" /> 
        <input type="hidden" name="id" value="<?php echo $usluga->getID(); ?>" />
        <table id="rounded-corner">
          <tr><th>Naziv usluge:</th><th><input type="input" name="usluga" value="<?php echo $usluga->getUsluga(); ?>" /></th></tr>
          <tr><th>Cena:</th><th><input type="input" name="cena"value="<?php echo $usluga->getCena(); ?>" /></th></tr>
          <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
       
        </form>

    </div>
<?php include 'footer.php'; ?>

