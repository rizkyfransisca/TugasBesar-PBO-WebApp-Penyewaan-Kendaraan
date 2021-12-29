<?php 

require_once '../app/domain/Motor.php';

use app\domain\Motor\Motor as MotorClass;

class Motor extends Controller{
    public function index(){
        $data['motor'] = $this->model('Motor_model')->getAllMotor();
        echo json_encode($data);
    }

    public function tambah(){
        $data = $_POST;
        $motor = new MotorClass($data["merk"], $data["warna"], $data["harga_sewa"], $data["tahun"], $data["transmisi"], $data["total_unit"], $data["isInjeksi"], $data["idlingStopSystem"]);

        $this->model('Motor_model')->tambahDataMotor($motor);

        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menambahkan Data";
    }

    public function hapus($id_motor) {
        $this->model("Motor_model")->hapusDataMotor($id_motor);
        
        // INGAT KASI HEADER UNTUK REDIRECT -> AGAR TIDAK KELUAR WARNING
        echo "Berhasil Menghapus Data";
    }
}