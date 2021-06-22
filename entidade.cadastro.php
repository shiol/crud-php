<?php include('head.php'); ?>
<h1>cadastro</h1>

<form action="entidade.cadastro.php" method="POST">
    <p><input type="text" name="codigo" placeholder="codigo" require></p>
    <p><input type="text" name="descricao" placeholder="descricao" require></p>
    <p><input type="text" name="valor" placeholder="valor" require></p>
    <input type="submit" value="salvar">
</form>

<?php
try {
    include('conexao.php');
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $valor = isset($_POST['valor']) ? $_POST['valor'] : null;

    $formValid = $codigo != '' && $descricao != '' && !is_null($valor);
    if ($formValid) {
        if ($formValid) {
            $query = "insert into entidades (id,codigo,descricao,valor) ";
            $query .= "values (uuid(),'$codigo','$descricao',$valor)";

            if ($conexao->exec($query) > 0) {
                $_SESSION['notification'] = "registro salvo com sucesso";
            }
        }
    }
} catch (Exception $e) {
    $_SESSION['notification'] = "erro: " . $e->getMessage();
} finally {
    $conexao = null;
}
?>

<p><a href="entidade.index.php">index</a></p>

<?php include('end.php'); ?>