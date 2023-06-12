<?php
// Conectar ao banco de dados
include('conn.php');

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    $data_hoje = date('Y-m-d');
    $hora_atual = date("H:i:s");
    

    $cpfFiltrado = str_replace(['.', '-'], '', $cpf);

    $consulta = "SELECT * FROM usuario WHERE CPF = '$cpfFiltrado'";
    $resultado = $conexao->query($consulta);

    if ($resultado->num_rows >= 1) { 
        echo '<script>
                alert("CPF já cadastrado")
                window.location.href = "cadastro.php";
            </script>';
    } else {
        // Preparar a consulta SQL para inserir os dados da solicitação
        $sql = "INSERT INTO usuario (
            NOME, 
            CPF, 
            SENHA,
            data_cadastro,
            hora_cadastro

        ) 
        VALUES (
            ?, ?, ?, ?, ?
        )";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssss", $nome, $cpfFiltrado, $senha, $data_hoje, $hora_atual);


        // Executar a consulta
        if ($stmt->execute()) {
            echo '<script>
                    alert("cadastro feito! Bem vindo(a) '. $nome .'")
                    
                    window.location.href = "login.php";
                </script>';
        } else {
            // Ocorreu um erro ao salvar a solicitação
            echo "Erro ao salvar a solicitação: " . $stmt->error;
        }
    }

    // Verificar se a conexão foi estabelecida com sucesso
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

   // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    echo "Bah não deu";
}

?>
