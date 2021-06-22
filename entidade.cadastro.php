<?php include('head.php'); ?>
<h1>cadastro</h1>

<p><a href="entidade.index.php">index</a></p>

<form action="entidade.cadastro.php" method="POST">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="acao" name="acao">
    <p><input type="text" id="codigo" name="codigo" placeholder="codigo" required></p>
    <p><input type="text" id="descricao" name="descricao" placeholder="descricao" required></p>
    <p><input type="text" id="valor" name="valor" placeholder="valor" required></p>
    <input type="submit" name="submit" value="submit">
</form>

<?php
try {
    include('conexao.php');

    $id = $_POST['id'] ?? $_GET['id'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $valor = $_POST['valor'] ?? '';

    $acao = $_GET['acao'] ?? $_POST['acao'] ?? '';
    $submit = $_POST['submit'] ?? false;
    
    $query;
    if ($id != '' && $acao == 'editar') {
        $query = "update entidades set codigo = '$codigo', ";
        $query .= "descricao = '$descricao', ";
        $query .= "valor = $valor ";
        $query .= "where id = '$id'";
    } else if ($id != '' && $acao == 'excluir') {
        $query = "delete from entidades ";
        $query .= "where id = '$id'";
    } else if ($id == '') {
        $query = "insert into entidades (id, codigo, descricao, valor) ";
        $query .= "values (uuid(), '$codigo', '$descricao', $valor)";
    }
    
    if ($submit) {
        $rows = $conexao->exec($query);
        $_SESSION['notification'] = "$rows linhas alteradas";
    }

    $result = $conexao->query("select * from entidades where id = '$id'");
    foreach ($result as $row) {
        echo '<script>';
        echo "document.getElementById('id').value = '" . $row['id'] . "';";
        echo "document.getElementById('codigo').value = '" . $row['codigo'] . "';";
        echo "document.getElementById('descricao').value = '" . $row['descricao'] . "';";
        echo "document.getElementById('valor').value = " . $row['valor'] . ";";
    
        echo "document.getElementById('acao').value = '" . $acao . "';";
        echo '</script>';
    }
} catch (Exception $e) {
    $_SESSION['notification'] = "erro: " . $e->getMessage();
} finally {
    $conexao = null;
}
?>

<?php include('end.php'); ?>