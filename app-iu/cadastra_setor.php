<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Setor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 30%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<body>
    <?php
    include('conn.php');
    include ('header.php');

    $sql = "SELECT `ID`, NOME, DESCRI FROM setor";
    $result = $conexao->query($sql);
    ?>

    <!-- Seção de Cadastro -->
    <section id="cadastro-section">
        <h2>Cadastro de Setor</h2>
        <form method="post" action="salva_setor.php">
            <label for="titulo-input">Nome do setor:</label>
            <input type="text" id="nome" name="nome" required><br>
            <br>
            <label for="problema-input">Descrição:</label>
            <textarea id="descri" name="descri" required></textarea><br>
            <br>
            <center><input type="submit" value="Salvar"></center>
        </form>

        <br>

        <h1>Resultados da Consulta SQL</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
        </tr>
        <?php
        // Verificar se há resultados da consulta
        if ($result->num_rows > 0) {
            // Iterar sobre os resultados e imprimir em uma tabela
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["NOME"] . "</td>";
                echo "<td>" . $row["DESCRI"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
        }
        ?>
    </table>
        
            <br>
            <a href='feed.php'><button>voltar</button></a>
    </section>
    <script src="script.js"></script>
</body>
</html>
