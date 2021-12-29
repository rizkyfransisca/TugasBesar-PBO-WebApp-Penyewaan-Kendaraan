<?php 

class Motor_model{
    private $table = 'motor';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMotor(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function tambahDataMotor($data){
        $query = "INSERT INTO motor VALUES('', :merk, :warna, :harga_sewa, :tahun, :transmisi, :total_unit, :isInjeksi, :idlingStopSystem, '')";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('isInjeksi', $data->getIsInjeksi());
        $this->db->bind('idlingStopSystem', $data->getIdlingStopSystem());

        $this->db->execute();

        // SETELAH INSERT LANGSUNG GET / TAMPILKAN DATA MOTOR
        // header('Location: http://localhost/sewakeun pbo/public/motor');
    }

    public function hapusDataMotor($id_motor)
    {
        $query = "DELETE FROM motor WHERE id_motor = :id_motor";

        $this->db->query($query);
        $this->db->bind('id_motor', $id_motor);

        $this->db->execute();
    }
}