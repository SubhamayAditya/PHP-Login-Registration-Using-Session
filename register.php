<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .btn-success {
            width: 100%;
            border-radius: 0.5rem;
            padding: 0.75rem;
        }

        .small-text {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>

<?php
include('connection.php');
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnfpassword = $_POST['cnfpassword'];

    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imagePath = './uploads/' . $imageName;

    if ($cnfpassword == $password) {
        if (move_uploaded_file($imageTmp, $imagePath)) {
            $sql = "INSERT INTO register (name, email, password, image) VALUES ('$name','$email','$password','$imageName')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "<script>alert('Data inserted successfully');</script>";
            } else {
                echo "<script>alert('Data Not inserted');</script>";
            }
        } else {
            echo "<script>alert('Photo Not inserted');</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched');</script>";
    }
}
?>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Signup</h3>

                    <form method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>

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

                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <button type="submit" name="signup" class="btn btn-success">Signup</button>

                        <div class="small-text">
                            <p class="mt-3 mb-0">Already have an account? <a href="index.php" class="text-success">Login</a></p>
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