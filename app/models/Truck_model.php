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

    public function hapusDataTruck($id_truck)
    {
        $query = "DELETE FROM truck WHERE id_truck = :id_truck";

        $this->db->query($query);
        $this->db->bind('id_truck', $id_truck);

        $this->db->execute();
    }
}