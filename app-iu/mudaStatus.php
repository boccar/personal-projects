<?
include('conn.php');

$id_solic = $_GET['id_solic'];
$status = $_POST["categoria"];

$update = "UPDATE solicitacao SET `STATOS` = '$status' WHERE `ID` = '$id_solic'";

mysqli_query($conexao, $update);

//echo $id_solic, $status, $titulo;


echo
    '<script>
        window.location.href = "publicacao.php?id_solic='. $id_solic .'";
     </script>';
?>