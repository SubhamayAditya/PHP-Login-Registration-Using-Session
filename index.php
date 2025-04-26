<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/login.css">
</head>

<?php
include('connection.php');
session_start();

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnfpassword = $_POST['cnfpassword'];

    if ($cnfpassword == $password) {
        $query = "SELECT * FROM register WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['id']; // Store user id in session
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_image'] = $row['image'];

            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Invalid email');</script>";
        }
    } else {
        echo "<script>alert('Invalid password');</script>";
    }
}
?>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Login</h3>

                    <form method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>

                        <div class="mb-3">
                            <label for="cnfpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cnfpassword" name="cnfpassword" placeholder="Confirm your password" required>
                        </div>

                        <button type="submit" name="login_btn" class="btn btn-success">Login</button>

                        <div class="small-text">
                            <p class="mt-3 mb-0">Don't have an account? <a href="register.php" class="text-success">Sign up</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>