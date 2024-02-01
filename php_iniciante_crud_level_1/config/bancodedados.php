<?php
$host="localhost";
$nome_DB="php_iniciante_crud_level_1";
$Usuario="root";
$Senha="";

try{
$conexao = new PDO("mysql:host={$host};dbname={$nome_DB}", $Usuario, $Senha);
   $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
 
?>