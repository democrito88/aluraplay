<?php

$dbPath = __DIR__ . '/../../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec(
    'CREATE TABLE videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);
    CREATE TABLE usuarios (id INTEGER PRIMARY KEY, nome TEXT, email TEXT, senha TEXT);'
);