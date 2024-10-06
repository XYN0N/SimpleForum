<?php
$host = "host"; // Host del database
$port = "port"; // Porta del database
$db = "db name"; // Nome del database
$user = "db username"; // Username del database
$pass = "db password"; // Password del database

// Crea la connessione
$conn = new mysqli($host, $user, $pass, $db, $port);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
