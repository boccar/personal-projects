<?php
// Conectar ao banco de dados
include('conn.php');

// Substitua esta consulta pelo código necessário para carregar as solicitações da tabela
$consulta = "SELECT * FROM solicitacao";
$resultados = $conexao->query($consulta);

// Gerar array com as solicitações
$solicitacoes = array();
if ($resultados->num_rows > 0) {
    while ($row = $resultados->fetch_assoc()) {
        $solicitacoes[] = $row;
    }
}

// Retornar as solicitações em formato JSON
header('Content-Type: application/json');
echo json_encode($solicitacoes);

// Fechar a conexão com o banco de dados
$conexao->close();
?>
