<?php
 class Rumah {
  public $warna;
  // public $jumlahKamar;
  public $alamat;

  public function __construct($warnaAwal, $alamatAwal)
  {
    $this->warna = $warnaAwal;
    // $this->jumlahKamar = $kamarAwal;
    $this->alamat = $alamatAwal;
  }
 }

 function pasangListrik(Rumah $dataRumah) {
  return "Listrik sedang sipasang di rumah ". $dataRumah->warna;
      " yang beralamat di ". $dataRumah->alamat;
 }

  $rumahSaya = new Rumah("Biru", "Jln.Merdeka No.10");

  echo pasangListrik($rumahSaya);
  echo "<br>";

  $teksBiasa = "Ini cuma string";

?>
