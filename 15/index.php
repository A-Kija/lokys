<?php

//CRUD

$host = '127.0.0.1';
$db   = 'select_test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);


$sql = "SELECT
*
FROM
animals
WHERE specie_id = 1
";

$stmt = $pdo->query($sql);
$out = $stmt->fetchAll();

echo '<pre>';
print_r($out);
echo '</pre>';