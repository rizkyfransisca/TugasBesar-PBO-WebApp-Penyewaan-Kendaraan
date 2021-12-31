<?php 

require_once '../app/domain/Motor.php';

use app\domain\Motor\Motor as MotorClass;

use app\domain\Kendaraan\Kendaraan as KendaraanClass;

class Motor extends Controller{
    private KendaraanClass $kendaraan;
    public function index(){
        $data['motor'] = $this->model('Motor_model')->getAllMotor();
        $this->view('motor/index', $data);
    }

    public function tambah(){
        $data = $_POST;
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan  = new MotorClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["isInjeksi"], $data["idlingStopSystem"]);

        $this->model('Motor_model')->tambahDataMotor($this->kendaraan );

        header('Location: ' . BASEURL . '/motor');
        exit;
    }

    public function hapus($id_motor) {
        $this->model("Motor_model")->hapusDataMotor($id_motor);
        
        header('Location: ' . BASEURL . '/motor');
        exit;
    }

    public function ubah(){
        $data = $_POST;
        // untuk unformat rupiah
        $data["harga_sewa"] = str_replace(".","",$data["harga_sewa"]);
        $data["harga_sewa"] = str_replace("Rp","",$data["harga_sewa"]);
        $this->kendaraan  = new MotorClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["isInjeksi"], $data["idlingStopSystem"]);
        $this->model('Motor_model')->ubahDataMotor($this->kendaraan , $_POST["id_motor"]);
        header('Location: ' . BASEURL . '/motor');
        exit;
    }

    public function getMotorById(){
        echo json_encode($this->model('Motor_model')->getMotorById($_POST['id_motor']));
    }
}