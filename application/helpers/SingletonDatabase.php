<?php
include("application/helpers/Database.php");

class SingletonDatabase
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}
    public function test()
    {
        var_dump($this);
    }
}