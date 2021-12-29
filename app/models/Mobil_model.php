<?php 

class Mobil_model {
    private $table = 'mobil';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMobil(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function tambahDataMobil($data){
        $query = "INSERT INTO mobil VALUES('', :merk, :warna, :harga_sewa, :tahun, :transmisi, :total_unit, :kapasitas_penumpang, :tipe_ac, :isSunRoof, :air_bag, :cruise_control, :kapasitas_begasi)";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('kapasitas_penumpang', $data->getKapasitasPenumpang());
        $this->db->bind('tipe_ac', $data->getTipeAC());
        $this->db->bind('isSunRoof', $data->getIsSunRoof());
        $this->db->bind('air_bag', $data->getAirBag());
        $this->db->bind('cruise_control', $data->getCruiseControl());
        $this->db->bind('kapasitas_begasi', $data->getKapasitasBagasi());

        $this->db->execute();

        // SETELAH INSERT LANGSUNG GET / TAMPILKAN DATA MOTOR
        // header('Location: http://localhost/sewakeun pbo/public/motor');
    }

    public function hapusDataMobil($id_mobil)
    {
        $query = "DELETE FROM mobil WHERE id_mobil = :id_mobil";

        $this->db->query($query);
        $this->db->bind('id_mobil', $id_mobil);

        $this->db->execute();
    }
}