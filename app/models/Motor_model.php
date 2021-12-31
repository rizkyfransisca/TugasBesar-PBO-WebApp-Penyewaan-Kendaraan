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

    public function getMotorById($id_motor)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_motor=:id_motor'); // =: id_motor -> untuk menyimpan data yang akan kita binding => untuk menghindari sql injection
        $this->db->bind('id_motor',$id_motor); // -> 'id_motor' == WHERE id_motor
        return $this->db->single(); // jika isinya cuma 1 maka pakai single
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

    public function ubahDataMotor($data, $id_motor){
        $query = "UPDATE motor SET merk = :merk, warna = :warna, harga_sewa = :harga_sewa, tahun = :tahun, transmisi = :transmisi, total_unit = :total_unit, isInjeksi = :isInjeksi, idlingStopSystem =:idlingStopSystem WHERE id_motor = :id_motor";

        $this->db->query($query);

        $this->db->bind('merk', $data->getMerk());
        $this->db->bind('warna', $data->getWarnaKendaraan());
        $this->db->bind('harga_sewa', $data->getHargaSewaKendaraan());
        $this->db->bind('tahun', $data->getTahunKendaraan());
        $this->db->bind('transmisi', $data->getTransmisi());
        $this->db->bind('total_unit', $data->getTotalUnit());
        $this->db->bind('isInjeksi', $data->getIsInjeksi());
        $this->db->bind('idlingStopSystem', $data->getIdlingStopSystem());
        $this->db->bind('id_motor', $id_motor);

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