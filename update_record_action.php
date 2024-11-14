<!-- update_record_action.php -->
<?php
include('inc/db.php');

$record_id = $_POST['record_id'];
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];
$created_at = $_POST['date_of_record'];

$created_at = str_replace('T', ' ', $created_at); 
$created_at = $created_at . ":00"; 

$sql = "UPDATE medical_records SET
            diagnosis = '$diagnosis',
            treatment = '$treatment',
            date_of_record = '$created_at'
        WHERE record_id = $record_id";

if ($conn->query($sql) === TRUE) {
    echo "Medical record updated successfully.";
    header('Location: view_records.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>