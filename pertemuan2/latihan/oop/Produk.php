<?php

class Produk { 
    private $judul,
           $penulis, 
           $penerbit,
           $harga; 

    public function __construct($judul = 'judul', $penulis = 'penulis', $penerbit = 'penerbit', $harga = 'harga') { 
        $this->judul = $judul; 
        $this->penulis = $penulis; 
        $this->penerbit = $penerbit; 
        $this->harga = $harga; 
    }

    // bagian getter

    public function getJudul() {
      return $this->judul;
    }

    // pindahkan getharga()
    public function getHarga() {
      return $this-> harga;
    }

    // Method Umum 
    public function getLabel() { 
        return "$this->penulis, $this->penerbit"; 
    }

    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }

    // bagian setter
    public function setJudul($judulBaru) {
      $this->judul = $judulBaru;
    }
}

//  CHILD CLASS 1 
class Komik extends Produk { 
    public $jmlHalaman; 

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) { 
        // Panggil constructor parent 
        parent::__construct($judul, $penulis, $penerbit, $harga);
        // Set properti spesifik child 
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() { 
        // Ambil method getLabel() dari parent 
        $infoParent = parent:: getInfoProduk();
        return "Komik:  {$infoParent} - {$this->jmlHalaman} . Halaman";
    }
}

// // CHILD CLASS 2 
// class Game extends Produk { 
//     public $waktuMain; 

//     public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) { 
//         parent::__construct($judul, $penulis, $penerbit, $harga); 
//         $this->waktuMain = $waktuMain; 
//     }

//     public function getInfoProduk() { 
//         $infoParent = parent::getInfoProduk();
//         return "Game: {$infoParent} ~ {$this->waktuMain} Jam.";
//     }
// }

// --- BAGIAN OBJECT ---
    $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
// $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);
  
// Ini Setter 
// Property Private yang awalnya "Naruto" berubah menjadi "Goku"
  $produk1->setJudul("Goku");

// Ini Getter
  echo $produk1->getInfoProduk(); 
  echo "<br>"; 

  echo $produk1->getJudul();
// echo $produk2->getInfoProduk(); 
?>