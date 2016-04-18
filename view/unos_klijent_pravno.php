<?php include 'manu.php'; ?>
<div class="glavni">
    
    <h1>Dodaj klijenta (pravno)</h1><br>
        
       <p><?php  echo $error; ?></p>

        <form action="index.php" method="post">
        <input type="hidden" name="action" value="unos_klijent_pravno" />
        <table id="rounded-corner">
            
             <tr><th>PIB:</th><th><input type="input" name="PIB" /></th></tr>
             <tr><th>Naziv:</th><th><input type="input" name="naziv" /></th></tr>
               <tr><th>Adresa:</th><th><input type="input" name="adresa" /></th></tr>
                 <tr><th>Telefon:</th><th><input type="input" name="telefon" /></th></tr>
                   <tr><th>E-mail:</th><th><input type="input" name="email" /></th></tr>
                   <tr><th>Fax:</th><th><input type="input" name="fax" /></th></tr>
                <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
        
        </form>


</div>
<?php include 'footer.php'; ?>