<?php include 'manu.php'; ?>
<div class="glavni">
    
    <h1>Dodaj uslugu</h1><br>
        
       <p><?php  echo $error; ?></p>

        <form action="index.php" method="post">
        <input type="hidden" name="action" value="unos_usluge" />
        <table id="rounded-corner">
             <tr><th>Usluga:</th><th><input type="input" name="usluga" /></th></tr>
             <tr><th>Cena:</th><th><input type="input" name="cena" /></th></tr>
             <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
        
        </form>
</div>
<?php include 'footer.php'; ?>