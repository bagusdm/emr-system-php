<!-- delete_record.php -->
<?php
include('inc/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM medical_records WHERE record_id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_records.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>