<?php
$db_name = "db";
$user_table_name = "STuser";
$p1_table_name = "p1";
$p2_table_name = "p2";
$mysqliConnection = new mysqli("localhost", "lweb27", "lweb27", $db_name);
if (mysqli_connect_errno($mysqliConnection)) {
    printf("Abbiamo problemi con la connessione al db: %s\n", mysqli_connect_error($mysqliConnection));
    exit();
}
?>