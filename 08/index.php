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

echo '<h1>Authors:</h1>';

$sql = "SELECT
authors.id AS aid, `name`
FROM
authors
ORDER BY `name`
";

$stmt = $pdo->query($sql);

echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li>' . $row['aid'] .' '. $row['name'] . '</li>';
}
echo '</ul>';


echo '<h1>Books:</h1>';

$sql = "SELECT
books.id AS bid, title
FROM
books
ORDER BY title
";

$stmt = $pdo->query($sql);

echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li>' . $row['bid'] .' '. $row['title'] . '</li>';
}
echo '</ul>';

$sql = "SELECT COUNT(id), `type`
FROM
books
GROUP BY `type` 
-- ORDER BY COUNT(id);
";

$stmt = $pdo->query($sql);

// _dd($stmt->fetchAll());



echo '<h1>INNER JOIN:</h1>';

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


echo '<h1>LEFT JOIN:</h1>';

$sql = "SELECT
authors.id AS aid, `name`, books.id AS bid, title
FROM
authors
LEFT JOIN books
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


echo '<h1>RIGHT JOIN:</h1>';

$sql = "SELECT
a.id AS aid, `name`, b.id AS bid, title
FROM
authors AS a
RIGHT JOIN books AS b
ON a.id = b.author_id
ORDER BY `name`, title
";

$stmt = $pdo->query($sql);

echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li>' . $row['aid'] .' '. $row['name'] .' '.  $row['bid'] .' '. $row['title'] . '</li>';
}
echo '</ul>';