<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
            $sql = "insert into register ( name , email , password , image ) values ('$name','$email','$password','$imageName')";
            $result = mysqli_query($con, $sql);
            // print_r($result);
            if ($result) {
                echo "<script>alert('Data inserted sucessfuly');</script>";
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
            <div class="col-md-6">
                <h2>Signup</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="signupName">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
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
                    <div class="form-group">
                        <label for="signupPassword">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter your Image">
                    </div>
                    <button type="submit" name="signup" class="btn btn-success">Signup</button>
                </form>
            </div>
            <p>Already have account...? <a href="index.php">Login</a></p>
        </div>
    </div>
</body>

</html>