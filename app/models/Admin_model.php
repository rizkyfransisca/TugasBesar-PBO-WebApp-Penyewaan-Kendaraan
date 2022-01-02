<?php 

class Admin_model{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}