<!-- add_patient_action.php -->
<?php
include('inc/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO patients (full_name, date_of_birth, gender, address, phone, email)
            VALUES ('$full_name', '$date_of_birth', '$gender', '$address', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_patient.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>