<?php 

class Bus_model{
    private $table = 'bus';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBus(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function tambahDataBus($data){
        $query = "INSERT INTO bus VALUES('', :merk, :warna, :harga_sewa, :tahun, :transmisi, :total_unit, :kapasitas_penumpang, :tipe_ac, :air_bag, :kapasitas_begasi, :ada_toilet, :ada_wifi)";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('kapasitas_penumpang', $data->getKapasitasPenumpang());
        $this->db->bind('tipe_ac', $data->getTipeAC());
        $this->db->bind('air_bag', $data->getAirBag());
        $this->db->bind('kapasitas_begasi', $data->getKapasitasBagasi());
        $this->db->bind('ada_toilet', $data->getAdaToilet());
        $this->db->bind('ada_wifi', $data->getAdaWifi());

        $this->db->execute();

        // SETELAH INSERT LANGSUNG GET / TAMPILKAN DATA MOTOR
        // header('Location: http://localhost/sewakeun pbo/public/motor');
    }

    public function hapusDataBus($id_bus)
    {
        $query = "DELETE FROM bus WHERE id_bus = :id_bus";

        $this->db->query($query);
        $this->db->bind('id_bus', $id_bus);

        $this->db->execute();
    }
}