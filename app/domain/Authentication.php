<?php namespace app\domain\Authentication;

interface Authentication{
    public static function login($username, $password);
}