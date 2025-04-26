<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
            <div class="col-md-6">
                <h2>Login</h2>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="signupEmail">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Confirm Password</label>
                        <input type="text" class="form-control" id="cnfpassword" name="cnfpassword" placeholder="Confirm your password">
                    </div>

                    <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                </form>

            </div>
            <p>Create account...? <a href="register.php">Signup</a></p>
        </div>
    </div>
</body>

</html>