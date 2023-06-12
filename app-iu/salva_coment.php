<?
include('conn.php');
include('header.php');
session_start();

$id_solic = $_GET['id_solic'];
$comentario = $_POST['comentario'];
$cpf = $_SESSION['cpf_usuario'];
$cpfFiltrado = str_replace(['.', '-'], '', $cpf);
$data_hoje = date('Y-m-d');


$consulta = "SELECT * FROM usuario WHERE CPF = '$cpfFiltrado'";
$resultados = $conexao->query($consulta);
while ($row = $resultados->fetch_assoc()) {
    $id_usuario = $row['ID'];
}

$sql = "INSERT INTO comentario (
    DESCRICAO, 
    DATA_COMENTARIO, 
    ID_USUARIO, 
    ID_SOLICITACAO
) 
VALUES (
    ?, ?, ?, ?
)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssii", $comentario, $data_hoje, $id_usuario, $id_solic);

if ($stmt->execute()) {
 
} else {
    echo "Erro ao salvar a solicitação: " . $stmt->error;
}

echo '<script>

    window.location.href = "publicacao.php?id_solic='. $id_solic. '";
  </script>';

?>