<?php
require_once"koneksivar.php"; // untuk memanggil dari halaman koneksivar.php

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

?>

