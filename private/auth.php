<?php
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
    if ($_GET['action'] === 'signup' && isset($_POST['registerName'], $_POST['registerEmail'], $_POST['registerPassword'])) {
        $name = $_POST['registerName'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];
        $rptpassword = $_POST['registerRepeatPassword'];

        // Lakukan proses pendaftaran, seperti menyimpan data ke basis data
        // ...
        if ($password === $rptpassword){
            echo "Sign Up successful!";
        }
    }
}
?>
