<?php
require 'config.php';
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Employee ID is required");
}
$id = $_GET['id'];


$sql = "DELETE FROM employees WHERE id = :id";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: index.php");
    exit();

} catch (PDOException $e) {
    echo "Error deleting record: " . $e->getMessage();
}
?>