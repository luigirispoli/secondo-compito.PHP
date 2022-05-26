<?php
$db_name = "LWndb";
$LWuser_table_name = "LWuser";
$LWticket_table_name = "LWticket";
$LWabbonamenti_table_name = "LWabbonamenti";
$LWstreaming_table_name = "LWstreaming";

$mysqliConnection = new mysqli("localhost", "lweb36", "lweb36", $db_name);
if (mysqli_connect_errno($mysqliConnection)) {
    printf("Abbiamo problemi con la connessione al db: %s\n", mysqli_connect_error($mysqliConnection));
    exit();
}
?>
