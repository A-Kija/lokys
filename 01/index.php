<?php

//CRUD

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



// C
// INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);

// $sql = "INSERT INTO
// trees
// (title, height, `type`)
// VALUES ('Agrastas', 0.7, 2)
// ";

// $pdo->query($sql);


// D
// DELETE FROM table_name WHERE condition;

// $sql = "DELETE FROM
// trees
// WHERE id > 16 AND id < 32
// ";

// $pdo->query($sql);


// U
// UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;

// $sql = "UPDATE
// trees
// SET title = 'Slyva'
// WHERE id > 40
// ";

// $pdo->query($sql);

// R
// SELECT column_name(s) FROM table_name

$sql = "SELECT
id, title, height, `type`
FROM
trees44
WHERE `type` = 1
";

$stmt = $pdo->query($sql);

echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li>' . $row['id'] .' '. $row['title'] .' '. $row['height'] .' '. $row['type'] . '</li>';
}
echo '</ul>';