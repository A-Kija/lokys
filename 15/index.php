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


// $sql = "SELECT
// m.id as mig, m.name as mname, m.surname as msurname
// FROM
// managers as m
// LEFT JOIN animals as a
// ON a.manager_id = m.id
// GROUP BY mig
// HAVING COUNT(a.id) = 0
// ";

$sql = "SELECT
s.name as sn, COUNT(a.id) as amount
FROM 
animals AS a
LEFT JOIN species AS s
ON a.specie_id = s.id
WHERE a.specie_id IN (SELECT
id
FROM
species
WHERE `name` IN ('Plėšrūnai', 'Paukščiai', 'Žuvys')
)
GROUP BY s.id
";

// $sql = "SELECT
// id
// FROM
// species
// WHERE `name` IN ('Plėšrūnai', 'Paukščiai', 'Žuvys')
// ";

$stmt = $pdo->query($sql);
$out = $stmt->fetchAll();

echo '<pre>';
print_r($out);
echo '</pre>';