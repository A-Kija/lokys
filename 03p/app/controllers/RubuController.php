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

    public static function sizesTypes()
    {
        $sql = "SELECT DISTINCT dydis
        FROM rubai
        ORDER BY dydis
        ";
        $stmt = App::$pdo->query($sql);
        $sizes = $stmt->fetchAll();
        return $sizes;
    }

    public static function countAllProducts()
    {
        // SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;
        $sql = "SELECT COUNT(kiekis) AS number_of_products
        FROM rubai
        ";
        $stmt = App::$pdo->query($sql);
        return $stmt->fetch()['number_of_products'];
    }

    public static function countAll()
    {
        // SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails;
        $sql = "SELECT SUM(kiekis) AS all_products
        FROM rubai
        ";
        $stmt = App::$pdo->query($sql);
        return $stmt->fetch()['all_products'];
    }
    
    public function selectTest()
    {
        $z1 = 'gelt';
        $z2 = 'šort';
        
        $sql = "SELECT
        id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
        FROM
        rubai
        WHERE   (spalva LIKE '%$z2%' AND rubas LIKE '%$z1%')
                OR 
                (spalva LIKE '%$z1%' AND rubas LIKE '%$z2%')
        ";

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();
        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();

        App::view('test', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE
        ]);
    }
    
    public function buy()
    {
        $id = (int) $_POST['id'];
        $count = (int) $_POST['count'];

        $sql = "SELECT
        kiekis
        FROM
        rubai
        WHERE id = $id;
        ";

        $stmt = App::$pdo->query($sql);
        $kiekis = $stmt->fetch()['kiekis'];

        $kiekis-= $count;

        $kiekis = $kiekis < 1 ? 'NULL' : $kiekis;

        $sql = "UPDATE
        rubai
        SET kiekis = $kiekis
        WHERE id = $id
        ";

        App::$pdo->query($sql);

        App::redirect('sarasas');
    }
    
    public function list()
    {   
        if (isset($_GET['sort_price_asc'])) {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE kiekis > 0
            ORDER BY pardavimo_kaina
            ";
        }
        elseif (isset($_GET['sort_price_desc'])) {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE kiekis > 0
            ORDER BY kaina DESC
            ";
        }
        elseif (isset($_GET['filter_by_type'])) {
            $rubas = $_GET['rubas'];
            
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE rubas = '$rubas' AND kiekis > 0
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
            WHERE kiekis > 0
            LIMIT $offset , $inPage
            ";
        }
        elseif (isset($_GET['filter_by_size'])) {

            $sizes = implode(',', array_map(fn($v) => "'$v'", $_GET['size']));
            
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE dydis IN ( $sizes )
            ";
        }
        elseif (isset($_GET['search'])) {

            $s = $_GET['s'];
            $s = explode(' ', $s);

            if (count($s) == 1) {
                $z = $s[0];
                $sql = "SELECT
                id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
                FROM
                rubai
                WHERE   spalva LIKE '%$z%' OR rubas LIKE '%$z%'
                ";
            }
            else {
          
                $z1 = $s[0];
                $z2 = $s[1];
                
                $sql = "SELECT
                id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
                FROM
                rubai
                WHERE   (spalva LIKE '%$z2%' AND rubas LIKE '%$z1%')
                        OR 
                        (spalva LIKE '%$z1%' AND rubas LIKE '%$z2%')
                ";
            }

        }
        else {
            $sql = "SELECT
            id, rubas, dydis, spalva, kaina, nuolaida, (kaina - nuolaida) AS pardavimo_kaina, kiekis
            FROM
            rubai
            WHERE kiekis IS NOT NULL
            ";
        }
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();

        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();
        $countAll = self::countAll();
        $sizes = self::sizesTypes();

        App::view('list', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE,
            'sizes' => $sizes,
            'count_all' => $countAll
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