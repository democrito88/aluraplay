<?php

$dbPath = __DIR__ . '/../../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, "Eu");
$statement->bindValue(2, 'eu@mail.com');
$statement->bindValue(3, password_hash('eu', PASSWORD_ARGON2ID));

$statement->execute();

header('Location /index.php');