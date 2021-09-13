<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;

class RubuController {

    public function list()
    {   
        if (isset($_GET['sort_price_asc'])) {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida
            FROM
            rubai
            ORDER BY kaina
            ";
        }
        else {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida
            FROM
            rubai
            ";
        }
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();
        App::view('list', ['outfits' => $outfits]);
    }

}

/*
1. Išrūšiuoti pagal kainą nuo mažiausio
2. Išrūšiuoti pagal kainą nuo didžiausio
3. Parodyti 5 pačias pigiausias
4. Parodyti visas didesnias nei l
5. Parodyti kelnias pigesnias nei 50 išrikiuotas nuo mažiausio
6. Parodyti marškinius xl dydžio pigesnius nei 60
7. Parodyti 5 pigiausius sijonus
8. Parodyti 5 brangiausius sukneles išrikiuotas nuo braugiausios
9. Parodyti visus marškinius ir kelnias ir džinsus kurie yra xl ir nebrangesni nei 50
10. Parodyti xl prekes išrūšiuotas pagal pavadinimą

*/