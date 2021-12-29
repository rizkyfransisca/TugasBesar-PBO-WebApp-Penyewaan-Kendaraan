<?php 

class Controller{
    public function view($view, $data = [])
    {
        // ../ -> karena inti dari aplikasi berada di index.php paling luar
        require_once '../app/views/' . $view . '.php'; // isinya tampilan atau html saja jadi tidak perlu diinstansiasi
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}