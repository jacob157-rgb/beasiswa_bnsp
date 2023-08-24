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
    $ipk = isset($_POST['ipk']) ? htmlspecialchars($_POST['ipk']) : ''; 
    $jenis_beasiswa = htmlspecialchars($_POST['jenis_beasiswa']);
    $status = isset($_POST['status']) ? $_POST['status'] : 'Belum'; 

    $ekstensiFail = array('pdf', 'docx');
    $berkas = $_FILES['berkas']['name'];
    $x = explode('.', $berkas);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['berkas']['size'];
    $file_tmp = $_FILES['berkas']['tmp_name'];

    if (in_array($ekstensi, $ekstensiFail) && $ukuran < 1044070) {
        $uploadPath = './src/upload/' . $berkas;
        if (move_uploaded_file($file_tmp, $uploadPath)) {
            $query = "INSERT INTO data_beasiswa VALUES ('$Nama', '$Email', '$noHp', '$semester', '$ipk', '$jenis_beasiswa', '$berkas', '$status')";
            if (mysqli_query($conn, $query)) {
                echo '<div class="alert alert-success" role="alert">Success!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Database error!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">File upload failed!</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Invalid file format or size!</div>';
    }

    mysqli_close($conn);
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
                        <input class="form-control" name="ipk" type="number" value="3.4" 
                            disabled>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Pilihan Beasiswa : </p>
                    </div>
                    <div class="col-8">
                        <select name="jenis_beasiswa" class="form-select" id="" required>
                            <option value="">Pilih Beasiswa</option>
                            <option value="Akademik">Akademik</option>
                            <option value="NonAkademik">Non Akademik</option>
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
                    </div>
                    <div class="col">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-secondary">Batal</button>
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