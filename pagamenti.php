<?php
error_reporting (E_ALL &~E_NOTICE);
session_start();                

if (!isset($_SESSION['accessoPermesso']))
header('Location: login.php');

require_once("./connessione.php");
require_once("./stile.php");

$output="<h2>Gentile ";
$output.= $_SESSION['username'];

if (!$_SESSION['sommeDaPagare']) {
   $output.= " non hai nulla da pagare, fai un acquisto.\n";
} else {
  
         $output.=" hai speso {$_SESSION['sommeDaPagare']} &euro;</h3>\n";
         $tot=$_SESSION['sommeDaPagare']+$_SESSION['spesaTot'];
		 $output.="<p>(spesa totale effettuata in questa sessione: {$tot} &euro;)</p>\n";

// nel caso si rientri senza logout
       $_SESSION['carrello']=array();  
       $_SESSION['sommeDaPagare']=0;   
       $_SESSION['spesaTot']=$tot;   
}

?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Pagamento acquisti</title>
<?php echo $stile; ?>
</head>

<body>
<hr />
<?php
require("menu.php");
?>
<?php
echo $output;
?>

</body>
</html>