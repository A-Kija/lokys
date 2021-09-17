<?php

//JOIN

$host = '127.0.0.1';
$db   = 'kazkas_jaudas';
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
authors.id AS aid, `name`, books.id AS bid, title
FROM
authors
INNER JOIN books
ON authors.id = books.author_id
ORDER BY `name`, title
";

$stmt = $pdo->query($sql);

echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li>' . $row['aid'] .' '. $row['name'] .' '.  $row['bid'] .' '. $row['title'] . '</li>';
}
echo '</ul>';