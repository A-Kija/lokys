<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;



class LoginController {

    static private function logIn()
    {
        $name = $_POST['user'];
        $pass = md5($_POST['pass']);
        $sql = "
        ";
        $stmt = App::$pdo->query($sql);
        $user = $stmt->fetch();

        print_r($user);
        die;

    }
    
    
    public function show()
    {
        App::view('login');
    }

    public function doLogin()
    {
        $ok = self::logIn();
    }
    
}