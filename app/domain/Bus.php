<?php  namespace app\domain\Bus;

require_once '../app/domain/Kendaraan.php';
use app\domain\Kendaraan\Kendaraan as Kendaraan;

class Bus extends Kendaraan{
    private $kapasitasPenumpang;
    private $tipeAC;
    private $airBag;
    private $kapasitasBagasi;
    private $adaToilet;
    private $adaWifi;

    public function __construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit, $kapasitasPenumpang, $tipeAC, $airBag, $kapasitasBagasi, $adaToilet, $adaWifi)
    {
        parent::__construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit);
        $this->kapasitasPenumpang = $kapasitasPenumpang;
        $this->tipeAC = $tipeAC;
        $this->airBag = $airBag;
        $this->kapasitasBagasi = $kapasitasBagasi;
        $this->adaToilet = $adaToilet;
        $this->adaWifi = $adaWifi;
    }

    public function getKapasitasPenumpang()
    {
        return $this->kapasitasPenumpang;
    }

    public function setKapasitasPenumpang($kapasitasPenumpang)
    {
        $this->kapasitasPenumpang = $kapasitasPenumpang;
    }

    public function getTipeAC()
    {
        return $this->tipeAC;
    }

    public function setTipeAC($tipeAC)
    {
        $this->tipeAC = $tipeAC;
    }

    public function getAirBag()
    {
        return $this->airBag;
    }

    public function setAirBag($airBag)
    {
        $this->airBag = $airBag;
    }

    public function getKapasitasBagasi()
    {
        return $this->kapasitasBagasi;
    }

    public function setKapasitasBagasi($kapasitasBagasi)
    {
        $this->kapasitasBagasi = $kapasitasBagasi;
    }

    public function getAdaToilet()
    {
        return $this->adaToilet;
    }

    public function setAdaToilet($adaToilet)
    {
        $this->adaToilet = $adaToilet;
    }

    public function getAdaWifi()
    {
        return $this->adaWifi;
    }

    public function setAdaWifi($adaWifi)
    {
        $this->adaWifi = $adaWifi;
    }

}