<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("./stile.php");
session_start();
if (!isset($_SESSION['accessoPermesso'])) 
  header('Location: login.php');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Sito per comprare qualcosa che dobbiamo ancora decidere</title>
<?php echo $stile; ?>
</head>
<body>
<hr>
<?php
require("menu.php");
?>
<hr>
<h3>
Benvenuto <?php echo $_SESSION['userName'];?>.
</h3>
<p>
Ti sei collegato alle
<?php echo date('g:i a', $_SESSION['dataLogin']);?>.
</p>
<p>
Negozio online di non so cosa ancora.
</p>
<hr>
<?php
echo "\$_COOKIE: ";
print_r ($_COOKIE);
echo "<br />";
echo "\$_POST: ";
print_r ($_POST);
echo "<br />";
echo "\$_GET: ";
print_r ($_GET);
echo "<br />";
echo "\$_SESSION: ";
print_r ($_SESSION);
?>
</body>
</html>