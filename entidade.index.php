<?php include('head.php'); ?>

<h1>entidades</h1>

<table>
    <tr>
        <th>id</th>
        <th>codigo</th>
        <th>descricao</th>
        <th>valor</th>
    </tr>
<?php
    include('conexao.php');
    $result = $conexao->query("select * from entidades");

    foreach ($result as $row) {
        echo '<tr><td>';
        echo $row['id'];
        echo '</td><td>';
        echo $row['codigo'];
        echo '</td><td>';
        echo $row['descricao'];
        echo '</td><td>';
        echo $row['valor'];
        echo '</td></tr>';
    }
?>
</table>

<p><a href="entidade.cadastro.php">cadastro</a></p>

<?php include('end.php'); ?>