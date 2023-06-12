<?php
// Conectar ao banco de dados
include('conn.php');

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os valores do formulário
    // $foto = $_FILES["foto"]["tmp_name"];
    
    $titulo = $_POST["titulo"];
    $categoria = $_POST["categoria"];
    $descri = $_POST["descri"];
    $status = "Em análise";
    $data_hoje = date('Y-m-d');
    $curtida = 0;

    // Validações adicionais podem ser feitas aqui


    
    // Verificar se a conexão foi estabelecida com sucesso
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Preparar a consulta SQL para inserir os dados da solicitação
    $sql = "INSERT INTO solicitacao (
        TITULO, 
        CATEGORIA, 
        DESCRI, 
        DATA_SOLICITACAO, 
        FOTO, 
        STATOS, 
        CURTIDA
    ) 
    VALUES (
        ?, ?, ?, ?, null, ?, ?
    )";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssi", $titulo, $categoria, $descri, $data_hoje, $status, $curtida);


    // Executar a consulta
    if ($stmt->execute()) {
        
    } else {
        // Ocorreu um erro ao salvar a solicitação
        echo "Erro ao salvar a solicitação: " . $stmt->error;
    }

    $id_solic = $stmt->insert_id;

   // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    echo "Bah não deu";
}




echo '<script>
    
    window.location.href = "obtemLocalizacao.php?id_solic='.$id_solic.'";
    
  </script>';

?>
