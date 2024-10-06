<?php
include 'config.php'; // Includi il file di configurazione

// Controlla se la richiesta è un POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d H:i:s'); // Ottieni la data corrente

    // Prepara la query per inserire il nuovo post
    $stmt = $conn->prepare("INSERT INTO posts (title, content, date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $date);

    // Esegui la query e controlla il risultato
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Post creato con successo']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Errore nella creazione del post']);
    }

    // Chiudi la dichiarazione e la connessione
    $stmt->close();
}
$conn->close();
?>
