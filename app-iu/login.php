<?php
session_start();
include('conn.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica se o CPF e a senha estão corretos (você precisa implementar a validação adequada)
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    
    $_SESSION['cpf_usuario'] = $cpf;

    $cpfFiltrado = str_replace(['.', '-'], '', $cpf);

    $consulta = "SELECT * FROM usuario WHERE CPF = '$cpfFiltrado' AND SENHA = '$senha'";
    $resultado = $conexao->query($consulta);


    if ($resultado->num_rows == 1) {
        // Define a sessão de login e redireciona para a página restrita
        $_SESSION['logado'] = true;
        header('Location: feed.php');
        exit;
    } else {
        // Exibe mensagem de erro caso o CPF ou a senha estejam incorretos
        $erro = "CPF ou senha incorretos";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label>Digite apenas numeros:</label><br>
        <input placeholder="CPF:" type="text" id="cpf" name="cpf" oninput="formatarCPF(this)" maxlength="14" required><br><br>
        <input placeholder="Senha:" type="password" id="senha" name="senha" required><button type="button" onclick="togglePassword()"><i class="fas fa-eye"></i></button><br><br>
        <input type="submit" value="Entrar">
        <a href="cadastro.php"><button type="button">Cadastre-se</button></a>
    </form>


    <script>
        function togglePassword() {
            var senhaInput = document.getElementById("senha");
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
            } else {
                senhaInput.type = "password";
            }
        }

         function formatarCPF(cpfInput) {
            var cpf = cpfInput.value;
            cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
            cpf = cpf.replace(/(\d{3})(\d{2})$/, '$1-$2'); // Adiciona o traço

            cpfInput.value = cpf; // Atualiza o valor do campo de entrada
        }
    </script>
</body>
</html>
