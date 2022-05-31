<?php
error_reporting (E_ALL &~E_NOTICE);
session_start();                // sempre prima di qualunque contenuto html ...

if (!isset($_SESSION['accessoPermesso'])) header('Location: login.php');
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Eliminazione elementi</title>
</head>

<body>
<hr />
<?php
require("menu.php");
?>
<hr />

<h2>eliminazione</h2>

<?php
if (!$_SESSION['carrello']) {
   echo "<p> - carrello vuoto - </p>";
} else {
   if ( !$_POST['eliminandi']) {
      echo "<p>seleziona quel che vuoi eliminare dal carrello:</p>";
   }
   else { 
     foreach ($_POST['eliminandi'] as $k=>$indiceDaEliminare)
       unset($_SESSION['carrello'][$indiceDaEliminare]);
   }
}
?>



<form action="<?php $_SERVER['PHP_SELF']?>"  method="post" >

<table>
<tr>
 <td width="35%">
<p style="margin-bottom: 15%">
<input type="reset" name="annulla" value="Annulla le selezioni"/>
</p>
<p style="margin-top: 15%">
<input type="submit" name="Cancella i selezionati" value="Cancella i selezionati"/>
</p>
 </td>

 <td>
  <?php
   foreach ($_SESSION['carrello'] as $k=>$v)
     echo "<input type=\"checkbox\" name=\"eliminandi[]\" value=\"$k\" > $v<br />";
  ?>
 </td>
</tr>
</table>

</form>


<table style="display:none">
<tr>
<td width="50%">
<?php
echo "\$_SESSION:<br />";
foreach ($_SESSION as $k=>$v)
  echo "[$k] $v<br />";
?>
</td>
<td width="50%">
<?php
echo "\$_POST:<br />";
foreach ($_POST as $k=>$v)
  echo "[$k] $v<br />";
?>
</td>
</tr>
</table>

</body>
</html>
