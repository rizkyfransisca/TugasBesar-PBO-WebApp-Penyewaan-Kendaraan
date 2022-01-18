<?php 

class Penyewa_model{
    private $table = 'penyewa';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPenyewaMobil(){
        $this->db->query("SELECT * FROM penyewa_mobil");
        return $this->db->resultSet();
    }

    public function getAllPenyewaMotor(){
        $this->db->query("SELECT * FROM penyewa_motor");
        return $this->db->resultSet();
    }

    public function getAllPenyewaTruck(){
        $this->db->query("SELECT * FROM penyewa_truck");
        return $this->db->resultSet();
    }

    public function getAllPenyewaBus(){
        $this->db->query("SELECT * FROM penyewa_bus");
        return $this->db->resultSet();
    }

    public function getPenyewaById($id_penyewa, $jenis_kendaraan)
    {
        if($jenis_kendaraan == "mobil"){
            $this->db->query('SELECT * FROM penyewa_mobil WHERE id_penyewa=:id_penyewa'); 
            $this->db->bind('id_penyewa',$id_penyewa); 
            return $this->db->single(); 
        }elseif($jenis_kendaraan == "motor"){
            $this->db->query('SELECT * FROM penyewa_motor WHERE id_penyewa=:id_penyewa'); 
            $this->db->bind('id_penyewa',$id_penyewa); 
            return $this->db->single(); 
        }elseif($jenis_kendaraan == "bus"){
            $this->db->query('SELECT * FROM penyewa_bus WHERE id_penyewa=:id_penyewa'); 
            $this->db->bind('id_penyewa',$id_penyewa); 
            return $this->db->single(); 
        }elseif($jenis_kendaraan == "truck"){
            $this->db->query('SELECT * FROM penyewa_truck WHERE id_penyewa=:id_penyewa'); 
            $this->db->bind('id_penyewa',$id_penyewa); 
            return $this->db->single(); 
        }
    }

