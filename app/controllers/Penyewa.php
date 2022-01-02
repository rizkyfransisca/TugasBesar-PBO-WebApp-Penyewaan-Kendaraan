<?php 

require_once '../app/domain/Penyewa.php';
require_once '../app/domain/Admin.php';
require_once '../app/domain/Mobil.php';
require_once '../app/domain/Kendaraan.php';
require_once '../app/domain/Motor.php';
require_once '../app/domain/Truck.php';
require_once '../app/domain/Bus.php';

use app\domain\Penyewa\Penyewa as PenyewaClass;
use app\domain\Admin\Admin as AdminClass;
use app\domain\Mobil\Mobil as MobilClass;
use app\domain\Motor\Motor as MotorClass;
use app\domain\Bus\Bus as BusClass;
use app\domain\Truck\Truck as TruckClass;
use app\domain\Kendaraan\Kendaraan;

class Penyewa extends Controller{
    private Kendaraan $kendaraan;
    public function index(){
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        $data['motor'] = $this->model('Motor_model')->getAllMotor();
        $data['truck'] = $this->model('Truck_model')->getAllTruck();
        $data['bus'] = $this->model('Bus_model')->getAllBus();

        $data['penyewa_mobil'] = $this->model('Penyewa_model')->getAllPenyewaMobil();
        $data['penyewa_motor'] = $this->model('Penyewa_model')->getAllPenyewaMotor();
        $data['penyewa_bus'] = $this->model('Penyewa_model')->getAllPenyewaBus();
        $data['penyewa_truck'] = $this->model('Penyewa_model')->getAllPenyewaTruck();

        $data["merged"] = array_merge($data["penyewa_mobil"], $data["penyewa_motor"], $data["penyewa_truck"], $data["penyewa_bus"]);
        sort($data["merged"]);
        $this->view('penyewa/index',$data);
    }

