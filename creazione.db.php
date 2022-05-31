<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
  <title>Creazione e popolamento del db LWdb</title>
 </head>

<body>
<h2> Creazione e popolamento del db LWdb, attendere presto saranno disponibili tutte le partite... <h2>

<?php
error_reporting(E_ALL &~E_NOTICE);

$db_name = "LWtdb";
$LWuser_table_name = "LWuser";
$LWticket_table_name = "LWticket";
$LWabbonamenti_table_name = "LWabbonamenti";
$LWstreaming_table_name = "LWstreaming";

$mysqliConnection = new mysqli("localhost", "lweb36", "lweb36");

if (mysqli_connect_errno()) {
    printf("Abbiamo rilevato problemi con la connessione al db: %s\n", mysqli_connect_error());
  }
  
$queryCreazioneDatabase = "CREATE DATABASE $db_name";  
   if ($result = mysqli_query($mysqliConnection, $queryCreazioneDatabase)) {
      printf("Database creato ...\n");
     }
   else {
    printf("Il db non è stato creato, ci sono dei problemi...\n");
     }
	 
$mysqliConnection->close();


$mysqliConnection = new mysqli("localhost", "lweb36", "lweb36", $db_name);
  if (mysqli_connect_errno()) {
    printf("Abbiamo rilevato problemi con la connessione al db: %s\n", mysqli_connect_error());
    exit();
	}
	
	
