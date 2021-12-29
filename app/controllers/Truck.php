<?php 

require_once '../app/domain/Truck.php';

use app\domain\Truck\Truck as TruckClass;

class Truck extends Controller{
    public function index(){
        $data['truck'] = $this->model('Truck_model')->getAllTruck();
        echo json_encode($data);
    }

    public function tambah(){
        $data = $_POST;
        $truck = new TruckClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["beban_maksimal"], $data["beban_maksimal"], $data["jenis_truck"]);

        $this->model('Truck_model')->tambahDataTruck($truck);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menambahkan Data";
    }

    public function hapus($id_truck) {
        $this->model("Truck_model")->hapusDataTruck($id_truck);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menghapus Data";
    }
}