<?php namespace app\domain\Penyewa;

require_once '../app/domain/Kendaraan.php';
use app\domain\Kendaraan\Kendaraan;

class Penyewa{
    private $nama;
    private Kendaraan $kendaraanDiSewa;
    private $lamaSewa;
    private $totalBiaya;
    private $noTelepon;
    private $alamat;
    private $noKTP;

    public function __construct($nama, Kendaraan $kendaraanDiSewa, $lamaSewa, $totalBiaya, $noTelepon, $alamat, $noKTP)
    {
        $this->nama = $nama;
        $this->kendaraanDiSewa = $kendaraanDiSewa;
        $this->lamaSewa = $lamaSewa;
        $this->totalBiaya = $totalBiaya;
        $this->noTelepon = $noTelepon;
        $this->alamat = $alamat;
        $this->noKTP = $noKTP;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getKendaraanDiSewa()
    {
        return $this->kendaraanDiSewa;
    }

    public function getLamaSewa()
    {
        return $this->lamaSewa;
    }

    public function getTotalBiaya()
    {
        return $this->totalBiaya;
    }

    public function getNoTelepon()
    {
        return $this->noTelepon;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function getNoKTP()
    {
        return $this->noKTP;
    }
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function setKendaraanDiSewa($kendaraanDiSewa)
    {
        $this->kendaraanDiSewa = $kendaraanDiSewa;
    }

    public function setLamaSewa($lamaSewa)
    {
        $this->lamaSewa = $lamaSewa;
    }

    public function setTotalBiaya($totalBiaya)
    {
        $this->totalBiaya = $totalBiaya;
    }
    public function setNoTelepon($noTelepon)
    {
        $this->noTelepon = $noTelepon;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function setNoKTP($noKTP)
    {
        $this->noKTP = $noKTP;
    }
}