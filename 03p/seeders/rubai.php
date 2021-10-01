<?php



require __DIR__.'/../bootstrap.php';


$host = getSetting('host');
$db   = getSetting('db');
$user = getSetting('user');
$pass = getSetting('pass');
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE           , PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES  , false,
];

$pdo = new PDO($dsn, $user, $pass, $options);


$sql = "DROP TABLE IF EXISTS
sizes, outfits_tags, outfits_cats, outfits, tags, cats, users;
";
$pdo->query($sql);


$sql = "CREATE TABLE 
users (
    id       smallint PRIMARY KEY AUTO_INCREMENT,
    user	 varchar(70),
    pass	 char(32)
);
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

$sql = "CREATE TABLE
tags (
    id  smallint PRIMARY KEY AUTO_INCREMENT,
    title  varchar(30)
);
";
$pdo->query($sql);

$sql = "CREATE UNIQUE INDEX tags_titles
ON tags (title)";

$pdo->query($sql);

$sql = "CREATE TABLE
outfits_tags (
    outfit_id   smallint,
    tag_id      smallint,
    FOREIGN KEY (outfit_id) REFERENCES outfits(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);
";    
$pdo->query($sql);

$sql = "CREATE UNIQUE INDEX tags_on_product
ON outfits_tags (outfit_id, tag_id)";

$pdo->query($sql);

$sql = "CREATE TABLE
cats (
    id  smallint PRIMARY KEY AUTO_INCREMENT,
    title  varchar(30),
    parent smallint
);
";
$pdo->query($sql);

$sql = "CREATE TABLE
outfits_cats (
    outfit_id   smallint,
    cat_id      smallint,
    FOREIGN KEY (outfit_id) REFERENCES outfits(id),
    FOREIGN KEY (cat_id) REFERENCES cats(id)
);
";    
$pdo->query($sql);

$sql = "CREATE UNIQUE INDEX cats_on_product
ON outfits_cats (outfit_id, cat_id)";

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

$tags = [
    'Stilinga', 'Super madinga', 'Tinka metalistam', 'Nauja kolekcija',
    'Išpardavimas', 'Lengvai plaunami', 'Sportinio stiliaus',
    'Paskutiniai vienetai'
];

$users = [
    ['Jonas', '123'],
    ['Kristina', '123'],
    ['Bebras', '123']
];

$cats_top = [
    ['id' => 1, 'parent' => 0, 'title' => 'Vyriški'],
    ['id' => 2, 'parent' => 0, 'title' => 'Moteriški'],
];

$cats_1 = [
    ['id' => 3, 'parent' => 1, 'title' => 'Žiemai'],
    ['id' => 4, 'parent' => 1, 'title' => 'Vasarai'],
    ['id' => 5, 'parent' => 1, 'title' => 'Namie'],
    ['id' => 6, 'parent' => 1, 'title' => 'Atostogoms'],
];

$cats_2 = [
    ['id' => 7, 'parent' => 2, 'title' => 'Žiemai'],
    ['id' => 8, 'parent' => 2, 'title' => 'Vasarai'],
    ['id' => 9, 'parent' => 2, 'title' => 'Vakarėliams'],
    ['id' => 10, 'parent' => 2, 'title' => 'Paplūdimiui'],
];

foreach ($users as $user) {
    $u = $user[0];
    $p = md5($user[1]);
    $sql = "INSERT INTO
    users
    (user, pass)
    VALUES ( '$u', '$p' )
    ";
    $pdo->query($sql);
}

foreach (array_merge($cats_top, $cats_1, $cats_2) as $cat) {
    $title = $cat['title'];
    $parent = $cat['parent'];
    $sql = "INSERT INTO
    cats
    (title, parent)
    VALUES ( '$title', $parent )
    ";
    $pdo->query($sql);
}

foreach ($tags as $tag) {
    $sql = "INSERT INTO
    tags
    (title)
    VALUES ( '$tag' )
    ";
    $pdo->query($sql);
}


foreach (range(1, 50) as $val) {
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
        VALUES ( '$size', $amount, $val )
        ";
        $pdo->query($sql);
    }

    foreach (range(1, count($tags)) as $tagId) {
        if (rand(0, 4)) {
            continue;
        }
        $sql = "INSERT INTO
        outfits_tags
        (outfit_id, tag_id)
        VALUES ( $val, $tagId )
        ";
        $pdo->query($sql);
    }

    $topCat = rand(1, 2);
    $seconCat = rand(0, 3);
    $sql = "INSERT INTO
    outfits_cats
    (outfit_id, cat_id)
    VALUES ( $val, $topCat )
    ";
    $pdo->query($sql);

    

    if ($topCat === 1) {
        $catId = $cats_1[$seconCat]['id'];
    }
    elseif ($topCat === 2) {
        $catId = $cats_2[$seconCat]['id'];
    }
    $sql = "INSERT INTO
    outfits_cats
    (outfit_id, cat_id)
    VALUES ( $val, $catId )
    ";
    $pdo->query($sql);
}