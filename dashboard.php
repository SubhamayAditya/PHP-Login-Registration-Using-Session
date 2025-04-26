<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/dashboard.css">

</head>

<?php
include('connection.php');
session_start();

$idvalue = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];
$user_image = $_SESSION['user_image'];
?>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light px-4">
        <span class="navbar-brand mb-0 h4">Hi! <strong><?php echo htmlspecialchars($user_name); ?></strong></span>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>

    <!-- Dashboard Card -->
    <div class="card dashboard-card">
        <img class="card-img-top" src="./uploads/<?php echo htmlspecialchars($user_image); ?>" alt="User Image">
        <div class="card-body text-center">
            <h5 class="card-title mb-2"><?php echo htmlspecialchars($user_name); ?></h5>
            <p class="card-text text-muted mb-2">Welcome to your dashboard!</p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
            <p class="card-text"><strong>User ID:</strong> <?php echo htmlspecialchars($idvalue); ?></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>