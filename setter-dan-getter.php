<?php

class Produk {
    // Properties
    private $judul,        // Property untuk menyimpan judul produk
           $penulis,      // Property untuk menyimpan nama penulis produk
           $penerbit,    // Property untuk menyimpan nama penerbit produk
           $harga,
           $diskon = 0;  

    // Constructor
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        // Menginisialisasi nilai properti saat objek dibuat
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method setter dan getter untuk properti judul
    public function setJudul($judul ){
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    // Method setter dan getter untuk properti penulis
    public function setPenulis($penulis ){
        $this->penulis = $penulis;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    // Method setter dan getter untuk properti penerbit
    public function setPenerbit($penerbit){
        $this->penerbit = $penerbit;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    // Method setter untuk properti harga
    public function setHarga($harga){
        $this->harga = $harga;
    }

    // Method untuk mengatur nilai diskon
    public function setDiskon($diskon){
        $this->diskon = $diskon; 
    }

    // Method untuk mendapatkan harga setelah diskon
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100 );
    }

    // Method untuk mendapatkan label penulis dan penerbit
    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    // Method untuk mendapatkan informasi lengkap produk
    public function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}  

// Kelas turunan dari Produk, yaitu untuk produk jenis Komik
class Komik extends Produk{
    public $jmlHalaman; // Property untuk menyimpan jumlah halaman komik

    // Constructor untuk kelas Komik, memanggil constructor dari kelas Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga); // Memanggil constructor dari kelas Produk
        $this->jmlHalaman = $jmlHalaman; // Menginisialisasi nilai property jmlHalaman
    }

    // Method untuk mendapatkan informasi lengkap produk jenis Komik
    public function getInfoProduk(){
        $str = "Komik : ".parent::getInfoProduk()." - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// Kelas turunan dari Produk, yaitu untuk produk jenis Game
class Game extends Produk{
    public $waktuMain; // Property untuk menyimpan estimasi waktu main game dalam jam

    // Constructor untuk kelas Game, memanggil constructor dari kelas Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis , $penerbit , $harga); // Memanggil constructor dari kelas Produk
        $this->waktuMain = $waktuMain; // Menginisialisasi nilai property waktuMain
    }

    // Method untuk mendapatkan informasi lengkap produk jenis Game
    public function getInfoProduk(){
        $str = "Game :  ".parent::getInfoProduk()." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

// Kelas untuk mencetak informasi produk
class CetakInfoProduk{ 
    // Method untuk mencetak informasi produk, menerima objek dari kelas Produk sebagai parameter
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Objek pertama dari kelas Komik
$produk1 = new Komik ("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
// Objek kedua dari kelas Game
$produk2 = new Game ("Uncharted", "Neil Druckmann", "Sony Computer", 250000,50);

// Menampilkan informasi produk pertama
echo $produk1->getInfoProduk();
echo "<br>";
// Menampilkan informasi produk kedua
echo $produk2->getInfoProduk();
echo "<hr>";

// Memberikan diskon pada produk kedua sebesar 50%
$produk2->setDiskon(50);
// Menampilkan harga produk kedua setelah diskon
echo $produk2->getHarga();
echo "<hr>";

$produk1->setPenulis("romaito"); //setter
echo $produk1->getPenulis();//getter

?>