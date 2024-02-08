<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Ler um Registro - Tutorial PHP CRUD</title>
    <!-- Última versão compilada e minimizada do Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Ler Produto</h1>
        </div>
        <!-- PHP para ler um registro estará aqui -->

        <?php
        // obter o valor do parâmetro passado, neste caso, o ID do registro
        // isset() é uma função do PHP usada para verificar se um valor existe ou não
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID do registro não encontrado.');
        // incluir a conexão com o banco de dados
        include 'config/bancodedados.php';
        // ler os dados do registro atual
        try {
            // preparar a consulta de seleção
            $query = "SELECT id, nome, descricao, preco FROM produtos WHERE id = ? LIMIT 0,1";
            $stmt = $conexao->prepare($query);
            // este é o primeiro ponto de interrogação
            $stmt->bindParam(1, $id);
            // executar nossa consulta
            $stmt->execute();
            // armazenar a linha recuperada em uma variável
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // valores para preencher nosso formulário
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $preco = $row['preco'];
        }
        // mostrar erro
        catch (PDOException $exception) {
            die('ERRO: ' . $exception->getMessage());
        }
        ?>

        <!-- temos nossa tabela HTML aqui onde o registro será exibido -->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Nome</td>
                <td><?php echo htmlspecialchars($nome, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><?php echo htmlspecialchars($descricao, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><?php echo htmlspecialchars($preco, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='index.php' class='btn btn-danger'>Voltar para ler produtos</a>
                </td>
            </tr>
        </table>

        <!-- Tabela HTML para exibir um registro estará aqui -->



    </div> <!-- fim do .container -->
    <!-- jQuery (necessário para os plugins JavaScript do Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Última versão compilada e minimizada do Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>