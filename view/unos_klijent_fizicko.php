<?php include 'manu.php'; ?>
<div class="glavni">
   
    <h1>Dodaj klijenta (fizičko)</h1><br>
        
        <p><?php  echo $error; ?></p>

        <form action="index.php" method="post">
        <input type="hidden" name="action" value="unos_klijent_fizicko" />
        <table id="rounded-corner">
            
             <tr><th>Ime:</th><th><input type="input" name="ime" /></th></tr>
             <tr><th>Prezime:</th><th><input type="input" name="prezime" /></th></tr>
               <tr><th>Adresa:</th><th><input type="input" name="adresa" /></th></tr>
                 <tr><th>Telefon:</th><th><input type="input" name="telefon" /></th></tr>
                   <tr><th>E-mail:</th><th><input type="input" name="email" /></th></tr>
                  
             <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
     
        </form>


</div>
<?php include 'footer.php'; ?>