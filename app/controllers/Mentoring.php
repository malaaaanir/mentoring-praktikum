<?php

class Mentoring extends Controller {
    public function index(){
        $data['title'] = 'Data Mentoring';
        $data['mentoring'] = $this->model('Mentoring_model')->tampil();
        
        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar');
        $this->view('mentoring/index', $data);
        $this->view('templates/footer');
    }
    public function modalTambah(){
        $data['dosenOptions'] = $this->model('Mentoring_model')->tampilDosen();
        $data['asistenOptions'] = $this->model('Mentoring_model')->tampilAsisten();
        $data['matakuliahOptions'] = $this->model('Mentoring_model')->tampilMatakuliah();
        $data['kelasOptions'] = $this->model('Mentoring_model')->tampilKelas();
        $data['ruanganOptions'] = $this->model('Mentoring_model')->tampilRuangan();
        $data['frekuensiOptions'] = $this->model('Mentoring_model')->tampilFrekuensi();


        $this->view('frekuensi/tambah_mentoring', $data);
    }
    public function tambah(){
        $data['dosenOptions'] = $this->model('Mentoring_model')->tampilDosen();
        $data['asistenOptions'] = $this->model('Mentoring_model')->tampilAsisten();
        $data['matakuliahOptions'] = $this->model('Mentoring_model')->tampilMatakuliah();
        $data['kelasOptions'] = $this->model('Mentoring_model')->tampilKelas();
        $data['ruanganOptions'] = $this->model('Mentoring_model')->tampilRuangan();
        $data['frekuensiOptions'] = $this->model('Mentoring_model')->tampilFrekuensi();

        $id_frekuensi = $this->model('Mentoring_model')->tambah($_POST);

        if($id_frekuensi){
            Flasher::setFlash('Data berhasil ditambahkan', '', 'success');
            header('Location: '.BASEURL. '/frekuensi/detail/' . $id_frekuensi);
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan', '', 'danger');
            header('Location: '.BASEURL. '/frekuensi/detail/' . $id_frekuensi);
            exit;
        }
    }
    // public function tambah() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $data = [
    //             'id_frekuensi' => $_POST['id_frekuensi'],
    //             'tanggal' => $_POST['tanggal'],
    //             'uraian_materi' => $_POST['uraian_materi'],
    //             'uraian_tugas' => $_POST['uraian_tugas'],
    //             'status_dosen' => $_POST['status_dosen'],
    //             'status_asisten1' => $_POST['status_asisten1'],
    //             'status_asisten2' => $_POST['status_asisten2'],
    //             'id_asisten_pengganti' => !empty($_POST['id_asisten_pengganti']) ? $_POST['id_asisten_pengganti'] : null
    //         ];
    
    //         $mentoringModel = $this->model('Mentoring_model'); 

    //         $result = $mentoringModel->tambah($data);
            
    //         $id_frekuensi = $this->model('Mentoring_model')->tambah($_POST);
    
    //         if ($result === 'Batas maksimum data mentoring untuk frekuensi ini sudah tercapai.') {
    //             $_SESSION['message'] = 'Batas maksimum data mentoring untuk frekuensi ini sudah tercapai.';
    //             header('Location: '.BASEURL. '/frekuensi/detail/' . $id_frekuensi);
    //         } else if ($result) {
    //             $_SESSION['message'] = 'Data mentoring berhasil ditambahkan.';
    //             header('Location: '.BASEURL. '/frekuensi/detail/' . $id_frekuensi);
    //         } else {
    //             $_SESSION['message'] = 'Terjadi kesalahan saat menambahkan data mentoring.';
    //             header('Location: '.BASEURL. '/frekuensi/detail/' . $id_frekuensi);
    //         }
    //     }
    // }    
    // public function tambah() {
    //     $id_frekuensi = $_POST['id_frekuensi'];
        
    //     $mentoringModel = $this->model('Mentoring_model');
    //     $jumlahMentoring = $mentoringModel->getCountByFrekuensi($id_frekuensi);

    //     $id_frekuensi2 = $this->model('Mentoring_model')->tambah($_POST);
        
    //     if ($jumlahMentoring >= 10) {
    //         $_SESSION['message'] = 'Batas maksimum data mentoring untuk frekuensi ini sudah tercapai.';
    //         header('Location: ' . BASEURL . '/frekuensi/detail/' . $id_frekuensi2);
    //         exit;
    //     }
        
    //     $data = [
    //         'id_frekuensi' => $id_frekuensi,
    //         'tanggal' => $_POST['tanggal'],
    //         'uraian_materi' => $_POST['uraian_materi'],
    //         'uraian_tugas' => $_POST['uraian_tugas'],
    //         'status_dosen' => $_POST['status_dosen'],
    //         'status_asisten1' => $_POST['status_asisten1'],
    //         'status_asisten2' => $_POST['status_asisten2'],
    //         'id_asisten_pengganti' => !empty($_POST['id_asisten_pengganti']) ? $_POST['id_asisten_pengganti'] : null
    //     ];
        
    //     $mentoringModel->tambah($data);
        
    //     $_SESSION['message'] = 'Data mentoring berhasil ditambahkan.';
    //     header('Location: ' . BASEURL . '/frekuensi/detail/' . $id_frekuensi2);
    //     exit;
    // }
    
    public function ubahModal(){
        $id = $_POST['id'];
        $data['dosenOptions'] = $this->model('Mentoring_model')->tampilDosen();
        $data['asistenOptions'] = $this->model('Mentoring_model')->tampilAsisten();
        $data['matakuliahOptions'] = $this->model('Mentoring_model')->tampilMatakuliah();
        $data['kelasOptions'] = $this->model('Mentoring_model')->tampilKelas();
        $data['ruanganOptions'] = $this->model('Mentoring_model')->tampilRuangan();
        $data['ubahdata'] = $this->model('Mentoring_model')->ubah($id);

        $this->view('frekuensi/ubah_mentoring', $data);
    }
    public function prosesUbah(){
        if($this->model('Mentoring_model')->prosesUbah($_POST) > 0){
            Flasher::setFlash(' berhasil diubah', '', 'success');
        }else{
            Flasher::setFlash(' tidak berhasil diubah', '', 'danger');
        }
        header('Location: '.BASEURL. '/mentoring');
        exit;
    }
    public function hapus($id){
        if($this->model('Mentoring_model')->prosesHapus($id)){
            Flasher::setFlash(' berhasil dihapus', '', 'success');
        }else{
            Flasher::setFlash(' tidak berhasil dihapus', '', 'danger');
        }
        header('Location: '.BASEURL. '/mentoring');
        exit;
    }
}
