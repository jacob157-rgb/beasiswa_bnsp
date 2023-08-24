<?php
$title = 'Daftar';
$page = 'daftar';
include_once("php/navbar.php");
include("private/db_conn.php");


$name = $_POST['beasiswaName'];
$email = $_POST['beasiswaEmail'];
$nohp = $_POST['beasiswaNoHP'];
$sem = $_POST['semester'];
$ipk = $_POST['ipk'];
$jenisBeasiswa = $_POST['jenisBeasiswa'];
$statusAjuan = 'Belum diverifikasi'; // Default status
$targetDir = "uploads/";
$berkasPath = $targetDir . basename($_FILES['berkas']['name']);
move_uploaded_file($_FILES['berkas']['tmp_name'], $berkasPath);

?>

<main>
<form action="" method="post">
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
                        <input type="text" id="beasiswaName" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Masukan Email : </p>
                    </div>
                    <div class="col-8">
                        <input type="email" id="beasiswaName" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Nomor HP : </p>
                    </div>
                    <div class="col-8">
                        <input type="number" id="beasiswaNoHP" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Semester saat ini : </p>
                    </div>
                    <div class="col-8">
                        <select class="form-select" id="semester" required>
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
                        <input class="form-control" id="ipk" type="number" placeholder="<?php echo $ipk; ?>" aria-label="Disabled input example"
                            disabled>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Pilihan Beasiswa : </p>
                    </div>
                    <div class="col-8">
                        <select class="form-select" id="jenisBeasiswa" required>
                            <option value="">Pilih Beasiswa</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Non Akademi">Non Akademik</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Upload Berkas Syarat : </p>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="file" id="formFile" required>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">Daftar</button>
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