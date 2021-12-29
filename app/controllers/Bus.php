<?php 

require_once '../app/domain/Bus.php';

use app\domain\Bus\Bus as BusClass;

class Bus extends Controller{
    public function index(){
        $data['bus'] = $this->model('Bus_model')->getAllBus();
        echo json_encode($data);
    }

    public function tambah(){
        $data = $_POST;
        $bus = new BusClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"],$data["air_bag"], $data["kapasitas_bagasi"], $data["ada_toilet"], $data["ada_wifi"]);

        $this->model('Bus_model')->tambahDataBus($bus);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menambahkan Data";
    }

    public function hapus($id_bus) {
        $this->model("Bus_model")->hapusDataBus($id_bus);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menghapus Data";
    }
}