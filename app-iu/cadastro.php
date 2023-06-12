<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css-cadastro.css">
    
</head>

<body>
    <main>
        <h2>Cadastro</h2>
        <?php if (isset($erro)) : ?>
            <p style="color: red;"><?php echo $erro; ?></p>
        <?php endif; ?>
        <form method="post" action="cadastra_usuario.php">
            <input placeholder="Nome:" type="text" id="nome" name="nome" required><br><br>
            <label>Digite apenas numeros:</label><br>
            <input placeholder="CPF:" type="text" id="cpf" name="cpf" oninput="formatarCPF(this)" maxlength="14" required><br><br>
            <input placeholder="Senha:" type="password" id="senha" name="senha" required><button type="button" onclick="togglePassword()"><i class="fas fa-eye"></i></button><br><br>
            <input type="submit" value="Cadastrar">
            <a href="login.php"><button type="button">Voltar</button></a>
        </form>
    </main>


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