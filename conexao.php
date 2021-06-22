<?php
try {
    $dns = "mysql:host=localhost;dbname=test";
    $username = "root";
    $password = "";

    $conexao = new PDO($dns, $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $_SESSION['notification'] = "conexao ok";
} catch (Exception $e) {
    $_SESSION['notification'] = "erro de conexao: " . $e->getMessage();
}
