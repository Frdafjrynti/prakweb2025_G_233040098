<? php

// membuat constant menggunakan define()
   define("NAMA", "Hikmal Ryvaldi");

   // membuat constant menggunakan const
   const NRP = 2230400;

   echo NAMA;
   echo '<br>';
   echo NAMA;
   echo '<hr>';

   class CobaConstant {
    // define('COBA', 'BEBAS'); // ERROR
    const JURUSAN = 'Teknik Informatika';
   }

   echo CobaConstant::JURUSAN;
   echo '<hr>';

   echo "File ini ada di baris: " .__LINE__;
   echo "<br>";
   echo "File ini ada di direktori: ".__DIR__;
?>