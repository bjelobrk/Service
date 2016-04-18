<!DOCTYPE html>
<html>
<head>
<title>Servis</title>
<meta charset="UTF-8">
<link rel='stylesheet' type='text/css' href='css/style.css' />
</head>
<body>

 <div class="glavni">
     <h1>Login</h1>
        <div>
            <br><br><br><?php echo $error; ?><br><br><br>                  
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="provera_logovanja" />
              <table id="rounded-corner">
             <tr><th>E-mail:</th><th><input type="email" name="email" /></th></tr>
             <tr><th>Password:</th><th><input type="password" name="password" /></th></tr>
             <tr><td></td><td><input type="submit" value="Submit" /></td></tr>
          
        </table>
         
            </form>
                            
        </div>
 </div>

<?php include 'footer.php'; ?>