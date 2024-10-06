<?php
include 'config.php'; // Connessione al database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $postId = $data['id'];

    // Controlla se c'è un post già pinato
    $query = "SELECT id FROM posts WHERE pinned = 1 LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Se c'è già un post pinato, rimuovilo
        $pinnedPost = $result->fetch_assoc();
        $removePinQuery = "UPDATE posts SET pinned = 0 WHERE id = " . $pinnedPost['id'];
        $conn->query($removePinQuery);
    }

    // Ora pinna il post selezionato
    $pinQuery = "UPDATE posts SET pinned = 1 WHERE id = ?";
    $stmt = $conn->prepare($pinQuery);
    $stmt->bind_param("i", $postId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Errore nel pinnare il post.']);
    }
    $stmt->close();
}

$conn->close();
?>
