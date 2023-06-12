<?
include('conn.php');

$id_solic = $_GET['id_solic'];

$consulta = "SELECT CURTIDA FROM solicitacao WHERE `ID` = $id_solic";
$resultados = $conexao->query($consulta);
while ($row = $resultados->fetch_assoc()) {
    $curtida = $row['CURTIDA'];
}

$curtida++;

$update = "UPDATE solicitacao SET `CURTIDA` = '$curtida' WHERE `ID` = '$id_solic'";

mysqli_query($conexao, $update);


echo
    '<script>
        window.location.href = "publicacao.php?id_solic='. $id_solic .'";
     </script>';
?>