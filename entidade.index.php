<?php include('head.php'); ?>

<h1>entidades</h1>

<p><a href="entidade.cadastro.php">cadastro</a></p>

<table>
    <tr>
        <th>id</th>
        <th>codigo</th>
        <th>descricao</th>
        <th>valor</th>
        <th>editar</th>
        <th>excluir</th>
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
        echo '</td><td>';
        echo "<a href=\"entidade.cadastro.php?id=" . $row['id'] . "&acao=editar\">editar</a>";
        echo '</td><td>';
        echo "<a href=\"entidade.cadastro.php?id=" . $row['id'] . "&acao=excluir\">excluir</a>";
        echo '</td></tr>';
    }
    ?>
</table>

<?php include('end.php'); ?>