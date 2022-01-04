<?php 

class Flasher{
    // $tipe == tipe dari kelas bootstrap
    public static function setFlashLogin($tipe, $pesan)
    {
        $_SESSION['flash'] = [
            'tipe' => $tipe,
            'pesan' => $pesan
        ];
    }

    public static function flash()
    {
        if(isset($_SESSION['flash'])){
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
                    <strong>'.$_SESSION['flash']['pesan'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']); // kita hapus sessionya sehingga hanya akan tampil sekali
        }
    }

}