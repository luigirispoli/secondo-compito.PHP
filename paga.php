<?php
error_reporting (E_ALL &~E_NOTICE);
session_start();

if (!isset($_SESSION['accessoPermesso'])) header('Location: login.php');
//if (!$_SESSION['carrello']) session_register("carrello");

require_once("./connessione.php");
require_once("./stile.php");


$_SESSION['sommeDaPagare']=0;
$output="<h3>Gentile ";
$output.= $_SESSION['username'];

if (!$_SESSION['carrello']) {
   $output.= " il tuo carrello è vuoto riempilo e torna qui... \n";
} else {
    $output.=", stai per acquistare i seguenti articoli:</h3>\n";
    $output.="<table>\n";

    foreach ($_SESSION['carrello'] as $k=>$v) {
      $output.="<tr>\n<td>$v</td>\n";

      //prezzo articoli
       $sql1 = "SELECT *
              FROM $LWticket_table_name
              WHERE partita = \"$v\"
       ";
       $sql2 = "SELECT *
              FROM $LWabbonamenti_table_name
              WHERE squadra = \"$v\"
       ";
       $sql3 = "SELECT *
              FROM $LWstreaming_table_name
              WHERE partita = \"$v\"
       ";

       if (!$result = mysqli_query($mysqliConnection, $sql1)) {
             printf("Can't execute ticket select query.\n");
             exit();
       }
       $row1= mysqli_fetch_array($result); 
	   
       if (!$result = mysqli_query($mysqliConnection, $sql2)) {
             printf("Can't execute abbonamenti select query.\n");
             exit();
       }
       $row2= mysqli_fetch_array($result); 
	   
       if (!$result = mysqli_query($mysqliConnection, $sql3)) {
             printf("Can't execute streaming select query.\n");
             exit();
       }
       $row3= mysqli_fetch_array($result);
       
      $output.="<td>(&euro; ";
      $output.= $row3['costoPartita'] + $row2['costoAbbonamento'] + $row1['costoTicket'];
      $output.=")</td>\n</tr>\n";

      $_SESSION['sommeDaPagare']+=$row3['costoPartita']+$row2['costoAbbonamento']+$row1['costoTicket'];
    }

    $output.="</table>\n<p>costo: {$_SESSION['sommeDaPagare']} &euro;</p>\n\n";
  }
            // fine outputTable
?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>sessione con carrello della spesa: pagamento</title>
</head>

<body>
<hr />
<?php
require("menu.php");
echo $stile;
?>
<hr />
<h2>Vuoi pagare??</h2>
<?php
echo $output;
?>

<form action="pagamenti.php"  method="post" >
<p><input type="submit" name="invioPagamento" value="Procedi con il pagamento"/></p>
</form>
</body>
</html>
