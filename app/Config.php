<?php

namespace App;

class Config
{
    private $settings = [];
    private static $_instance;

    /**
     * @param $file
     * @return Config
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    /**
     * Config constructor.
     * @param $file
     */
    public function __construct()
    {
        // todo trouver un moyen de sécuriser l'acces à la BDD
        $this->settings = [
            "db_user" => "newuser",
            "db_pass" => "password",
            "db_host" => "localhost",
            "db_name" => "crm"
        ];
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}