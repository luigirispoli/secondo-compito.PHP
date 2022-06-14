<?php
error_reporting (E_ALL &~E_NOTICE);
require_once("./stile.php");
session_start();  

if (!isset($_SESSION['accessoPermesso'])) header('Location: login.php');

$db_name = "LWtdb";
$LWabbonamenti_table_name = "LWabbonamenti";

//connessione al db
$mysqliConnection = new mysqli("localhost", "lwebn", "lwebn", $db_name);

if (mysqli_connect_errno()) {
    printf("Abbiamo rilevato problemi con la connessione al db: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT *
       FROM $LWabbonamenti_table_name 
	   ";
  if (!$result = mysqli_query($mysqliConnection, $sql)) {
      printf("Query non eseguita...\n");
     exit();
    }
	
$abbonamento="";
while ($utente = mysqli_fetch_array($result))
  $abbonamento.="<input type=\"radio\" name=\"selection\" value=\"{$utente['squadra']}\" />
           {$utente['squadra']} {$utente['numPosto']} {$utente['classe']} (&euro; {$utente['costoAbbonamento']})<br />\n";

//chiusura connessione al db
$mysqliConnection->close();

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head> 
  <title> Acquisto abbonamento  </title>
  <?php echo $stile; ?>
 </head>
 
 <body>
 
   <?php
    require("menu.php");
	?>

<h2>Scegli i tuoi abbonamenti</h2>
<p>Benvenuto <?php echo $_SESSION['username']?>, di seguito tutti gli abbonamnti disponibili:</p>

<form action="<?php $_SERVER['PHP_SELF']?>"  method="post" >

<table>
<tr>
 <td  style="width: 35%">
  <p style="margin-bottom: 10%">
   <input type="submit" name="invio" value="Aggiungi al carrello"/>
  </p>
  <p style="margin-top: 10%">
   <input type="submit" name="azzeraAcquisti" value="Svuota il carrello"/>
  </p>
 </td>

 <td>
  <?php echo $abbonamento;?>
 </td>
<tr>
</table>

</form>

<?php //da rivedere???
if ((!$_SESSION['carrello'] && !$_POST['selection']) || $_POST['azzeraAcquisti']) {
   $_SESSION['carrello']=array();
   echo "<p> <h4>!! carrello vuoto !! </h4> </p>";
} else {
   if ( $_POST['selection']) {
     echo "<p>inserisco".$_POST['selection']."</p>";
     $_SESSION['carrello'][] = $_POST['selection'];
   }
   echo "<p>IL TUO CARRELLO:</p>";
   echo "<ul>";
   foreach ($_SESSION['carrello'] as $k=>$v)
    echo "<li>[$k] $v</li>";
   echo "</ul>";
}
?>

<table style="display:none">
<table>
<tr>
<td width="50%">
<?php
echo "\$_SESSION:<br />";
echo"<p> attivare </p>";
foreach ($_SESSION as $k=>$v)
///  echo "[$k] $v<br />";
?>
</td>
<td width="50%">
<?php
echo "\$_POST:<br />";
echo"<p> attivare </p>";
foreach ($_POST as $k=>$v)
  //echo "[$k] $v<br />";
?>
</td>
</tr>
</table>
 </body>
</html>





