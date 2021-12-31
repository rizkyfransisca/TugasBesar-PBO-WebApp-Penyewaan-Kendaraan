<?php 

require_once '../app/domain/Mobil.php';

use app\domain\Mobil\Mobil as MobilClass;

use app\domain\Kendaraan\Kendaraan as KendaraanClass;

class Mobil extends Controller{
    private KendaraanClass $kendaraan;
    public function index(){
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        // echo json_encode($data)
        $this->view('mobil/index', $data);
    }

    public function tambah(){
        $data = $_POST;
        // untuk unformat rupiah
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan = new MobilClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"], $data["isSunRoof"],$data["air_bag"], $data["cruise_control"], $data["kapasitas_bagasi"]);

        $this->model('Mobil_model')->tambahDataMobil($this->kendaraan);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/mobil');
        exit;
    }

    public function hapus($id_mobil) {
        $this->model("Mobil_model")->hapusDataMobil($id_mobil);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/mobil');
        exit;
    }

    public function ubah(){
        $data = $_POST;
        // untuk unformat rupiah
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan = new MobilClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"], $data["isSunRoof"],$data["air_bag"], $data["cruise_control"], $data["kapasitas_bagasi"]);
        $this->model('Mobil_model')->ubahDataMobil($this->kendaraan , $_POST["id_mobil"]);
        header('Location: ' . BASEURL . '/mobil');
        exit;
    }

    public function getMobilById(){
        echo json_encode($this->model('Mobil_model')->getMobilById($_POST['id_mobil']));
    }
}