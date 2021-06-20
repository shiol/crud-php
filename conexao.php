<?php
try {
    $dns = "mysql:host=localhost;dbname=test";
    $username = "root";
    $password = "";

    $conexao = new PDO($dns, $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>conexao ok</p>";
} catch (Exception $e) {
    echo "<p>erro de conexao: " . $e->getMessage() . "</p>";
}
