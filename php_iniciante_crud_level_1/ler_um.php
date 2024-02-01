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
        <div class="paheheader">
            <h1>Ler produto</h1>
        </div>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            echo "O valor do parâmetro 'id' é: $id";
        } else {
            die("Parâmetro 'id' não encontrado na URL.");
        }

        include 'config/bancodedados.php';

        try {
            $query = "SELECT id, nome, descricao, preco
            FROM produtos WHERE id=?
            LIMIT 0,1";

            $stmt = $con->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $nome = $row[':nome'];
            $descricao = $row['descricao'];
            $preco = $row['preco'];
        } catch (PDOException $exception) {
            $erro = "Erro " . $exception->getMessage();
            die($erro);
        }

        ?>
<h1>oi</h1>
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Nome</td>
                <td><?php echo htmlspecialchars($nome,ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><?php echo htmlspecialchars($descricao,ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><?php echo htmlspecialchars($preco,ENT_QUOTES) ?></td>
            </tr>
        </table>



    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>