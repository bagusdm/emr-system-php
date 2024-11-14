<!-- index.php -->
<?php include('inc/header.php'); ?>

<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Welcome to the EMR System</h1>
        <p class="lead">Manage patient records, medical history, and doctors efficiently!</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="img/daftarp.png" class="card-img-top" alt="Add Patient">
                <div class="card-body">
                    <h5 class="card-title">Add Patient</h5>
                    <p class="card-text">Add new patient information to the system with ease.</p>
                    <a href="add_patient.php" class="btn btn-primary">Add Patient</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="img/patient.png" class="card-img-top" alt="Add Patient">
                <div class="card-body">
                    <h5 class="card-title">View Patients</h5>
                    <p class="card-text">View, manage, and update patient records.</p>
                    <a href="view_patient.php" class="btn btn-primary">View Patients</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="img/doctor.png" class="card-img-top" alt="Add Patient">
                <div class="card-body">
                    <h5 class="card-title">View Doctors</h5>
                    <p class="card-text">Access the list of doctors and their specialties.</p>
                    <a href="view_doctor.php" class="btn btn-primary">View Doctors</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="img/addmr.png" class="card-img-top" alt="Add Patient">
                <div class="card-body">
                    <h5 class="card-title">Add Medical Record</h5>
                    <p class="card-text">Record patient's diagnosis and treatment details.</p>
                    <a href="add_record.php" class="btn btn-success">Add Record</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="img/mr.png" class="card-img-top" alt="Add Patient">
                <div class="card-body">
                    <h5 class="card-title">View Medical Records</h5>
                    <p class="card-text">Review all medical records and history of patients.</p>
                    <a href="view_records.php" class="btn btn-success">View Records</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('inc/footer.php'); ?>