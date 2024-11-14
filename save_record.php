<?php
$connection = new mysqli('localhost', 'root', '', 'emr_system');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];
$created_at = $_POST['created_at'];

$sql = "INSERT INTO medical_records (patient_id, doctor_id, diagnosis, treatment, date_of_record)
        VALUES ('$patient_id', '$doctor_id', '$diagnosis', '$treatment', '$created_at')";

if ($connection->query($sql) === TRUE) {
    echo "Medical record added successfully.";
    header('Location: view_records.php');
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>