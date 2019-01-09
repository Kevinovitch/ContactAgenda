<?php

use App\Config;
use App\Database;

class App
{
    /** @var  */
    private $db_instance;
    /** @var  */
    private static $_instance;

    /**
     * Auto chargement des classes
     */
    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/vendor/autoload.php';
    }

    /**
     * @return App
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getModel($name)
    {
        $name = '\\App\\Models\\' . ucfirst($name) . 'Model';
        return new $name($this->getDatabase());
    }

    /**
     * @return Database
     */
    public function getDatabase()
    {
        $config = Config::getInstance();
        if (is_null($this->db_instance)) {
            $this->db_instance = new Database($config->get('db_name'),
                $config->get('db_user'), $config->get('db_pass'),
                $config->get('db_host'));
        }
        return $this->db_instance;
    }
}