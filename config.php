<?php
try {
    $pdo = new PDO("mysql:dbname=suporte;host=localhost", "root", "1234");
    global $pdo;
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}
