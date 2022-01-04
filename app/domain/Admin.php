<?php namespace app\domain\Admin;

require_once '../app/domain/Authentication.php';
use app\domain\Authentication\Authentication as Authentication;

use Flasher;

class Admin implements Authentication{
    private $nama;
    private $id;
    private static $username = "admin";
    private static $password = "admin";

    public static function login($username, $password)
    {
        if($username == self::$username && $password == self::$password){
            session_start();
            $_SESSION["isLogin"] = true;
            header('Location: ' . BASEURL . '/admin');
            exit;
        }else{
            Flasher::setFlashLogin('danger','Username atau password salah!');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}