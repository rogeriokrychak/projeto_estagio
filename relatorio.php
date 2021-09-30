<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SISTEMA CADASTRO</title>
    <style>
        th,td { border: 1px solid black; text-align:center; }
    </style>
</head>
<body>
    <h1>RELATÓRIO DE PRODUTOS</h1>
    <form action="index.php?link=relatorio.php" method="post">
    Nome: <input type="text" name="nome" id="input" maxlength="40"><br>
    <input type="submit" id="input" value="PESQUISAR">
    </form><hr>
</body>
</html>

<?php
    require "conectar.php";

    $nome = @$_REQUEST["nome"];

    $sql = "SELECT *FROM produto WHERE nome LIKE '%$nome%' ORDER BY nome ASC";

    $res = mysqli_query($con,$sql);

    if(mysqli_affected_rows($con)==0) {
        echo "CADASTRO NÃO ENCONTRADO!";
        }
        else {
            echo "<table border=2>
            <tr><th>ID</th><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Data de Cadastro</th><th>Descrição</th></tr>";

        while($registro=mysqli_fetch_assoc($res)) {
            $ID = $registro["codigo"];
            $nome = $registro["nome"];
            $quantidade = $registro["quantidade"];
            $preco = $registro["preco"];
            $data = $registro["data"];
            $descricao = $registro["descricao"];

        echo "<tr><td>$ID</td><td>$nome</td><td>$quantidade</td><td>$preco</td><td>$data</td><td>$descricao</td></tr>";
        }
        echo "</table>";

        echo "<hr><input type='button' id='input' value='IMPRIMIR' onclick='javascript:window.print()'>";
        echo "<a href='index.php?link=pesquisa.php' style='text-decoration:none;'>
        <input type='button' id='input' value='VOLTAR'></a>"; 
        }

?>