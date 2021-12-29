<?php  namespace app\domain\Truck;

require_once '../app/domain/Kendaraan.php';
use app\domain\Kendaraan\Kendaraan as Kendaraan;

class Truck extends Kendaraan {

    private $volumeMuatanMaks;
    private $bebanMaks;
    private $jenisTruck;
    
    public function __construct($merk, $warnaKedaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmnisi, $totalUnit, $volumeMuatanMaks, $bebanMaks, $jenisTruck) {
        parent::__construct($merk, $warnaKedaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmnisi, $totalUnit);
        $this->volumeMuatanMaks = $volumeMuatanMaks;
        $this->bebanMaks = $bebanMaks;
        $this->jenisTruck = $jenisTruck;
    }
    public function getVolumeMuatanMaks() {
        return $this->volumeMuatanMaks;
    }
    public function getBebanMaks() {
        return $this->bebanMaks;
    }
    public function getJenisTruck() {
        return $this->jenisTruck;
    }
    public function setVolumeMuatanMaks($volumeMuatanMaks) {
        $this->volumeMuatanMaks = $volumeMuatanMaks;
    }
    public function setBebanMaks($bebanMaks) {
        $this->bebanMaks = $bebanMaks;
    }
    public function setJenisTruck($jenisTruck) {
        $this->jenisTruck = $jenisTruck;
    }
}