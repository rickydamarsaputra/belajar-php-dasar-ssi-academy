<?php

$numbers = [1, 2, 3, 4, 5];

foreach ($numbers as $number) {
  echo $number . PHP_EOL;
}
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
    <?php foreach ($numbers as $number) : ?>
      <li><?= $number ?></li>
    <?php endforeach; ?>
  </ul>
</body>

</html>