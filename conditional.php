<?php

$if_result = "";
$switch_result = "";
$ternary_result = "";

if (100 != 50) {
  $if_result = "if not same 50";
}

switch (50) {
  case 50:
    $switch_result = "switch is 50";
    break;
}

$ternary_result = (100 == 100) ? "ternary same 100" : "ternary not same 100";

echo $if_result . PHP_EOL;
echo $switch_result . PHP_EOL;
echo $ternary_result . PHP_EOL;
