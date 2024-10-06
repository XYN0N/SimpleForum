<?php
include 'config.php'; // Includi il file di configurazione

// Esegui una query per recuperare tutti i post, inclusa la colonna "pinned"
$query = "SELECT id, title, content, date, pinned FROM posts ORDER BY date DESC";
$result = $conn->query($query);

$posts = array();

if ($result->num_rows > 0) {
    // Salva i post in un array
    while ($row = $result->fetch_assoc()) {
        $row['pinned'] = (bool)$row['pinned']; // Converte il valore "pinned" in booleano
        $posts[] = $row;
    }
}

// Restituisci i post in formato JSON
echo json_encode($posts);
$conn->close();
?>
