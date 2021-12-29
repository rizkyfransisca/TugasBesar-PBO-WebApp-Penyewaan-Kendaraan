<?php 

require_once '../app/domain/Mobil.php';

use app\domain\Mobil\Mobil as MobilClass;

class Mobil extends Controller{
    public function index(){
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        echo json_encode($data);
    }

    public function tambah(){
        $data = $_POST;
        $mobil = new MobilClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"], $data["isSunRoof"],$data["air_bag"], $data["cruise_control"], $data["kapasitas_bagasi"]);

        $this->model('Mobil_model')->tambahDataMobil($mobil);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menambahkan Data";
    }

    public function hapus($id_mobil) {
        $this->model("Mobil_model")->hapusDataMobil($id_mobil);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menghapus Data";
    }
}