<?php 

require_once '../app/domain/Truck.php';

use app\domain\Truck\Truck as TruckClass;

use app\domain\Kendaraan\Kendaraan as KendaraanClass;

class Truck extends Controller{
    private KendaraanClass $kendaraan;
    public function index(){
        if(isset($_SESSION["isLogin"])){
            $data['truck'] = $this->model('Truck_model')->getAllTruck();
            $this->view('truck/index', $data);
        }else{
            Flasher::setFlashLogin('danger','Silahkan login terlebih dahulu!');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function tambah(){
        $data = $_POST;
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan = new TruckClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["volume_muatan"], $data["beban_maksimal"], $data["jenis_truck"]);

        $this->model('Truck_model')->tambahDataTruck($this->kendaraan);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/truck');
        exit;
    }

    public function hapus($id_truck) {
        $this->model("Truck_model")->hapusDataTruck($id_truck);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/truck');
        exit;
    }

    public function ubah(){
        $data = $_POST;
        // untuk unformat rupiah
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan = new TruckClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["volume_muatan"], $data["beban_maksimal"], $data["jenis_truck"]);
        $this->model('Truck_model')->ubahDataTruck($this->kendaraan, $_POST["id_truck"]);
        header('Location: ' . BASEURL . '/truck');
        exit;
    }

    public function getTruckById(){
        echo json_encode($this->model('Truck_model')->getTruckById($_POST['id_truck']));
    }
}