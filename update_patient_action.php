<!-- update_patient_action.php -->
<?php
include('inc/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE patients SET
                full_name = '$full_name',
                date_of_birth = '$date_of_birth',
                gender = '$gender',
                address = '$address',
                phone = '$phone',
                email = '$email'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: view_patient.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>