<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CADASTRO DE PRODUTOS</title>
    <style>
        th,td { border: 1px solid black; text-align:center;}
    </style>
</head>
<body>
    PESQUISAR PRODUTOS<form action="index.php?link=pesquisa.php" method="post">
        <select name="tipo" id="input">
            <option value="nome" id="input">Nome:</option>
            <option value="quantidade" id="input">Quantidade:</option>
        </select>
        <input type="text" name="txtpesquisa" id="input" required><br>
        <input type="submit" id="input" value="BUSCA">
    </form><hr>
</body>
</html>

<?php
    /*require "conectar.php"; //ESTE CÓDIGO É QUANDO É PRA FAZER INSERÇÃO DE PESQUISA DE UM ITEM
	$nome = @$_REQUEST["nome"];
	if(!empty($nome)){  // se não estiver em branco o campo nome

    $sql = "SELECT *FROM produto WHERE nome='$nome'";*/

    include_once "conectar.php";
    if(isset($_POST["tipo"])) {
        $tipo = $_POST["tipo"];
        $pesquisa = $_POST["txtpesquisa"];

        $sql = "SELECT *FROM produto WHERE $tipo like '%$pesquisa%'";

        $res = mysqli_query($con,$sql);
        
        if(mysqli_affected_rows($con)==0) {
            echo "<br><br>REGISTRO NÃO ENCONTRADO!";
            }
            else {
                echo "<table><tr><th>ID</th><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Data do Cadastro</th><th>Descrição</th><th>EDITAR</th></tr>";
                while($registro=mysqli_fetch_assoc($res)) {
                    $cod = $registro["codigo"];
                    $nome = $registro["nome"];
                    $quantidade = $registro["quantidade"];
                    $preco = $registro["preco"];
                    $data = $registro["data"];
                    $descricao = $registro["descricao"];
                    echo "<tr><td>$cod</td><td>$nome</td><td>$quantidade</td><td>$preco</td><td>$data</td><td>$descricao</td><td><a href='index.php?link=pesquisa.php&cod=$cod'>X</td></tr>";
                    
                }
                echo "</table>";
            }
        }
?>

<?php
    if(isset($_GET["cod"])) {
		 $cod = $_GET["cod"]; 
		 
   	     $sql = "SELECT *FROM produto WHERE codigo=$cod";
	
		 $res = mysqli_query($con,$sql);

		 $registro = mysqli_fetch_assoc($res);
	 	 $cod = $registro["codigo"];
	 	 $nome = $registro["nome"];
	 	 $quantidade = $registro["quantidade"];
	 	 $preco = $registro["preco"];
         $data = $registro["data"];
         $descricao = $registro["descricao"];
	 	 
		
	    echo "<form action='index.php?link=alterar.php' method='post'>
        
	    Nome: <input type='text' id='input' name='nome' value='$nome'>";
	       
	   
	      echo "
          Qtd no Estoque: <input type='text' name='quantidade' id='input' value='$quantidade'><br><br>
          Preco: <input type='text' name='preco' id='input' value='$preco'>
          Data de Cadastro: <input type='text' name='data' id='input' value='$data'><br><br>
          Descrição:<br>
          <textarea name='descricao' id='input' value='$descricao' cols='25' rows='5'></textarea><br>
          <input type='submit' id='input' value='ALTERAR'>
          <a href='index.php?link=excluir.php&cod=$cod' style='text-decoration:none;'>
          <input type='button' id='input' value='EXCLUIR'></a>
          <input type='button' id='input' value='IMPRIMIR' onclick='window.print()'>
          </form>"; 
          } 
 




?>