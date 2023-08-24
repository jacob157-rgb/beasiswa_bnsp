<?php
$title = 'Daftar';
$page = 'daftar';
include_once("php/navbar.php")
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
                        <input type="text" id="registerName" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Masukan Email : </p>
                    </div>
                    <div class="col-8">
                        <input type="email" id="Email" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Nomor HP : </p>
                    </div>
                    <div class="col-8">
                        <input type="number" id="registerName" class="form-control" name="registerName" required />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Semester saat ini : </p>
                    </div>
                    <div class="col-8">
                        <select class="form-select" id="" required>
                            <option value="">Pilih</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>IPK Terakhir : </p>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="number" placeholder="3.4" aria-label="Disabled input example"
                            disabled>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-start">
                        <p>Pilihan Beasiswa : </p>
                    </div>
                    <div class="col-8">
                        <select class="form-select" id="" required>
                            <option value="">Pilih Beasiswa</option>
                            <option value="">Akademik</option>
                            <option value="">Non Akademik</option>
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