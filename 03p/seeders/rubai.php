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
outfits, sizes;
";
$pdo->query($sql);



$sql = "CREATE TABLE 
outfits (
    id       smallint PRIMARY KEY,
    `type`	 varchar(70),
    color	 varchar(20),
    price    decimal(6,2),
    discount decimal(6,2)
);
";
$pdo->query($sql);

$sql = "CREATE TABLE 
sizes (
    id          smallint PRIMARY KEY AUTO_INCREMENT,
    size	    varchar(6),
    amount      tinyint NULL,
    outfit_id   smallint,
    FOREIGN KEY (outfit_id) REFERENCES outfits(id)
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
    $type = $outfits[rand(0, count($outfits) -1 )];
    $color = $colors[rand(0, count($colors) -1 )];
    $priceTag = rand(1, 9999);
    $price = $priceTag / 100;
    $discount = rand(0, 8) ? rand(1, $priceTag) / 100 : 0;

    $sql = "INSERT INTO
    outfits
    (id, `type`, color, price, discount)
    VALUES ( $val, '$type', '$color', $price, $discount )
    ";
    $pdo->query($sql);

    foreach ($sizes as $size) {
        if (rand(0, 1)) {
            continue;
        }
        $amount = rand(0, 5);
        $sql = "INSERT INTO
        sizes
        (size, amount, outfit_id)
        VALUES ( '$size', ".($amount ? $amount : 'NULL').", $val)
        ";
        $pdo->query($sql);
    }
}