<?php
$host = '127.0.0.1';
$db   = 'kazkas_jaudas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE           , PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES  , false,
];

$pdo = new PDO($dsn, $user, $pass, $options);



$sql = "DROP TABLE IF EXISTS
rubai;
";
$pdo->query($sql);


// Rūbų parduotuvės lentelę su stulpeliais: 
// id, rūbas, dydis, spalva, kaina, nuolaida ir kiekis (0 iki 5)

$sql = "CREATE TABLE 
rubai (
    id       smallint,
    rubas	 varchar(70),
    dydis	 varchar(6),
    spalva	 varchar(20),
    kaina    decimal(6,2),
    nuolaida decimal(6,2),
    kiekis   tinyint NULL
);
";
$pdo->query($sql);

$sizes = [
    'xs', 's', 'm', 'l', 'xl', 'xxl', 'xxxl'
];

$outfits = [
    'Kelnės', 'Džinsai', 'Švarkas', 'Suknelė', 'Sijonas', 'Šortai',
    'Striukė', 'Paltas', 'Puspaltis', 'Šūba', 'Marškiniai', 'Kojinės',
    'Liemenė', 'Megztinis', 'Krpurė'
];

$colors = [
    'Mėlyna', 'Raudona', 'Žalia', 'Geltona', 'Ruda', 'Balta', 'Juoda'
];

foreach (range(1, 100) as $val) {
    $rubas = $outfits[rand(0, count($outfits) -1 )];
    $dydis = $sizes[rand(0, count($sizes) -1 )];
    $spalva = $colors[rand(0, count($colors) -1 )];
    $skaicius = rand(1, 9999);
    $kaina = $skaicius / 100;
    $nuolaida = rand(0, 8) ? rand(1, $skaicius) / 100 : 0;
    $kiekis = rand(0, 5);

    $sql = "INSERT INTO
    rubai
    ( id, rubas, dydis, spalva, kaina, nuolaida, kiekis )
    VALUES ($val, '$rubas', '$dydis', '$spalva', $kaina, $nuolaida, ".(($kiekis) ? $kiekis : 'NULL')." )
    ";
    $pdo->query($sql);
}