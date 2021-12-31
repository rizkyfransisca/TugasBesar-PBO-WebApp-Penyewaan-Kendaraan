<?php 

class Truck_model{
    private $table = 'truck';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTruck(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getTruckById($id_truck)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_truck=:id_truck'); // =: id_truck -> untuk menyimpan data yang akan kita binding => untuk menghindari sql injection
        $this->db->bind('id_truck',$id_truck); // -> 'id_truck' == WHERE id_truck
        return $this->db->single(); // jika isinya cuma 1 maka pakai sing;e
    }

    public function tambahDataTruck($data){
        $query = "INSERT INTO truck VALUES('', :merk, :warna, :harga_sewa, :tahun, :transmisi, :total_unit, :volume_muatan, :beban_maksimal, :jenis_truck)";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('volume_muatan', $data->getVolumeMuatanMaks());
        $this->db->bind('beban_maksimal', $data->getBebanMaks());
        $this->db->bind('jenis_truck', $data->getJenisTruck());

        $this->db->execute();

        // SETELAH INSERT LANGSUNG GET / TAMPILKAN DATA MOTOR
        // header('Location: http://localhost/sewakeun pbo/public/motor');
    }

    public function ubahDataTruck($data, $id_truck){
        $query = "UPDATE truck SET merk = :merk, warna = :warna, harga_sewa = :harga_sewa, tahun = :tahun, transmisi = :transmisi, total_unit = :total_unit, volume_muatan = :volume_muatan, beban_maksimal = :beban_maksimal, jenis_truck = :jenis_truck WHERE id_truck = :id_truck";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('volume_muatan', $data->getVolumeMuatanMaks());
        $this->db->bind('beban_maksimal', $data->getBebanMaks());
        $this->db->bind('jenis_truck', $data->getJenisTruck());
        $this->db->bind('id_truck', $id_truck);

        $this->db->execute();

        // SETELAH INSERT LANGSUNG GET / TAMPILKAN DATA MOTOR
        // header('Location: http://localhost/sewakeun pbo/public/motor');
    }

    public function hapusDataTruck($id_truck)
    {
        $query = "DELETE FROM truck WHERE id_truck = :id_truck";

        $this->db->query($query);
        $this->db->bind('id_truck', $id_truck);

        $this->db->execute();
    }
}