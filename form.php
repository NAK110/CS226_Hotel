<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$database_name = "hotel";
$con = mysqli_connect($hostname, $username, $password, $database_name);
if ($con) {
    //echo "Connected";
} else {
    echo "Not connected";
}
//   ----Hi--


if (isset($_POST["button_save"])) {
    $latin_first_name = $_POST["latin_first_name"];
    $latin_last_name = $_POST["latin_last_name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone_num = $_POST["phone_num"];
    $nationality = $_POST["nationality"];
    $qry = mysqli_query($con, "INSERT INTO guest (latin_first_name, latin_last_name, gender, email, phone_num, nationality) VALUES (
        '$latin_first_name',
        '$latin_last_name',
        '$gender',
        '$email',
        '$phone_num',
        '$nationality'
    )");
    if ($qry) {
        $guest_id = mysqli_insert_id($con); // Get the auto-generated guest_id
        header("Location: reservation.php?guest_id=$guest_id"); // Redirect to reservation form with guest_id as parameter
        exit();
    } else {
        echo "Not inserted" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Guest Form Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>Hotel Reservation</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container py-5">
        <h2 class="mb-4">Welcome to our Hotel!</h2>
        <p>Book your stay with us today and enjoy a comfortable and memorable experience.</p>

        <h3 class="mt-5">Guest Information Form</h3>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="latin_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="latin_first_name" name="latin_first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="latin_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="latin_last_name" name="latin_last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_num" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_num" name="phone_num" required>
                    </div>
                    <div class="mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="button_save" class="btn btn-primary">Next</button>
        </form>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy;
        <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>