<?php 
// kita harus menjalankan session karena aplikasi kita terdapot session pada flash message -> Flasher
if (!session_id()) { // kalo didalam aplikasi kita tidak terdeteksi ada session id / session maka jalankan sessionnya
    session_start();
}
// bootstraping -> panggil satu file dan file itu akan memanggil seluruh aplikasi mvc nya
require_once '../app/init.php';

$app = new App;