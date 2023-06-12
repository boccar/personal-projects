<?php

include('conn.php');

$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$endereco = $_GET['endereco'];
$rua = $_GET['rua'];
$bairro = $_GET['bairro'];
$numero = $_GET['numero'];
$id_solic = $_GET['id_solic'];

    // Preparar a consulta SQL para inserir os dados da solicitação
    $sql = "INSERT INTO `local` (
        BAIRRO, 
        RUA, 
        NUMERO, 
        LATITUDE, 
        LONGITUDE, 
        ID_SOLIC
    ) 
    VALUES (
        ?, ?, ?, ?, ?, ?
    )";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssissi", $bairro, $rua, $numero, $latitude, $longitude, $id_solic);


    // Executar a consulta
    if ($stmt->execute()) {
     
    } else {
        // Ocorreu um erro ao salvar a solicitação
        echo "Erro ao salvar a solicitação: " . $stmt->error;
    }

    echo '<script>
    alert("Dados salvos com sucesso!");
    window.location.href = "feed.php";
  
    
  </script>';

  //
?>
