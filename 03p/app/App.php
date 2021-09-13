<?php
namespace Rubu\Parduotuve;

use Rubu\Parduotuve\Controllers\RubuController;
use PDO;

class App {

    const INSTALL_DIR = '/lokys/03p/public/';
    static $pdo;

    public static function start()
    {
        self::db();
        return self::route();
    }

    public static function route()
    {
        $userUri = $_SERVER['REQUEST_URI'];
        $userUri = str_replace(self::INSTALL_DIR, '', $userUri);
        $userUri = explode('/', $userUri);


        if (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            'sarasas' == $userUri[0] &&
            count($userUri) == 1
            ) {
                return (new RubuController)->list();
            }


        echo '<h1>404 Page Not Found</h1>';
        
    }


    public static function db()
    {
        $host = '127.0.0.1';
        $db   = 'kazkas_jaudas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        self::$pdo = new PDO($dsn, $user, $pass, $options);
    }


    public static function view($temp, $data = [])
    {
        extract($data);
        require DIR . 'views/' . $temp . '.php';
    }


}