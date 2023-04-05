<?php

$dbPath = __DIR__ . '/../../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sql = 'UPDATE videos SET url = ? WHERE id = ?;';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, 'https://www.youtube.com/embed/WyyJbdlKiEI');
$statement->bindValue(2, 2);

$statement->execute();

header('Location /index.php');