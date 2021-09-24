<?php
namespace Rubu\Parduotuve;

use Rubu\Parduotuve\Controllers\RubuController;
use PDO;

class App {

    
    static $pdo;

    public static function start()
    {
        self::db();
        return self::route();
    }

    public static function route()
    {
        $userUri = $_SERVER['REQUEST_URI'];
        $userUri = str_replace(INSTALL_DIR, '', $userUri);
        $userUri = preg_replace('/\?.*$/', '', $userUri);
        $userUri = explode('/', $userUri);

        


        if (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            'sarasas' == $userUri[0] &&
            count($userUri) == 1
            ) {
                return (new RubuController)->list();
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            'test' == $userUri[0] &&
            count($userUri) == 1
            ) {
                return (new RubuController)->selectTest();
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            'pirkti' == $userUri[0] &&
            count($userUri) == 1
            ) {
                return (new RubuController)->buy();
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            'edit' == $userUri[0] &&
            count($userUri) == 1
            ) {
                return (new RubuController)->edit();
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            'update' == $userUri[0] &&
            count($userUri) == 2
            ) {
                return (new RubuController)->update($userUri[1]);
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            'add-size' == $userUri[0] &&
            count($userUri) == 2
            ) {
                return (new RubuController)->addSize($userUri[1]);
            }
        elseif (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            'remove-tag' == $userUri[0] &&
            count($userUri) == 2
            ) {
                return (new RubuController)->removeTag($userUri[1]);
            }
            

        echo '<h1>404 Page Not Found</h1>';
        
    }

    public static function redirect($where)
    {
        header('Location: '.URL. $where);
        die;
    }

    public static function db()
    {
        $host = getSetting('host');
        $db   = getSetting('db');
        $user = getSetting('user');
        $pass = getSetting('pass');
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