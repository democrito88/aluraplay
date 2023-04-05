<?php

$dbPath = __DIR__ . '/../../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sql = 'ALTER TABLE videos ADD COLUMN `path` TEXT';
$statement = $pdo->prepare($sql);

$statement->execute();

header('Location /index.php');