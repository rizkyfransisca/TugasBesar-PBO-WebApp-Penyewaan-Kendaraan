<?php  namespace app\domain\Mobil;

require_once '../app/domain/Kendaraan.php';
use app\domain\Kendaraan\Kendaraan as Kendaraan;

class Mobil extends Kendaraan{
    private $kapasitasPenumpang;
    private $tipeAC;
    private $isSunRoof;
    private $airBag;
    private $cruiseControl;
    private $kapasitasBagasi;

    public function __construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit, $kapasitasPenumpang, $tipeAC, $isSunRoof, $airBag, $cruiseControl, $kapasitasBagasi)
    {
        parent::__construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit);
        $this->kapasitasPenumpang = $kapasitasPenumpang;
        $this->tipeAC = $tipeAC;
        $this->isSunRoof = $isSunRoof;
        $this->airBag = $airBag;
        $this->cruiseControl = $cruiseControl;
        $this->kapasitasBagasi = $kapasitasBagasi;
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

    public function getIsSunRoof()
    {
        return $this->isSunRoof;
    }

    public function setIsSunRoof($isSunRoof)
    {
        $this->isSunRoof = $isSunRoof;
    }

    public function getAirBag()
    {
        return $this->airBag;
    }

    public function setAirBag($airBag)
    {
        $this->airBag = $airBag;
    }

    public function getCruiseControl()
    {
        return $this->cruiseControl;
    }

    public function setCruiseControl($cruiseControl)
    {
        $this->cruiseControl = $cruiseControl;
    }

    public function getKapasitasBagasi()
    {
        return $this->kapasitasBagasi;
    }

    public function setKapasitasBagasi($kapasitasBagasi)
    {
        $this->kapasitasBagasi = $kapasitasBagasi;
    }

    public function info(){
        
    }
}