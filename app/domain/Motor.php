<?php namespace app\domain\Motor;

require_once '../app/domain/Kendaraan.php';
use app\domain\Kendaraan\Kendaraan as Kendaraan;

class Motor extends Kendaraan {
    private $isInjeksi;
    private $idlingStopSystem;

    public function __construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit, $isInjeksi, $idlingStopSystem)
    {
        parent::__construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit);
        $this->isInjeksi = $isInjeksi;
        $this->idlingStopSystem = $idlingStopSystem;
    }

    public function getIsInjeksi(){
        return $this->isInjeksi;
    }

    public function setIsInjeksi($isInjeksi){
        $this->isInjeksi = $isInjeksi;
    }

    public function getIdlingStopSystem(){
        return $this->idlingStopSystem;
    }

    public function setIdlingStopSystem($idlingStopSystem){
        $this->idlingStopSystem = $idlingStopSystem;
    }

}