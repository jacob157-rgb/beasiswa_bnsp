<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php

if(isset($_POST['signupSubmit'])) {
    echo '<script<meta http-equiv="refresh" content="3; home.html"></script>';

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    // Proses login
    if ($_GET['action'] === 'signin' && isset($_POST['loginName'], $_POST['loginPassword'])) {
        $email = $_POST['loginName'];
        $password = $_POST['loginPassword'];

        // Lakukan validasi login, seperti memeriksa kredensial
        // ...

        echo "Sign In successful!";
    }
    // Proses pendaftaran
    if ($_GET['action'] === 'signup' && isset($_POST['registerName'], $_POST['registerEmail'], $_POST['registerPassword'], $_POST['registerRepeatPassword'])) {
        $name = $_POST['registerName'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];
        $rptpassword = $_POST['registerRepeatPassword'];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        require_once "db_conn.php";
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt){
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo '<div class="alert alert-success" role="alert">Sign Up Success!</div>';
            // echo '<script<meta http-equiv="refresh" content="3; home.html"></script>';
        }else{
            die('<div class="alert alert-danger" role="alert">Something Went Wrong!</div>');
        }
        // Lakukan proses pendaftaran, seperti menyimpan data ke basis data
        // ...
    }
}
?>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
