<?php

class DB
{

    private static $_db = null;

    public static function getInstance()
    {
        if (self::$_db == null)
            self::$_db = new PDO('mysql:host=localhost; dbname=mobi_db', 'root', 'root');

        return self::$_db;
    }

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    public function __wakeup()
    {
    }

}