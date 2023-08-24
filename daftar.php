<?php
$title = 'Daftar';
$page = 'daftar';
include_once("php/navbar.php");
include "./private/db_conn.php";
if (isset($_POST["daftar"])) {
    $Nama = htmlspecialchars($_POST['Nama']);
    $Email = htmlspecialchars($_POST['Email']);
    $noHp = htmlspecialchars($_POST['noHp']);
    $semester = htmlspecialchars($_POST['semester']);
    $ipk = $_POST['ipk']; 
    $jenis_beasiswa = htmlspecialchars($_POST['jenis_beasiswa']);
    
    $berkas_name = $_FILES['berkas']['name'];
    $berkas_tmp = $_FILES['berkas']['tmp_name'];
    $berkas_size = $_FILES['berkas']['size'];
    $berkas_error = $_FILES['berkas']['error'];

    if ($berkas_error === 0) {
        $berkas_destination = 'src/upload/' . $berkas_name;
        if (move_uploaded_file($berkas_tmp, $berkas_destination)) {
            $query = "INSERT INTO data_beasiswa (name, email, nohp, sem, ipk, jenis_beasiswa, berkas) VALUES ('$Nama', '$Email', '$noHp', '$semester', '$ipk', '$jenis_beasiswa', '$berkas_name')";
            if (mysqli_query($conn, $query)) {
                echo '<div class="alert alert-dismissible alert-success" role="alert">Sign Up Success!</div>';
            } else {
                die('<div class="alert alert-dismissible alert-danger" role="alert">Something Went Wrong!</div>');
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">File Upload Failed!</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error in File Upload: ' . $berkas_error . '</div>';
    }

    mysqli_close($conn);
}
session_start();
$Email = $_SESSION["email"];
$query = "SELECT ipk FROM users WHERE email = '$Email'";
$result = mysqli_query($conn, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $ipk = $row["ipk"];
}
?>


<main>
<form action="" method="post" enctype="multipart/form-data">
        <div class="container text-center pt-4">
            <h1 class="h1 pb-2">Daftar Beasiswa</h1>
            <div class="container col-lg-8 bg-light rounded-3 p-2 px-4 py-4 justify-content-center">
                <div class="row">
                    <div class="col text-start">
                        <p class="lead">Registrasi Beasiswa</p>
                    </div>
                    <hr class="hr hr-blurry" />
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Masukan Nama : </p>
                    </div>
                    <div class="col-8">
                        <input type="text" id="registerName" class="form-control" name="Nama" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Masukan Email : </p>
                    </div>
                    <div class="col-8">
                        <input type="email" id="Email" class="form-control" name="Email" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Nomor HP : </p>
                    </div>
                    <div class="col-8">
                        <input type="number" id="registerName" class="form-control" name="noHp" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Semester saat ini : </p>
                    </div>
                    <div class="col-8">
                        <select  name="semester" class="form-select" id="" required>
                            <option value="">Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>IPK Terakhir : </p>
                    </div>
                    <div class="col-8">
                        <input class="form-control" name="ipk" type="text" value="<?= $ipk;?>" readonly>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Pilihan Beasiswa : </p>
                    </div>
                    <div class="col-8">
                        <?php
                        if($ipk<3){
                            echo '<select name="jenis_beasiswa" class="form-select" id="" required disabled>
                            <option value="">Pilih Beasiswa</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Non_Akademik">Non Akademik</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Upload Berkas Syarat : </p>
                    </div>
                    <div class="col-8">
                        <input name="berkas" class="form-control" type="file" id="formFile" Accept="Application/Pdf" required disabled>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="daftar" class="btn btn-primary" disabled>Daftar</button>
                        </div>
                    </div>';
                        }else{
                            echo '<select name="jenis_beasiswa" class="form-select" id="" required>
                            <option value="">Pilih Beasiswa</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Non_Akademik">Non Akademik</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Upload Berkas Syarat : </p>
                    </div>
                    <div class="col-8">
                        <input name="berkas" class="form-control" type="file" id="formFile" Accept="Application/Pdf" required>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>';
                        }
                        ?>
                    <div class="col">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="reset" class="btn btn-secondary">Batal</button>
                        </div>
                    </div>
                </div>
                <hr class="hr hr-blurry" />
            </div>
        </div>
    </form>
</main>

<?php
include_once("php/footer.php")
?>