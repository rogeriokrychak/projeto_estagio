<?php
    include_once "conectar.php";

    
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $data = $_POST["data"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO produto(nome,quantidade,preco,data,descricao)VALUES('$nome','$quantidade','$preco','$data','$descricao')";

    mysqli_query($con,$sql) or die ("Erro ao conectar:".mysqli_error());

    echo"<br><br>CADASTRO REALIZADO COM SUCESSO!!!";

    mysqli_close($con);
?>