    public function tambah(){
        $data = $_POST;
        $arr_exploded = explode(" ",$data["kendaraan_disewa"]);
        if($arr_exploded[1] == "mobil"){
            $mobil = $this->model('Mobil_model')->getMobilById($arr_exploded[0]);
            $this->kendaraan = new MobilClass($mobil["merk"], $mobil["warna"], $mobil["harga_sewa"], $mobil["tahun"], $mobil["transmisi"], $mobil["total_unit"], $mobil["kapasitas_penumpang"], $mobil["tipe_ac"], $mobil["isSunRoof"],$mobil["air_bag"], $mobil["cruise_control"], $mobil["kapasitas_bagasi"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Mobil_model')->sewaMobil($arr_exploded[0], $this->kendaraan);

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "motor"){
            $motor = $this->model('Motor_model')->getMotorById($arr_exploded[0]);
            $this->kendaraan = new MotorClass($motor["merk"], $motor["warna"], $motor["harga_sewa"], $motor["tahun"], $motor["transmisi"], $motor["total_unit"], $motor["isInjeksi"], $motor["idlingStopSystem"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Motor_model')->sewaMotor($arr_exploded[0], $this->kendaraan);

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "truck"){
            $truck = $this->model('Truck_model')->getTruckById($arr_exploded[0]);
            $this->kendaraan = new TruckClass($truck["merk"], $truck["warna"], $truck["harga_sewa"], $truck["tahun"], $truck["transmisi"], $truck["total_unit"], $truck["volume_muatan"], $truck["beban_maksimal"], $truck["jenis_truck"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Truck_model')->sewaTruck($arr_exploded[0], $this->kendaraan);

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "bus"){
            $bus = $this->model('Bus_model')->getBusById($arr_exploded[0]);
            $this->kendaraan = new BusClass($bus["merk"], $bus["warna"], $bus["harga_sewa"], $bus["tahun"], $bus["transmisi"], $bus["total_unit"], $bus["kapasitas_penumpang"], $bus["tipe_ac"],$bus["air_bag"], $bus["kapasitas_bagasi"], $bus["ada_toilet"], $bus["ada_wifi"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Bus_model')->sewaBus($arr_exploded[0], $this->kendaraan);

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }
    }

    public function ubah(){
        $data = $_POST;
        $arr_exploded = explode(" ",$data["kendaraan_disewa"]);
        $arr_exploded_lama = explode(" ",$data["kendaraan_lama"]);
        
        if($arr_exploded[1] == "mobil"){
            $mobil = $this->model('Mobil_model')->getMobilById($arr_exploded[0]);
            $this->kendaraan = new MobilClass($mobil["merk"], $mobil["warna"], $mobil["harga_sewa"], $mobil["tahun"], $mobil["transmisi"], $mobil["total_unit"], $mobil["kapasitas_penumpang"], $mobil["tipe_ac"], $mobil["isSunRoof"],$mobil["air_bag"], $mobil["cruise_control"], $mobil["kapasitas_bagasi"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Mobil_model')->sewaMobil($arr_exploded[0], $this->kendaraan);

            $this->model("Penyewa_model")->hapusDataPenyewa($arr_exploded_lama[1], $arr_exploded_lama[0]);

            if($arr_exploded_lama[1] == "mobil"){
                $data = $this->model('Mobil_model')->getMobilById($arr_exploded_lama[2]);
                $this->model('Mobil_model')->hapusKembalikanMobil($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "motor"){
                $data = $this->model('Motor_model')->getMotorById($arr_exploded_lama[2]);
                $this->model('Motor_model')->hapusKembalikanMotor($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "truck"){
                $data = $this->model('Truck_model')->getTruckById($arr_exploded_lama[2]);
                $this->model('Truck_model')->hapusKembalikanTruck($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "bus"){
                $data = $this->model('Bus_model')->getBusById($arr_exploded_lama[2]);
                $this->model('Bus_model')->hapusKembalikanBus($arr_exploded_lama[2], $data["total_unit"]);
            }

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "motor"){
            $motor = $this->model('Motor_model')->getMotorById($arr_exploded[0]);
            $this->kendaraan = new MotorClass($motor["merk"], $motor["warna"], $motor["harga_sewa"], $motor["tahun"], $motor["transmisi"], $motor["total_unit"], $motor["isInjeksi"], $motor["idlingStopSystem"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Motor_model')->sewaMotor($arr_exploded[0], $this->kendaraan);

            $this->model("Penyewa_model")->hapusDataPenyewa($arr_exploded_lama[1], $arr_exploded_lama[0]);

            if($arr_exploded_lama[1] == "mobil"){
                $data = $this->model('Mobil_model')->getMobilById($arr_exploded_lama[2]);
                $this->model('Mobil_model')->hapusKembalikanMobil($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "motor"){
                $data = $this->model('Motor_model')->getMotorById($arr_exploded_lama[2]);
                $this->model('Motor_model')->hapusKembalikanMotor($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "truck"){
                $data = $this->model('Truck_model')->getTruckById($arr_exploded_lama[2]);
                $this->model('Truck_model')->hapusKembalikanTruck($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "bus"){
                $data = $this->model('Bus_model')->getBusById($arr_exploded_lama[2]);
                $this->model('Bus_model')->hapusKembalikanBus($arr_exploded_lama[2], $data["total_unit"]);
            }

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "truck"){
            $truck = $this->model('Truck_model')->getTruckById($arr_exploded[0]);
            $this->kendaraan = new TruckClass($truck["merk"], $truck["warna"], $truck["harga_sewa"], $truck["tahun"], $truck["transmisi"], $truck["total_unit"], $truck["volume_muatan"], $truck["beban_maksimal"], $truck["jenis_truck"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Truck_model')->sewaTruck($arr_exploded[0], $this->kendaraan);

            $this->model("Penyewa_model")->hapusDataPenyewa($arr_exploded_lama[1], $arr_exploded_lama[0]);
            
            if($arr_exploded_lama[1] == "mobil"){
                $data = $this->model('Mobil_model')->getMobilById($arr_exploded_lama[2]);
                $this->model('Mobil_model')->hapusKembalikanMobil($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "motor"){
                $data = $this->model('Motor_model')->getMotorById($arr_exploded_lama[2]);
                $this->model('Motor_model')->hapusKembalikanMotor($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "truck"){
                $data = $this->model('Truck_model')->getTruckById($arr_exploded_lama[2]);
                $this->model('Truck_model')->hapusKembalikanTruck($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "bus"){
                $data = $this->model('Bus_model')->getBusById($arr_exploded_lama[2]);
                $this->model('Bus_model')->hapusKembalikanBus($arr_exploded_lama[2], $data["total_unit"]);
            }

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }elseif($arr_exploded[1] == "bus"){
            $bus = $this->model('Bus_model')->getBusById($arr_exploded[0]);
            $this->kendaraan = new BusClass($bus["merk"], $bus["warna"], $bus["harga_sewa"], $bus["tahun"], $bus["transmisi"], $bus["total_unit"], $bus["kapasitas_penumpang"], $bus["tipe_ac"],$bus["air_bag"], $bus["kapasitas_bagasi"], $bus["ada_toilet"], $bus["ada_wifi"]);
            $penyewa = new PenyewaClass($data["nama"], $this->kendaraan, $data["lama_sewa"], $data["total_biaya"], $data["no_telepon"], $data["alamat"], $data["no_ktp"]);
            $this->model('Penyewa_model')->tambahDataPenyewa($penyewa, $arr_exploded[0], $arr_exploded[1]);

            $this->model('Bus_model')->sewaBus($arr_exploded[0], $this->kendaraan);

            $this->model("Penyewa_model")->hapusDataPenyewa($arr_exploded_lama[1], $arr_exploded_lama[0]);

            if($arr_exploded_lama[1] == "mobil"){
                $data = $this->model('Mobil_model')->getMobilById($arr_exploded_lama[2]);
                $this->model('Mobil_model')->hapusKembalikanMobil($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "motor"){
                $data = $this->model('Motor_model')->getMotorById($arr_exploded_lama[2]);
                $this->model('Motor_model')->hapusKembalikanMotor($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "truck"){
                $data = $this->model('Truck_model')->getTruckById($arr_exploded_lama[2]);
                $this->model('Truck_model')->hapusKembalikanTruck($arr_exploded_lama[2], $data["total_unit"]);
            }elseif($arr_exploded_lama[1] == "bus"){
                $data = $this->model('Bus_model')->getBusById($arr_exploded_lama[2]);
                $this->model('Bus_model')->hapusKembalikanBus($arr_exploded_lama[2], $data["total_unit"]);
            }

            header('Location: ' . BASEURL . '/penyewa');
            exit;
        }

    }

    public function getPenyewaById(){
        echo json_encode($this->model('Penyewa_model')->getPenyewaById($_POST['id_penyewa'], $_POST['jenis_kendaraan']));
    }

    public function hapus($jenis_kendaraan, $id_penyewa) {
        if($jenis_kendaraan == "mobil"){
            $result = $this->model("Penyewa_model")->penyewaJoinKendaraan($jenis_kendaraan,$id_penyewa);
            $this->model('Mobil_model')->hapusKembalikanMobil($result["id_mobil"], $result["total_unit"]);
        }elseif($jenis_kendaraan == "motor"){
            $result = $this->model("Penyewa_model")->penyewaJoinKendaraan($jenis_kendaraan,$id_penyewa);
            $this->model('Motor_model')->hapusKembalikanMotor($result["id_motor"], $result["total_unit"]);
        }elseif($jenis_kendaraan == "truck"){
            $result = $this->model("Penyewa_model")->penyewaJoinKendaraan($jenis_kendaraan,$id_penyewa);
            $this->model('Truck_model')->hapusKembalikanTruck($result["id_truck"], $result["total_unit"]);
        }elseif($jenis_kendaraan == "bus"){
            $result = $this->model("Penyewa_model")->penyewaJoinKendaraan($jenis_kendaraan,$id_penyewa);
            $this->model('Bus_model')->hapusKembalikanBus($result["id_bus"], $result["total_unit"]);
        }
        $this->model("Penyewa_model")->hapusDataPenyewa($jenis_kendaraan, $id_penyewa);
        
        header('Location: ' . BASEURL . '/penyewa');
        exit;
    }

}

