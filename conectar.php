<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "produto";

    $con = mysqli_connect($servidor,$usuario,$senha,$banco);

    if(!$con) die("Falha ao conectar" . mysqli_error());

    //echo"Conexão realizada com sucesso.";
?>