<?php
header('Content-Type: application/json');
require_once './db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = isset($_POST['client_id']) ? intval($_POST['client_id']) : 0;
    
    if ($client_id > 0) {
        // Use prepared statements for security to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM client_info WHERE client_id = ?");
        $stmt->bind_param("i", $client_id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(["status" => "success", "message" => "Record deleted successfully!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "No record found with that Primary Key."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Database execution error: " . $stmt->error]);
        }
        
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid Primary Key provided."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>
