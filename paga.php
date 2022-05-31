<?php
error_reporting (E_ALL &~E_NOTICE);
session_start();

if (!isset($_SESSION['accessoPermesso'])) header('Location: login.php');
//if (!$_SESSION['carrello']) session_register("carrello");

/* *********
dati sui nomi delle tabelle e del database, nonche' sulle
modalita' di connessione e di selezione del database: sono messi in un file a parte
*/
require_once("./connessione.php");
require_once("./stile.php");
/* ********* */



// costruzione parte dell'output con l'elenco e il costo degli articoli
//
$_SESSION['sommeDaPagare']=0;
$outputTable="<h3>Gentile cliente ";
$outputTable.= $_SESSION['userName'];

if (!$_SESSION['carrello']) {
   $outputTable.= " che ci fai qui con un carrello vuoto?\n";
} else {
    $outputTable.=", stai per acquistare i seguenti articoli:</h3>\n";
    $outputTable.="<table>\n";

    foreach ($_SESSION['carrello'] as $k=>$v) {
      $outputTable.="<tr>\n<td>$v</td>\n";

       // adesso serve il prezzo ...
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

       if (!$resultQ = mysqli_query($mysqliConnection, $sql1)) {
             printf("Dammit! Can't execute ticket select query.\n");
             exit();
       }
       $row1= mysqli_fetch_array($resultQ); 
       if (!$resultQ = mysqli_query($mysqliConnection, $sql2)) {
             printf("Dammit! Can't execute abbonamenti select query.\n");
             exit();
       }
       $row2= mysqli_fetch_array($resultQ); 
       
       if (!$resultQ = mysqli_query($mysqliConnection, $sql3)) {
             printf("Dammit! Can't execute streaming select query.\n");
             exit();
       }
       $row3= mysqli_fetch_array($resultQ);
       
      $outputTable.="<td>(&euro; ";
      $outputTable.= $row3['costoPartita']+$row2['costoAbbonamento']+$row1['costoTicket'];
      $outputTable.=")</td>\n</tr>\n";

      $_SESSION['sommeDaPagare']+=$row3['costoPartita']+$row2['costoAbbonamento']+$row1['costoTicket'];
    }

    $outputTable.="</table>\n<p>costo: {$_SESSION['sommeDaPagare']} &euro;</p>\n\n";
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
?>
<hr />
<h2>regolamento dei conti</h2>
<?php
echo $outputTable;
?>

<form action="zona.pagamenti.php"  method="post" >
<p><input type="submit" name="invioPagamento" value="Procedi con il pagamento"/></p>
<p><input type="submit" name="invioPagamento" value="Scappa di corsa"/></p>
</form>
</body>
</html>