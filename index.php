<!DOCTYPE html>
<html>

<head>
    <title>Hotel Reservation Homepage</title>
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

        <button type="button" class="btn btn-primary">
            <a href="form.php">Book Now!</a></button>
        <h3 class="mt-5">Latest Offers</h3>
        <ul>
            <li>Special discount: 20% off for weekend stays</li>
            <li>Free breakfast included with every booking</li>
            <li>Complimentary access to our spa and fitness center</li>
        </ul>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        &copy;
        <?php echo date("Y"); ?> Hotel Reservation. All rights reserved.
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>