<?php

class About {
    public function index($nama = 'Romaito', $pekerjaan = 'Mahasiswa', $umur = 18)
    {
        echo "Halo nama saya $nama,saya adalah seorang $pekerjaan. Saya berumur $umur tahun.";
    }
    public function page()
    {
        echo 'About/page';
    }
}