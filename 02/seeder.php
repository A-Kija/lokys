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

// CREATE TABLE table_name (
//     column1 datatype,
//     column2 datatype,
//     column3 datatype,
//    ....
// );

// DROP TABLE table_name;

$sql = "DROP TABLE
trees44;
";
$pdo->query($sql);

$sql = "CREATE TABLE 
trees44 (
    id      smallint,
    title	varchar(30),
    height	decimal(4, 2),
    `type`	tinyint	
);
";
$pdo->query($sql);

$trees = [
    ['Pušis', 2],
    ['Eglė', 2],
    ['Kokosas', 3],
    ['Beržas', 1],
    ['Ąžuolas', 1],
    ['Klevas', 1],
    ['Kadagys', 2],
    ['Kriaušė', 1],
    ['Kedras', 2],
    ['Kaštonas', 1],
    ['Bananas', 3],
    ['Agrastas', 2],
    ['Serbentas', 1],
    ['Liepa', 1],
    ['Šermukšnis', 1],
    ['Kalėdų Eglė', 2],
    ['Datulė', 3],
    ['Vynuogė', 1],
];

foreach (range(1, 400) as $val) {

    $index = rand(0, count($trees) -1 );
    $t = $trees[$index];
    $type = $t[1];
    $tree = $t[0];
    $height = rand(1, 9999) / 100;

    $sql = "INSERT INTO
    trees44
    (id, title, height, `type`)
    VALUES ($val, '$tree', $height, $type)
    ";
    $pdo->query($sql);
}