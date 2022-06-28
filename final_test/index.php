<?php

$conn = mysqli_connect("localhost", "root", "root", "ssi_php_dasar_db");
$mata_kuliah = [];
$point = [
  "A" => 4,
  "B" => 3,
  "C" => 2,
  "D" => 1,
  "E" => 0,
];
$jumlah_sks = 0;
$jumlah_sks_x_point = 0;
$ipk = 0;

$query = mysqli_query($conn, "SELECT * FROM mata_kuliah");

while ($data = mysqli_fetch_assoc($query)) {
  $mata_kuliah[] = $data;
}

if (isset($_POST["submit"])) {
  $nama_mata_kuliah = $_POST["nama_mata_kuliah"];
  $sks = $_POST["sks"];
  $grade = strtoupper($_POST["grade"]);

  $query = mysqli_query($conn, "INSERT INTO mata_kuliah VALUES(null, '$nama_mata_kuliah', '$sks', '$grade')");

  if (mysqli_affected_rows($conn)) {
    echo "<script>alert('berhasil memasukkan data')</script>";
  } else {
    echo "<script>alert('gagal memasukkan data')</script>";
  }
}

foreach ($mata_kuliah as $mk) {
  $jumlah_sks += $mk["sks"];
  $jumlah_sks_x_point += $mk["sks"] * $point[$mk["grade"]];
}

$ipk = $jumlah_sks_x_point / $jumlah_sks;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SSI PHP dasar final test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah" placeholder="masukkan nama mata kuliah...">
              </div>
              <div class="mb-3">
                <label for="sks" class="form-label">Sks</label>
                <input type="number" class="form-control" id="sks" name="sks" placeholder="masukkan jumlah sks...">
              </div>
              <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" placeholder="masukkan grade...">
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>

            <div class="d-flex justify-content-between my-4">
              <h4>Daftar Mata Kuliah</h4>
              <h4>IPK: <?= round($ipk, 2) ?></h4>
            </div>
            <ul class="list-group">
              <?php foreach ($mata_kuliah as $mk) : ?>
                <li class="list-group-item"><?= $mk['nama'] ?> - sks: <?= $mk['sks'] ?> - grade: <?= $mk['grade'] ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>