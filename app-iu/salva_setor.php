<?php
// Conectar ao banco de dados
include('conn.php');

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os valores do formulário
    // $foto = $_FILES["foto"]["tmp_name"];
    
    $nome = $_POST["nome"];
    $descri = $_POST["descri"];

    // Verificar se a conexão foi estabelecida com sucesso
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Preparar a consulta SQL para inserir os dados da solicitação
    $sql = "INSERT INTO setor (
        NOME,  
        DESCRI
    ) 
    VALUES (
        ?, ?
    )";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nome, $descri);


    // Executar a consulta
    if ($stmt->execute()) {
        // A solicitação foi salva com sucesso
        echo "Solicitação salva com sucesso!";
    } else {
        // Ocorreu um erro ao salvar a solicitação
        echo "Erro ao salvar a solicitação: " . $stmt->error;
    }

   // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    echo "Bah não deu";
}

echo '<script>
    alert("Dados salvos com sucesso!");
    window.location.href = "feed.php";
  </script>';

?>
