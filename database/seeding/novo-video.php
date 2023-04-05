<?php

$dbPath = __DIR__ . '/../../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, "https://www.youtube.com/watch?v=WyyJbdlKiEI");
$statement->bindValue(2, '"Hi" in Japanese in 7 Different Situations! (Not Konnichiwa)');

$statement->execute();

header('Location /index.php');