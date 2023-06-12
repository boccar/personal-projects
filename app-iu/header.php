<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include('conn.php');
        session_start();

        $cpf = $_SESSION['cpf_usuario'];
        $cpfFiltrado = str_replace(['.', '-'], '', $cpf);
        

        // Verifica se o usuário não está logado, redireciona para a página de login
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header('Location: login.php');
            exit;
        }

        $consulta = "SELECT * FROM usuario WHERE CPF = '$cpfFiltrado'";
        $resultados = $conexao->query($consulta);
        while ($row = $resultados->fetch_assoc()) {
            $nome = $row['NOME'];
        }
    ?>


    <!-- Cabeçalho -->
    <header>
        <label><?echo $nome;?></label>
        <button id="menu-button">Menu</button>
    </header>

    <!-- Janela de Menu -->
    <div class="menu-overlay" id="menu-overlay">
        <div class="menu-content">
            
            <h2><?php echo $nome;?></h2>
            <h3><?echo $cpf;?></h3>
            <a href="cadastra_setor.php"><button>Cadastrar setor</button></a>
            <button id="close-menu">Fechar</button>
            <a href="logout.php"><button>Sair</button></a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
    