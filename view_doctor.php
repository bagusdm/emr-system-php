<!-- view_doctor.php -->
<?php include('inc/header.php'); ?>
<?php include('inc/db.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Doctor List</h2>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM doctors";
            $result = $conn->query($sql);
            $counter = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$counter}</td> <!-- Displaying the counter value -->
                        <td>{$row['name']}</td>
                        <td>{$row['specialization']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
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