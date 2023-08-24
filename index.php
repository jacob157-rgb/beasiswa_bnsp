<?php
include "./private/db_conn.php";
if (isset($_POST["signupSubmit"])) {
    if (!empty($_POST['registerName']) && !empty($_POST['registerEmail']) && !empty($_POST['registerPassword']) && !empty($_POST['registerRepeatPassword'])) {
        $registerName = htmlspecialchars($_POST['registerName']);
        $registerEmail = htmlspecialchars($_POST['registerEmail']);
        $registerPassword = htmlspecialchars($_POST['registerPassword']);
        $registerRepeatPassword = htmlspecialchars($_POST['registerRepeatPassword']);

        $query = "INSERT INTO users (name, email, password) VALUES ('$registerName', '$registerEmail', '$registerPassword')";
        if (mysqli_query($conn, $query)) {
            echo '<div class="alert alert-success" role="alert">Sign Up Success!</div>';
        } else {
            die('<div class="alert alert-danger" role="alert">Something Went Wrong!</div>');
        }
        mysqli_close($conn);
    }
}

if (isset($_POST["signinSubmit"])) {
    if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {
        $loginEmail = htmlspecialchars($_POST['loginEmail']);
        $loginPassword = htmlspecialchars($_POST['loginPassword']);

        session_start();
        $_SESSION["email"]=$loginEmail;

        $query = "SELECT * FROM users WHERE email = '$loginEmail' AND password = '$loginPassword'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            echo '<div class="alert alert-success" role="alert">Login Successful!</div>';
            echo '<script>window.location.href = "daftar.php";</script>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid Email or Password!</div>';
        }

        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="src/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container-md pt-5 col-lg">
        <div class="container col-lg-4 bg-light rounded-3 p-2 px-4 py-4 justify-content-center">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="signin">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup">Sign Up</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="signin">
                    <form action="" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName">Email</label>
                            <input type="email" id="loginemail" class="form-control" name="loginEmail" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" class="form-control" name="loginPassword" required />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-2" name="signinSubmit">Sign in</button>
                    </form>
                </div>
                <div class="signup d-none">
                    <form action="" method="post" name="signupForm" onsubmit="return validatePassword();">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerName">Name</label>
                            <input type="text" id="registerName" class="form-control" name="registerName" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerEmail">Email</label>
                            <input type="email" id="registerEmail" class="form-control" name="registerEmail" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerPassword">Password</label>
                            <input type="password" id="registerPassword" class="form-control" name="registerPassword" required />
                        </div>

                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                            <input type="password" id="registerRepeatPassword" class="form-control" name="registerRepeatPassword" required />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-2" name="signupSubmit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>