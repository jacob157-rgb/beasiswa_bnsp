<?php
$title = 'Hasil';
$page = 'hasil';
include_once("php/navbar.php")
?>

<main>
<div class="container text-center pt-4">
<div class="container col-lg bg-light rounded-3 p-2 px-4 py-4 justify-content-center">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">No.HP</th>
      <th scope="col">Semester</th>
      <th scope="col">IPK</th>
      <th scope="col">Jenis Beasiswa</th>
      <th scope="col">Status Ajuan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once("private/db_conn.php");
    $query = mysqli_query($conn, "SELECT * FROM data_beasiswa ORDER BY id DESC");
    $no = 0;
    while($result = mysqli_fetch_array($query)){
    $no++;
    ?>
    <tr>
      <td><?=$no?></td>
      <td><?=$result["name"]?></td>
      <td><?=$result["email"]?></td>
      <td><?=$result["nohp"]?></td>
      <td><?=$result["sem"]?></td>
      <td><?=$result["ipk"]?></td>
      <td><?=$result["jenis_beasiswa"]?></td>
      <td><?=$result["status_ajuan"]?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
</div>
</main>

<?php
include_once("php/footer.php")
?>