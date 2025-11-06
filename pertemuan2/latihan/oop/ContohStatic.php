<?php

class ContohStatic {
  // property
  public static $angka = 1; 

  // method
  public static function hallo() {
    return 'Hallo'. self::$angka;
  }
}

echo ContohStatic::$angka;
echo "<br>";

echo ContohStatic::hallo();
?>