<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SISTEMA CADASTRO</title>
</head>
<body>
    <header>
        <img src="product.svg" alt="" id="img"><h1>Sistema Cadastro</h1>
    </header>

    <?php
        @$link = @$_GET["link"];
    ?>

    <section>

        <nav id="nav">
            <?php include "menu.html" ?>
        </nav>

        <article>
            <?php include "conteudo.php" ?>
        </article>

    </section>

    <footer>
        <h4>&copy; <?= date('Y'); ?></h4>
    </footer>
    
</body>
</html>
