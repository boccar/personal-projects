<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Solicitação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php
    include('conn.php');
    include ('header.php');
    ?>

    <!-- Seção de Cadastro -->
    <section id="cadastro-section">
        <h2>Cadastro de Solicitação</h2>
        <form method="post" action="salva_solicitacao.php">
            <!-- <label for="foto-input">Foto:</label>
            <input type="file" id="foto-input" accept="image/*" capture="camera" onchange="capturarFoto()" required>
            <img id="foto-preview" src="#" alt="Preview da Foto" width="200"><br> -->

            <label for="titulo-input">Título:</label>
            <input type="text" id="titulo-input" name="titulo" required><br>
            <br>
            <label for="categoria-select">Categoria:</label>
            <? 
            $consulta = "SELECT NOME FROM setor";
            $resultado = $conexao->query($consulta);

            if ($resultado->num_rows > 0) {
                echo "<select id='categoria-select' name='categoria' required>";
                while ($row = $resultado->fetch_assoc()) {
                    $nome = $row["NOME"];
                    echo "<option value='$nome'>$nome</option>";
                }
                echo "</select>";
            } else {
                echo "Nenhum dado encontrado na tabela.";
            } 
            ?>
            <br>

            <p for="problema-input">Descrição do Problema:</p>
            <textarea id="problema-input" name="descri" required></textarea><br>

            <input type="submit" value="Salvar">
        </form>
        
            <br>
            <a href='feed.php'><button>voltar</button></a>
    </section>
    <script src="script.js"></script>
</body>
</html>