    public function tambahDataPenyewa($data, $id_kendaraan, $tipe_kendaraan,$startDate, $endDate){
        date_default_timezone_set('Asia/Jakarta');
        if($tipe_kendaraan == "mobil"){
            $query = "INSERT INTO penyewa_mobil VALUES('', :nama, :kendaraan_disewa, :lama_sewa, :total_biaya, :no_telepon, :alamat, :no_ktp, 'mobil', :id_mobil, :startDate,:endDate, :timestamp)";

            $this->db->query($query);

            $this->db->bind('nama', $data->getNama());
            $this->db->bind('kendaraan_disewa', $data->getKendaraanDiSewa()->getMerk() . " (" . $data->getKendaraanDiSewa()->getWarnaKendaraan() . ")");
            $this->db->bind('lama_sewa', $data->getLamaSewa());
            $this->db->bind('total_biaya', $data->getTotalBiaya());
            $this->db->bind('no_telepon', $data->getNoTelepon());
            $this->db->bind('alamat', $data->getAlamat());
            $this->db->bind('no_ktp', $data->getNoKTP());
            $this->db->bind('id_mobil', $id_kendaraan);
            $this->db->bind('startDate', $startDate);
            $this->db->bind('endDate', $endDate);
            $this->db->bind('timestamp', date('Y-m-d H:i:s'));

            $this->db->execute();
        }elseif($tipe_kendaraan == "motor"){
            $query = "INSERT INTO penyewa_motor VALUES('', :nama, :kendaraan_disewa, :lama_sewa, :total_biaya, :no_telepon, :alamat, :no_ktp, 'motor', :id_motor,:startDate,:endDate, :timestamp)";

            $this->db->query($query);

            $this->db->bind('nama', $data->getNama());
            $this->db->bind('kendaraan_disewa', $data->getKendaraanDiSewa()->getMerk() . " (" . $data->getKendaraanDiSewa()->getWarnaKendaraan() . ")");
            $this->db->bind('lama_sewa', $data->getLamaSewa());
            $this->db->bind('total_biaya', $data->getTotalBiaya());
            $this->db->bind('no_telepon', $data->getNoTelepon());
            $this->db->bind('alamat', $data->getAlamat());
            $this->db->bind('no_ktp', $data->getNoKTP());
            $this->db->bind('id_motor', $id_kendaraan);
            $this->db->bind('startDate', $startDate);
            $this->db->bind('endDate', $endDate);
            $this->db->bind('timestamp', date('Y-m-d H:i:s'));

            $this->db->execute();
        }elseif($tipe_kendaraan == "truck"){
            $query = "INSERT INTO penyewa_truck VALUES('', :nama, :kendaraan_disewa, :lama_sewa, :total_biaya, :no_telepon, :alamat, :no_ktp, 'truck', :id_truck,:startDate,:endDate, :timestamp)";

            $this->db->query($query);

            $this->db->bind('nama', $data->getNama());
            $this->db->bind('kendaraan_disewa', $data->getKendaraanDiSewa()->getMerk() . " (" . $data->getKendaraanDiSewa()->getWarnaKendaraan() . ")");
            $this->db->bind('lama_sewa', $data->getLamaSewa());
            $this->db->bind('total_biaya', $data->getTotalBiaya());
            $this->db->bind('no_telepon', $data->getNoTelepon());
            $this->db->bind('alamat', $data->getAlamat());
            $this->db->bind('no_ktp', $data->getNoKTP());
            $this->db->bind('id_truck', $id_kendaraan);
            $this->db->bind('startDate', $startDate);
            $this->db->bind('endDate', $endDate);
            $this->db->bind('timestamp', date('Y-m-d H:i:s'));

            $this->db->execute();
        }elseif($tipe_kendaraan == "bus"){
            $query = "INSERT INTO penyewa_bus VALUES('', :nama, :kendaraan_disewa, :lama_sewa, :total_biaya, :no_telepon, :alamat, :no_ktp, 'bus', :id_bus,:startDate,:endDate, :timestamp)";

            $this->db->query($query);

            $this->db->bind('nama', $data->getNama());
            $this->db->bind('kendaraan_disewa', $data->getKendaraanDiSewa()->getMerk() . " (" . $data->getKendaraanDiSewa()->getWarnaKendaraan() . ")");
            $this->db->bind('lama_sewa', $data->getLamaSewa());
            $this->db->bind('total_biaya', $data->getTotalBiaya());
            $this->db->bind('no_telepon', $data->getNoTelepon());
            $this->db->bind('alamat', $data->getAlamat());
            $this->db->bind('no_ktp', $data->getNoKTP());
            $this->db->bind('id_bus', $id_kendaraan);
            $this->db->bind('startDate', $startDate);
            $this->db->bind('endDate', $endDate);
            $this->db->bind('timestamp', date('Y-m-d H:i:s'));

            $this->db->execute();
        }
    }

    public function hapusDataPenyewa($jenis_kendaraan, $id_penyewa)
    {
        if($jenis_kendaraan == "mobil"){
            $query = "DELETE FROM penyewa_mobil WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();
        }elseif($jenis_kendaraan == "motor"){
            $query = "DELETE FROM penyewa_motor WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();
        }elseif($jenis_kendaraan == "truck"){
            $query = "DELETE FROM penyewa_truck WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();
        }elseif($jenis_kendaraan == "bus"){
            $query = "DELETE FROM penyewa_bus WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();
        }
    }

    public function penyewaJoinKendaraan($jenis_kendaraan,$id_penyewa){
        if($jenis_kendaraan == "mobil"){
            $query = "SELECT mobil.id_mobil, mobil.total_unit FROM penyewa_mobil INNER JOIN mobil ON penyewa_mobil.id_mobil = mobil.id_mobil WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();

            return $this->db->single();
        }elseif($jenis_kendaraan == "motor"){
            $query = "SELECT motor.id_motor, motor.total_unit FROM penyewa_motor INNER JOIN motor ON penyewa_motor.id_motor = motor.id_motor WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();

            return $this->db->single();
        }elseif($jenis_kendaraan == "truck"){
            $query = "SELECT truck.id_truck, truck.total_unit FROM penyewa_truck INNER JOIN truck ON penyewa_truck.id_truck = truck.id_truck WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();

            return $this->db->single();
        }elseif($jenis_kendaraan == "bus"){
            $query = "SELECT bus.id_bus, bus.total_unit FROM penyewa_bus INNER JOIN bus ON penyewa_bus.id_bus = bus.id_bus WHERE id_penyewa = :id_penyewa";

            $this->db->query($query);
            $this->db->bind('id_penyewa', $id_penyewa);

            $this->db->execute();

            return $this->db->single();
        }
    }
}