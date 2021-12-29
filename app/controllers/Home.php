<?php 

// Home extends Controller in core folder
class Home extends Controller {
    // ketika kita tidak menuliskan apapun di URL maka method index ini akan dipanggil
    public function index(){
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('home/index', $data);
    }
}