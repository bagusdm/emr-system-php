<!-- view_patient.php -->
<?php include('inc/header.php'); ?>
<?php include('inc/db.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Patient List</h2>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM patients";
            $result = $conn->query($sql);

            $counter = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$counter}</td> <!-- Displaying the counter value -->
                        <td>{$row['full_name']}</td>
                        <td>{$row['date_of_birth']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='edit_patient.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_patient.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                $counter++;
            }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center mb-3"> 
        <a href="index.php" class="btn btn-primary">Back to Main Menu</a>
    </div>
</div>

<?php include('inc/footer.php'); ?>