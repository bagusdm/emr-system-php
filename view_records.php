<!-- view_records.php -->
<?php
include('inc/db.php');
include('inc/header.php');

$sql = "SELECT medical_records.record_id, patients.full_name AS patient_name, doctors.name AS doctor_name, 
               medical_records.diagnosis, medical_records.treatment, medical_records.date_of_record
        FROM medical_records
        JOIN patients ON medical_records.patient_id = patients.id
        JOIN doctors ON medical_records.doctor_id = doctors.id
        ORDER BY medical_records.record_id ASC"; 

$records = $conn->query($sql);

$counter = 1;
?>

<div class="container mt-5">
    <h2 class="text-center">Daftar Rekam Medis</h2>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
                <th>Waktu Pencatatan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $records->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['doctor_name']; ?></td>
                    <td><?php echo $row['diagnosis']; ?></td>
                    <td><?php echo $row['treatment']; ?></td>
                    <td><?php echo $row['date_of_record']; ?></td>
                    <td>
                        <a href="edit_record.php?id=<?php echo $row['record_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_record.php?id=<?php echo $row['record_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
        <div class="d-flex justify-content-center mb-3">
        <a href="index.php" class="btn btn-primary">Back to Main Menu</a>
    </div>
</div>

<?php include('inc/footer.php'); ?>