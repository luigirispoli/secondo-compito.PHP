<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['invio']))         
	
  if (empty($_POST['username']) || empty($_POST['password']))
    echo "<p> <h3>Inserire i dati per accedere !!</h3> </p>";
  else                               
    if ( ($_POST['username']=="utente1") && ($_POST['password']=="circo") ){
      session_start();
      $_SESSION['username']=$_POST['username']; 
      exit();
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
  <div style="position:absolute; top:75%; left:24%;">
   <input type="submit" name="invio" value="accedi">
   <input type="reset" name="reset" value="annulla">
  </div>
 </div>
</form>

</body>
</html>