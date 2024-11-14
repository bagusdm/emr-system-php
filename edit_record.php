<!-- edit_record.php -->
<?php
include('inc/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM medical_records WHERE record_id=$id";
    $result = $conn->query($sql);
    $record = $result->fetch_assoc();
}

$sql_patients = "SELECT * FROM patients";
$result_patients = $conn->query($sql_patients);
$patients = [];
if ($result_patients->num_rows > 0) {
    while ($row = $result_patients->fetch_assoc()) {
        $patients[] = $row;
    }
}

$sql_doctors = "SELECT * FROM doctors";
$result_doctors = $conn->query($sql_doctors);
$doctors = [];
if ($result_doctors->num_rows > 0) {
    while ($row = $result_doctors->fetch_assoc()) {
        $doctors[] = $row;
    }
}

?>

<?php include('inc/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Edit Medical Record</h2>

    <form action="update_record_action.php" method="POST">
        <input type="hidden" name="record_id" value="<?php echo $record['record_id']; ?>">

        <div class="form-group">
            <label for="patient_id">Pilih Pasien:</label>
            <select id="patient_id" name="patient_id" class="form-control" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?php echo $patient['id']; ?>" <?php echo ($record['patient_id'] == $patient['id']) ? 'selected' : ''; ?>>
                        <?php echo $patient['full_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Pilih Dokter:</label>
            <select id="doctor_id" name="doctor_id" class="form-control" required>
                <option value="">-- Pilih Dokter --</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?php echo $doctor['id']; ?>" <?php echo ($record['doctor_id'] == $doctor['id']) ? 'selected' : ''; ?>>
                        <?php echo $doctor['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis:</label>
            <input type="text" id="diagnosis" name="diagnosis" class="form-control" value="<?php echo $record['diagnosis']; ?>" required>
        </div>

        <div class="form-group">
            <label for="treatment">Treatment:</label>
            <input type="text" id="treatment" name="treatment" class="form-control" value="<?php echo $record['treatment']; ?>" required>
        </div>

        <div class="form-group">
            <label for="date_of_record">Tanggal dan Waktu:</label>
            <input type="datetime-local" id="date_of_record" name="date_of_record" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($record['date_of_record'])); ?>" required>
        </div>

        <button type="submit" class="btn btn-warning">Update Record</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>