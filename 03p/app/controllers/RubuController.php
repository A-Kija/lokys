<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;

class RubuController {


    public function list()
    {   
        $sql = "SELECT
        id, rubas, dydis, spalva, kaina, nuolaida
        FROM
        rubai
        ";
        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();
        App::view('list', ['outfits' => $outfits]);
    }

}