<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Ler um Registro - Tutorial PHP CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            echo "O valor do parâmetro 'id' é: $id";
        } else {
            die("Parâmetro 'id' não encontrado na URL.");
        }

        include 'config/bancodedados.php';

        try {
        } catch (PDOException $exception) {
            $erro = "Erro " . $exception->getMessage();
            die($erro);
        }

        $query = "SELECT id, nome, descricao, preco
        FROM produtos WHERE id=?
        LIMIT 1;"

        ?>
        <div class="paheheader">
            <h1>Ler produto</h1>0

        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>