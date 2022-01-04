<?php 

require_once '../app/domain/Bus.php';

use app\domain\Bus\Bus as BusClass;

use app\domain\Kendaraan\Kendaraan as KendaraanClass;

class Bus extends Controller{
    private KendaraanClass $kendaraan;
    public function index(){
        if(isset($_SESSION["isLogin"])){
            $data['bus'] = $this->model('Bus_model')->getAllBus();
            $this->view('bus/index', $data);
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
        $this->kendaraan = new BusClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"],$data["air_bag"], $data["kapasitas_bagasi"], $data["ada_toilet"], $data["ada_wifi"]);

        $this->model('Bus_model')->tambahDataBus($this->kendaraan );

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/bus');
        exit;
    }

    public function hapus($id_bus) {
        $this->model("Bus_model")->hapusDataBus($id_bus);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        header('Location: ' . BASEURL . '/bus');
        exit;
    }

    public function ubah(){
        $data = $_POST;
        // untuk unformat rupiah
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan  = new BusClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["kapasitas_penumpang"], $data["tipe_ac"],$data["air_bag"], $data["kapasitas_bagasi"], $data["ada_toilet"], $data["ada_wifi"]);
        $this->model('Bus_model')->ubahDataBus($this->kendaraan , $_POST["id_bus"]);
        header('Location: ' . BASEURL . '/bus');
        exit;
    }

    public function getBusById(){
        echo json_encode($this->model('Bus_model')->getBusById($_POST['id_bus']));
    }
}