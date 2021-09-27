<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;



class LoginController {

    public function show()
    {
        App::view('login');
    }
    
}