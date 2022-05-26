<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


$db_name = "LWndb";
$LWuser_table_name = "LWuser";
$LWticket_table_name = "LWticket";
$LWabbonamenti_table_name = "LWabbonamenti";
$LWstreaming_table_name = "LWstreaming";

// connessione al db
$mysqliConnection = new mysqli("localhost", "lweb36", "lweb36", $db_name);

if (isset($_POST['invio']))         
  if (empty($_POST['username']) || empty($_POST['password']))
    echo "<p> <h3>Inserire i dati per accedere !!</h3> </p>";
  else{       
        $sql = "SELECT *
               FROM $LWuser_table_name
               WHERE username = \"{$_POST['username']}\" AND password =\"{$_POST['password']}\" ";
	
		if (!$result = mysqli_query($mysqliConnection, $sql)) {
        printf("Nessun risultato...\n");
        exit();
        }
	 
	 $utente = mysqli_fetch_array($result);  // utente1 per adesso solo un utente cioe utente1
     if ($utente) {  
       session_start();
       $_SESSION['username']=$_POST['username'];
       $_SESSION['dataLogin']=time();  // per adesso dopo da togliere???
       $_SESSION['idUtente']=$utente['userId'];
       $_SESSION['accessoPermesso']=1000;
       header('Location: inizio.php');    // pagina iniziale
       exit();
      }
      else
      echo "<p>Accesso negato!!!</p>";
  } 
?>

<?php
require_once("./stile.php");
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title> Accesso </title>
<?php echo $stile; ?>
</head>

<body>

 <div class="blocco">
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
   Username <br />
   <input type="text" name="username" size="20" />
   <br />
   Password <br />
   <input type="text" name="password" size="20" />
   <br />
  <div style="position:absolute; top:80%; left:24%;">
   <input type="submit" name="invio" value="accedi">
   <input type="reset" name="reset" value="annulla">
  </div>
 </div>
</form>

</body>
</html>
