<?php
try {
    $pdo = new PDO("mysql:dbname=suporte;host=localhost", "root", "");
    global $pdo;
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}
