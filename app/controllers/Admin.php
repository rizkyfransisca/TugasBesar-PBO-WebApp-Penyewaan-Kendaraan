<?php 

require_once '../app/domain/Admin.php';

use app\domain\Admin\Admin as AdminClass;

class Admin extends Controller{
    public function index(){
        // $data['motor'] = $this->model('Motor_model')->getAllMotor();
        // $this->view('penyewa/index');
        echo "Hello World";
    }

    public function tambahPenyewa(){
        
    }
}