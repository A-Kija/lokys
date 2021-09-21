<?php
namespace Rubu\Parduotuve\Controllers;

use Rubu\Parduotuve\App;

class RubuController {

    const IN_PAGE = 10;

    public static function outfitsTypes()
    {
        // SELECT DISTINCT column1, column2, ...
        // FROM table_name;
        $sql = "SELECT DISTINCT `type`
        FROM outfits
        ORDER BY `type`
        ";
        $stmt = App::$pdo->query($sql);
        $types = $stmt->fetchAll();
        return $types;
    }

    // public static function sizesTypes()
    // {
    //     $sql = "SELECT DISTINCT dydis
    //     FROM rubai
    //     ORDER BY dydis
    //     ";
    //     $stmt = App::$pdo->query($sql);
    //     $sizes = $stmt->fetchAll();
    //     return $sizes;
    // }

    public static function countAllProducts()
    {
        // SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;
        $sql = "SELECT COUNT(id) AS number_of_products
        FROM outfits
        ";
        $stmt = App::$pdo->query($sql);
        return $stmt->fetch()['number_of_products'];
    }

    // public static function countAll()
    // {
    //     // SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails;
    //     $sql = "SELECT SUM(kiekis) AS all_products
    //     FROM rubai
    //     ";
    //     $stmt = App::$pdo->query($sql);
    //     return $stmt->fetch()['all_products'];
    // }
    
    public function selectTest()
    {
        
        // SELECT column_name(s)
        // FROM table1
        // INNER JOIN table2
        // ON table1.column_name = table2.column_name;
        
        $sql = "SELECT
        outfits.id, `type`, color, price, discount, (price - discount) AS total_price, size, amount
        FROM
        outfits
        INNER JOIN sizes
        ON outfits.id = sizes.outfit_id
        WHERE amount > 0
        ";
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();


        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();
        // $countAll = self::countAll();
        // $sizes = self::sizesTypes();

        App::view('list', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE,
            // 'sizes' => $sizes,
            // 'count_all' => $countAll
        ]);
    }


    public function edit()
    {
        
        $sql = "SELECT
        outfits.id, `type`, color, price, discount, (price - discount) AS total_price, size, amount
        FROM
        outfits
        INNER JOIN sizes
        ON outfits.id = sizes.outfit_id
        WHERE amount > 0
        ";
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();


        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();

        App::view('edit', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE,
        ]);
    }
    
    public function buy()
    {
        $id = (int) $_POST['id'];
        $count = (int) $_POST['count'];
        $size = $_POST['size'];


        $sql = "SELECT
        amount
        FROM
        sizes
        WHERE size = '$size' && outfit_id = $id
        ";

        $sql = "SELECT
        amount
        FROM
        outfits
        INNER JOIN sizes
        ON outfits.id = sizes.outfit_id
        WHERE size = '$size' AND  outfits.id = $id
        ";

        $stmt = App::$pdo->query($sql);
        $kiekis = $stmt->fetch()['amount'];


        $kiekis-= $count;

        $kiekis = $kiekis < 1 ? 'NULL' : $kiekis;

        $sql = "UPDATE
        sizes
        SET amount = $kiekis
        WHERE outfit_id = $id AND size = '$size'
        ";

        App::$pdo->query($sql);

        App::redirect('test');
    }
    
    public function list()
    {   
        if (isset($_GET['sort_price_asc'])) {
            $sql = "SELECT
            id, `type`, color, price, discount, (price - discount) AS total_price
            FROM
            outfits
            ORDER BY total_price
            ";
        }
        elseif (isset($_GET['sort_price_desc'])) {
            $sql = "SELECT
            id, `type`, color, price, discount, (price - discount) AS total_price
            FROM
            outfits
            ORDER BY total_price DESC
            ";
        }
        elseif (isset($_GET['filter_by_type'])) {
            $rubas = $_GET['rubas'];
            
            $sql = "SELECT
            id, `type`, color, price, discount, (price - discount) AS total_price
            FROM
            outfits
            WHERE `type` = '$rubas'
            ";
        }
        // Pageris parašyti LIMIT
        elseif (isset($_GET['page'])) {
            $page = $_GET['page'];
            $inPage = self::IN_PAGE;
            $offset = ($page - 1) * $inPage;
            
            $sql = "SELECT
            id, `type`, color, price, discount, (price - discount) AS total_price
            FROM
            outfits
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
                id, `type`, color, price, discount, (price - discount) AS total_price
                FROM
                outfits
                WHERE   color LIKE '%$z%' OR `type` LIKE '%$z%'
                ";
            }
            else {
          
                $z1 = $s[0];
                $z2 = $s[1];
                
                $sql = "SELECT
                id, `type`, color, price, discount, (price - discount) AS total_price
                FROM
                outfits
                WHERE   (color LIKE '%$z2%' AND `type` LIKE '%$z1%')
                        OR 
                        (color LIKE '%$z1%' AND `type` LIKE '%$z2%')
                ";
            }

        }
        else {
            $sql = "SELECT
            id, `type`, color, price, discount, (price - discount) AS total_price
            FROM
            outfits
            ";
        }
        

        $stmt = App::$pdo->query($sql);
        $outfits = $stmt->fetchAll();

        $types = self::outfitsTypes();
        $productsCount = self::countAllProducts();
        // $countAll = self::countAll();
        // $sizes = self::sizesTypes();

        App::view('list', [
            'outfits' => $outfits,
            'types' => $types,
            'count' => $productsCount,
            'in_one_page' => self::IN_PAGE,
            // 'sizes' => $sizes,
            // 'count_all' => $countAll
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