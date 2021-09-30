<?php
    require "conectar.php";
    
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $data = $_POST["data"];
    $descricao = $_POST["descricao"];

    $campos = "nome='$nome',quantidade='$quantidade',preco='$preco',data='$data',descricao='$descricao'";

    $sql = "UPDATE produto SET $campos WHERE nome='$nome'";

    if(mysqli_query($con, $sql)) {
        echo "CADASTRO ATUALIZADO COM SUCESSO!";
        }
        else {
            echo "ERRO AO ATUALIZAR CADASTRO" . mysqli_error($con);
            }
    echo "<hr><a href='index.php?link=pesquisa.php'>VOLTAR</a>";

    mysqli_close($con);
?>