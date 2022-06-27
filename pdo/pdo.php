<?php

try {
  $pdo = new PDO("mysql:host=127.0.0.1;dbname=ssi_php_dasar_db", "root", "root");
} catch (PDOException $e) {
  die($e->getMessage());
}

$state = $pdo->prepare("SELECT * FROM mahasiswa");
$state->execute();

$mahasiswa = $state->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <ul>
    <?php foreach ($mahasiswa as $mhs) : ?>
      <li><?= $mhs->nama ?></li>
    <?php endforeach; ?>
  </ul>
</body>

</html>