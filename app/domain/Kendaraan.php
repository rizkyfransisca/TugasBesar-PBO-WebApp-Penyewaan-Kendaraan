<?php namespace app\domain\Kendaraan;

class Kendaraan{
    private $merk;
    private $warnaKendaraan;
    private $hargaSewaKendaraan;
    private $tahunKendaraan;
    private $transmisi;
    private $totalUnit;

    public function __construct($merk, $warnaKendaraan, $hargaSewaKendaraan, $tahunKendaraan, $transmisi, $totalUnit)
    {
        $this->merk = $merk;
        $this->warnaKendaraan = $warnaKendaraan;
        $this->hargaSewaKendaraan = $hargaSewaKendaraan;
        $this->tahunKendaraan = $tahunKendaraan;
        $this->transmisi = $transmisi;
        $this->totalUnit = $totalUnit;
    }

    public function getMerk()
    {
        return $this->merk;
    }

    public function setMerk($merk)
    {
        $this->merk = $merk;
    }

    public function getWarnaKendaraan()
    {
        return $this->warnaKendaraan;
    }

    public function setWarnaKendaraan($warnaKendaraan)
    {
        $this->warnaKendaraan = $warnaKendaraan;
    }

    public function getHargaSewaKendaraan()
    {
        return $this->hargaSewaKendaraan;
    }

    public function setHargaSewaKendaraan($hargaSewaKendaraan)
    {
        $this->hargaSewaKendaraan = $hargaSewaKendaraan;
    }

    public function getTahunKendaraan()
    {
        return $this->tahunKendaraan;
    }

    public function setTahunKendaraan($tahunKendaraan)
    {
        $this->tahunKendaraan = $tahunKendaraan;
    }

    public function getTransmisi()
    {
        return $this->transmisi;
    }

    public function setTransmisi($transmisi)
    {
        $this->transmisi = $transmisi;
    }

    public function getTotalUnit()
    {
        return $this->totalUnit;
    }

    public function setTotalUnit($totalUnit)
    {
        $this->totalUnit = $totalUnit;
    }

    public function isTersedia(){
        if($this->totalUnit > 0){
            return true;
        } else {
            return false;
        }
    }

    public function info(){
        
    }
}