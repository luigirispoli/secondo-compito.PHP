<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
unset($_SESSION);
session_destroy();
?>
<?php
require_once("./stile.php");
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>logout</title>
<?php echo $stile; ?>
</head>

<body>
<h3>
<hr />
grazie della visita!
<hr />
<li><a href="mysql.ST.login.php" alt="aa">torna a login</a></li>
<hr />

</body>
</html>