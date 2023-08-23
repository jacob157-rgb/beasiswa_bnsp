<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="src/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title;?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-lg  justify-content-evenly">
                <a class="navbar-brand">
                    <img src="src/icon.png" alt="Logo" width="50" height="50"
                        class="d-inline-block align-text-center ms-2">
                    Pendaftaran Beasiswa
                </a>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a href="daftar.php" 
                        class="<?php if($page=="daftar"){
                            echo "nav-link text-dark active";}
                            else{echo "nav-link text-dark" ;}?>">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a href="hasil.php" 
                        class="<?php if($page=="hasil"){
                            echo "nav-link text-dark active";}
                            else{echo "nav-link text-dark" ;}?>">Hasil</a>

                    </li>
                </ul>
            </div>
        </nav>
    </header>