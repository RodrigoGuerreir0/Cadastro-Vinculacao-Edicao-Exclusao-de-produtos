<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Ler Registros - Tutorial de PHP CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <style>
        m-r-1em {
            margin-right: 1em;
        }

        m-r-1em {
            margin-top: none;
        }

        m-l-1em {
            margin-left: 1em;
        }

        m-b-1em {
            margin-bottom: 1em;
        }
    </style>
    <div class="container">
        <div class="page-header">
            <h1>Ler produtos</h1>
        </div>

        <?php

        include './config/bancodedados.php';

        $query = "SELECT id, nome, descricao, preco FROM produtos ORDER BY id DESC";

        $stmt = $conexao->prepare($query);
        $stmt->execute();
        // Abaixo desta linha, insira um comentário indicando que "É assim que obtemos o número de linhas retornadas:"

        // "É assim que obtemos o número de linhas retornadas:"
        $num = $stmt->rowCount();

        echo '<a href="criar.php" class="btn btn-primary m-b-1em">Criar novo produto</a>';
        if($num>0){
            echo '<table class="table table-hover table-responsive table-bordered"></table>';
        }else{
            echo '<div class="alert alert-danger" role="alert">Nenhum registro foi encontrado.</div>';
        }


        ?>


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>