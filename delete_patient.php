<!-- delete_patient.php -->
<?php
include('inc/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM patients WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_patient.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>