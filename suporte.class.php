<?php

require 'config.php';
require 'config2.php';

class Suporte
{
    public function getUserW($nome, $senha){
        global $pdo;
        $sql = "SELECT * FROM users WHERE name = ? AND senha = ?";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, MD5($senha));
        $sql->execute();

        return $sql->fetchAll();
    }
}