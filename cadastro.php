<?php
try {
    include('conexao.php');

    $codigo = $_GET['codigo'];
    $descricao = $_GET['descricao'];
    $valor = $_GET['valor'];

    if ($codigo != '' && $descricao != '' && !is_null($valor)) {

        $query = "insert into entidades (id,codigo,descricao,valor) ";
        $query .= "values (uuid(),'$codigo','$descricao',$valor)";

        if ($conexao->exec($query) > 0) {
            echo '<p>registro salvo com sucesso</p>';
        } else {
            echo '<p>não salvo</p>';
        }
    } else {
        echo '<p>valores não podem ser nulos</p>';
    }
} catch (Exception $e) {
    echo '<p>erro: ' . $e->getMessage() . '</p>';
} finally {
    $conexao = null;
}

echo '<p><a href="index.php">index</a></p>';
echo '<p><a href="cadastro.html">cadastro</a></p>';
