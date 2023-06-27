<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "hotel";
$con = mysqli_connect($hostname, $username, $password, $database_name);
if ($con) {
    //echo "Connected";
} else {
    echo "Not connected";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $staff_name = $_POST['staff_name'];

    // Insert the new staff member into the database
    $insert_query = mysqli_query($con, "INSERT INTO staff (staff_name) VALUES ('$staff_name')");
    if ($insert_query) {
        $staff_id = mysqli_insert_id($con);
        echo "Staff member created successfully. Staff ID: " . $staff_id;
        header("Location: index.php"); // Redirect to index page
        exit();
    } else {
        echo "Error creating staff member: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Staff</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>Create Staff</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a> <!-- Link to index.php -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservations</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container py-5">
        <h2 class="mb-4">Create New Staff Member</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="staff_name" class="form-label">Staff Name</label>
                <input type="text" class="form-control" id="staff_name" name="staff_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Staff</button>
        </form>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy; <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