$sqlQuery = "CREATE TABLE if not exists $LWuser_table_name (";
$sqlQuery.= "userId int NOT NULL auto_increment, primary key (userId), ";
$sqlQuery.= "userName varchar (50) NOT NULL, ";
$sqlQuery.= "password varchar (20) NOT NULL, ";
$sqlQuery.= "numeroTicket int";  // Da verificare anche in login.php se è presente
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";
if ($result = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella utenti creata ...\n");
else {
    printf("La tabella non è stata creata, ci sono dei problemi...n");
  exit();
}

$sqlQuery = "CREATE TABLE if not exists $LWticket_table_name (";
$sqlQuery.= "ticketId int NOT NULL auto_increment, primary key (ticketId), ";
$sqlQuery.= "partita varchar (50) NOT NULL, ";
$sqlQuery.= "giorno varchar (20) NOT NULL, ";  
$sqlQuery.= "competizione varchar (40) NOT NULL, ";
$sqlQuery.= "costoTicket float";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";
if ($result = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella ticket creata ...\n");
else {
    printf("La tabella non è stata creata, ci sono dei problemi...n");
  exit();
}

$sqlQuery = "CREATE TABLE if not exists $LWabbonamenti_table_name (";
$sqlQuery.= "abbonamentoId int NOT NULL auto_increment, primary key (abbonamentoId), ";
$sqlQuery.= "squadra varchar (20) NOT NULL, ";
$sqlQuery.= "numPosto varchar(20) NOT NULL, "; 
$sqlQuery.= "classe int (5) NOT NULL, ";
$sqlQuery.= "costoAbbonamento float";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";
if ($result = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella abbonamenti creata ...\n");
else {
    printf("La tabella non è stata creata, ci sono dei problemi...n");
  exit();
}

$sqlQuery = "CREATE TABLE if not exists $LWstreaming_table_name (";
$sqlQuery.= "streamingId int NOT NULL auto_increment, primary key (streamingId), ";
$sqlQuery.= "partita varchar (50) NOT NULL, ";
$sqlQuery.= "giorno varchar (20) NOT NULL, ";  
$sqlQuery.= "piattaforma varchar (20) NOT NULL, ";
$sqlQuery.= "costoPartita float";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";
if ($result = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella ticket creata ...\n");
else {
    printf("La tabella non è stata creata, ci sono dei problemi...n");
  exit();
}

echo mysqli_errno($mysqliConnection);

// popolamento tabella utenti 

// UTENTE1 
$sql = "INSERT INTO $LWuser_table_name
	(username, password, numeroTicket) VALUES
	(\"utente1\", \"utente1\", \"0\")
	";
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento user eseguito ...\n");
   else {
       printf("Utente non inserito, ci sono dei problemi...\n");
       exit();
     }
	 
// UTENTE2 
$sql = "INSERT INTO $LWuser_table_name
	(username, password, numeroTicket) VALUES
	(\"utent2\", \"utente2\", \"0\")
	";
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento user eseguito ...\n");
   else {
       printf("Utente non inserito, ci sono dei problemi...\n");
       exit();
     }

// UTENTE3 
$sql = "INSERT INTO $LWuser_table_name
	(username, password, numeroTicket) VALUES
	(\"utente3\", \"utente3\", \"0\")
	";
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento user eseguito ...\n");
   else {
       printf("Utente non inserito, ci sono dei problemi...\n");
       exit();
     }
	 
// popolamento tabella ticket 

// PARTITA1 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Roma - Feyenoord\", \"25-05-2022\", \"Conference League\", \"150.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }

// PARTITA2 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Roma - Lazio\", \"10-05-2022\", \"Serie A\", \"90.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA3 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Inter - Milan\", \"11-05-2022\", \"Serie A\", \"90.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA4 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"	Napoli - Sassuolo\", \"15-06-2022\", \"Coppa Italia\", \"40.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }

// PARTITA5 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Liverpool - Real madrid\", \"27-05-2022\", \"Champions League\", \"250.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }

// PARTITA6 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Monza - Brescia\", \"22-05-2022\", \"Serie B\", \"20.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA7 
$sql = "INSERT INTO $LWticket_table_name
	(partita, giorno, competizione, costoTicket) VALUES
	(\"Chelsea - Liverpool\", \"17-05-2022\", \"Premier League\", \"85.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento ticket eseguito ...\n");
   else {
       printf("Ticket non inserito, ci sono dei problemi...\n");
       exit();
     }

// popolamento tabella abbonamenti 

// ABBONAMENTO1 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Roma\", \"A37\", \"1\", \"500.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// ABBONAMENTO2 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Fiorentina\", \"B29\", \"2\", \"318.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// ABBONAMENTO3 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Lazio\", \"C01\", \"3\", \"311.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// ABBONAMENTO4 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Inter\", \"D11\", \"1\", \"549.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }

// ABBONAMENTO5 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Milan\", \"F99\", \"2\", \"499.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// ABBONAMENTO6
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Napoli\", \"A30\", \"3\", \"325.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }

// ABBONAMENTO7 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Juventus\", \"E71\", \"1\", \"699.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// ABBONAMENTO8 
$sql = "INSERT INTO $LWabbonamenti_table_name
	(squadra, numPosto, classe, costoAbbonamento) VALUES
	(\"Atalanta\", \"E17\", \"2\", \"407.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento abbonamenti eseguito ...\n");
   else {
       printf("Abbonamento non inserita, ci sono dei problemi...\n");
       exit();
     }
	 

// popolamento tabella streaming 

// PARTITA STREAMING1 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Roma - Feyenoord\", \"25-05-2022\", \"Sky\", \"17.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING2 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Roma - Lazio\", \"10-05-2022\", \"Dazn\", \"12.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING3 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Milan - Torino\", \"18-05-2022\", \"Dazn\", \"7.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING4 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Inter - Bologna\", \"19-05-2022\", \"Sky\", \"6.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING5 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Liverpool - Real madrid\", \"27-05-2022\", \"Sky\", \"15.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING6 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Fiorentina - Empoli\", \"18-05-2022\", \"Dazn\", \"5.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
// PARTITA STREAMING7 
$sql = "INSERT INTO $LWstreaming_table_name
	(partita, giorno, piattaforma, costoPartita) VALUES
	(\"Roma - Spezia\", \"17-05-2022\", \"Dazn\", \"5.00\")
	";
echo $sql;
   if ($result = mysqli_query($mysqliConnection, $sql))
       printf("popolamento partite streaming eseguito ...\n");
   else {
       printf("Partita non inserita, ci sono dei problemi...\n");
       exit();
     }
	 
$mysqliConnection->close();
?>

</body>
</html>
