<?php

class About extends Controller{
    public function page() {
        $data['judul'] = 'halaman page';
        $this-> view('templates/header', $data);
        $this->view('about/page');
        $this-> view('templates/footer',);
    }


    public function index($nama = 'Nizaar', $pekerjaan ='mahasiswa', $umur = '22') {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'halaman about';
      
        $this-> view('templates/header', $data);
        $this->view('about/index', $data);
        $this-> view('templates/footer', );
    }
}
?>