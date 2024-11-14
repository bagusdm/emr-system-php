<!-- add_record.php -->
<?php
$connection = new mysqli('localhost', 'root', '', 'emr_system');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM patients";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $patients = [];
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
} else {
    $patients = [];
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Tambah Rekam Medis</h2>
    <form action="save_record.php" method="POST">
        <div class="form-group">
            <label for="patient_id">Pilih Pasien:</label>
            <select id="patient_id" name="patient_id" class="form-control">
                <option value="">-- Pilih Pasien --</option>
                <?php
                foreach ($patients as $patient) {
                    echo "<option value='" . $patient['id'] . "'>" . $patient['full_name'] . "</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="doctor_id">Pilih Dokter:</label>
            <select id="doctor_id" name="doctor_id" class="form-control">
                <option value="">-- Pilih Dokter --</option>
                <?php
                // Ambil data dokter dari database
                $connection = new mysqli('localhost', 'root', '', 'emr_system');
                $sql = "SELECT * FROM doctors";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                }
                $connection->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis:</label>
            <input type="text" id="diagnosis" name="diagnosis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="treatment">Treatment:</label>
            <input type="text" id="treatment" name="treatment" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="created_at">Tanggal dan Waktu:</label>
            <input type="datetime-local" id="created_at" name="created_at" class="form-control" 
                value="<?php echo date('Y-m-d\TH:i', time()); ?>" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success mb-3">Submit</button>
            <div class="d-flex justify-content-center mb-3">
            <a href="index.php" class="btn btn-primary">Back to Main Menu</a>
        </div>
    </form>
</div>

<?php include('inc/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>