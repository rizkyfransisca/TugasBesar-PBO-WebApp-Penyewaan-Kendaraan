<?php namespace app\domain\Admin;

require_once '../app/domain/Authentication.php';
use app\domain\Authentication\Authentication as Authentication;
use Penyewa;

class Admin implements Authentication{
    private $nama;
    private $id;
    private $username;
    private $password;

    public function login($username, $password)
    {
        
    }
}