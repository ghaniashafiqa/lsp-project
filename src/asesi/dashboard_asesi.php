<?php 
    session_start();
    $email = $_SESSION['email'];
    $type = $_SESSION['type'] ==  "U";
    if(!isset($email) && !isset($type)){
        $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-danger" href="../logout.php" name="logout" id="logout">Log Out</a>
            </li>
    </ul>
</body>
</html>