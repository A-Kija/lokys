<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;



class LoginController {

    static private function logIn()
    {
        $name = $_POST['user'];
        $pass = md5($_POST['pass']);
        $sql = "SELECT 
        *
        FROM
        users
        WHERE user = '$name' AND pass = '$pass'
        ";
        $stmt = App::$pdo->query($sql);
        $user = $stmt->fetch();

        if (false === $user) {
            return false;
        }

        $_SESSION['name'] = $user['user'];
        $_SESSION['logged'] = 1;

        return true;
    }

    static public function isLogged()
    {
        return isset($_SESSION['logged']) && $_SESSION['logged'] == 1;
    }
    
    
    public function show()
    {
        App::view('login');
    }

    public function register()
    {
        App::view('register');
    }

    public function doRegister()
    {
        $name = $_POST['user'];
        $pass = md5($_POST['pass']);
        $sql = "
        ";
        App::$pdo->query($sql);
        App::redirect('login');
    }

    public function doLogin()
    {
        $ok = self::logIn();

        if (!$ok) {
            App::redirect('login');
        }
        else {
            App::redirect('edit');
        }
    }

    public function doLogOut()
    {
        unset($_SESSION['name'], $_SESSION['logged']);
        App::redirect('login');
    }
    
}