<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;

class RubuController {

    const IN_PAGE = 10;

    public static function outfitsTypes()
    {
        // SELECT DISTINCT column1, column2, ...
        // FROM table_name;
        $sql = "SELECT DISTINCT rubas
        FROM rubai
        ORDER BY rubas
        ";
        $stmt = App::$pdo->query($sql);
        $types = $stmt->fetchAll();
        return $types;
    }

    public static function countAllProducts()
    {
        // SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;
        $sql = "SELECT COUNT(id) AS number_of_products
        FROM rubai
        ";
        $stmt = App::$pdo->query($sql);
        return $stmt->fetch()['number_of_products'];
    }
    
    
    
    
    public function list()
    {   
        if (isset($_GET['sort_price_asc'])) {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            ORDER BY pardavimo_kaina
            ";
        }
        elseif (isset($_GET['sort_price_desc'])) {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            ORDER BY kaina DESC
            ";
        }
        elseif (isset($_GET['filter_by_type'])) {
            $rubas = $_GET['rubas'];
            
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE rubas = '$rubas'
            ";
        }
        // Pageris parašyti LIMIT
        elseif (isset($_GET['page'])) {
            $page = $_GET['page'];
            $inPage = self::IN_PAGE;
            $offset = ($page - 1) * $inPage;
            
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            LIMIT $offset , $inPage
            ";
        }
        else {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            ";
        }
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();

        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();

        App::view('list', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE
        ]);
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