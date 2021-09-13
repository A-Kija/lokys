<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;

class RubuController {


    public function list()
    {   
        $sql = "SELECT
        id, title, height, `type`
        FROM
        trees44
        WHERE `type` = 1
        ";
        $stmt = App::$pdo->query($sql);

        $trees = $stmt->fetchAll();

        App::view('list', ['trees' => $trees]);
    }

}