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

session_start();
// echo "<pre>";
// print_r($_SESSION);

$idvalue = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];
$user_image = $_SESSION['user_image'];

// echo $user_name;
// echo " <br> welcome to dashboard";
?>

<body>

    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">hi! <strong><?php echo $user_name; ?></strong> </a>
        <a href="logout.php"><strong>Logout</strong></a>
    </nav>


    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="./uploads/<?php echo $user_image; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $user_name; ?></h5>welcome to dashboard
            <p class="card-text"><strong> <?php echo $user_email; ?></strong></p>
            <p class="card-text">User id : <strong> <?php echo $idvalue; ?></strong></p>

        </div>
    </div>

</body>