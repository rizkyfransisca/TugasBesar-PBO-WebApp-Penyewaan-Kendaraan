<?php 

require_once '../app/domain/Admin.php';

use app\domain\Admin\Admin as AdminClass;

class Admin extends Controller{
    public function index(){
        if(isset($_SESSION["isLogin"])){
            if($this->model("Motor_model")->totalUnitMotor()["total_unit_motor"]  == null){
                $data["total_motor"]["total_unit_motor"] = 0;
            }else{
                $data["total_motor"] = $this->model("Motor_model")->totalUnitMotor();
            }
    
            if($this->model("Bus_model")->totalUnitBus()["total_unit_bus"] == null){
                $data["total_bus"]["total_unit_bus"] = 0;
            }else{
                $data["total_bus"] = $this->model("Bus_model")->totalUnitBus();
            }
    
            if($this->model("Mobil_model")->totalUnitMobil()["total_unit_mobil"] == null){
                $data["total_mobil"]["total_unit_mobil"] = 0;
            }else{
                $data["total_mobil"] = $this->model("Mobil_model")->totalUnitMobil();
            }
    
            if($this->model("Truck_model")->totalUnitTruck()["total_unit_truck"] == null){
                $data["total_truck"]["total_unit_truck"] = 0;
            }else{
                $data["total_truck"] = $this->model("Truck_model")->totalUnitTruck();
            }
    
            $count_mobil = count($this->model('Penyewa_model')->getAllPenyewaMobil());
            $count_motor = count($this->model('Penyewa_model')->getAllPenyewaMotor());
            $count_bus = count($this->model('Penyewa_model')->getAllPenyewaBus());
            $count_truck = count($this->model('Penyewa_model')->getAllPenyewaTruck());
    
            $data["total_customer"] = $count_mobil +  $count_motor + $count_bus + $count_truck;
            $this->view('admin/index', $data);
        }else{
            Flasher::setFlashLogin('danger','Silahkan login terlebih dahulu!');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        
    }

    public function login(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        AdminClass::login($username, $password);
    }

    public function logout(){
        session_start();
        unset($_SESSION["isLogin"]);
        Flasher::setFlashLogin('success','Logout berhasil!');
        header('Location: ' . BASEURL . '/login');
    }
}