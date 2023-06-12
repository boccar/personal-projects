<?
$host = 'localhost';
$usuario = 'infre-urb';
$senha = 'ipMcPm8t3ZNAJ73S';
$bancoDados = 'infre-urb';

$conexao = new mysqli($host, $usuario, $senha, $bancoDados);
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>