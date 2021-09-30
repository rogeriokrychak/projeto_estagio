<?php
    require "conectar.php";

    $cod = $_GET["cod"];

    $sql = "DELETE FROM produto WHERE codigo=$cod";

    if(mysqli_query($con,$sql)) {
        echo "EXCLUSÃO DO CADASTRO COM SUCESSO!!!";
        } else {
            echo "ERRO AO EXCLUIR CADASTRO!!! " . mysqli_error($con);
            }
    echo "<hr><a href='index.php?link=pesquisa.php'>Voltar</a>";
    mysqli_close($con);

?>