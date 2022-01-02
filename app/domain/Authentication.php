<?php namespace app\domain\Authentication;

interface Authentication{
    public function login($username, $password);
}