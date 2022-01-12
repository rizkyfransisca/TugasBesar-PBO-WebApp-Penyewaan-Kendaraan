<?php namespace app\domain\Admin;

require_once '../app/domain/Authentication.php';
use app\domain\Authentication\Authentication as Authentication;

use Flasher;

class Admin implements Authentication{
    private $nama;
    private $id;
    private $username;
    private $password;

    public function __construct($nama, $id, $username, $password)
    {
        $this->nama = $nama;
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function login($username, $password)
    {
        if($username == $this->getUsername() && $password == $this->getPassword()){
            session_start();
            $_SESSION["isLogin"] = ['nama' => $this->nama, 'id' => $this->id];
            header('Location: ' . BASEURL . '/admin');
            exit;
        }else{
            Flasher::setFlashLogin('danger','Username atau password salah!');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function info(){
        
    }
}