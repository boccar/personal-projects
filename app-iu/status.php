<!DOCTYPE html>
<html>
<head>
    <title>Mudar status</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php
        include('conn.php');
        include ('header.php');

        $id_solic = $_GET['id_solic'];

        $consulta = "SELECT TITULO, STATOS FROM solicitacao WHERE `ID` = $id_solic";
        $resultados = $conexao->query($consulta);
        while ($row = $resultados->fetch_assoc()) {
            $status = $row['STATOS'];
            $titulo = $row['TITULO'];
        }

    echo "<section>
            <h1>Mudar status</h1>
            <form method='post' action='mudaStatus.php?id_solic=$id_solic'>
                <br>
                <h2>Solicitação $id_solic</h2>
                <h2>Titulo: $titulo</h2>
                <br>
                <label for='categoria-select'>Categoria:</label>
                <select id='categoria-select' name='categoria'>
                <option value='Em análise' " . ($status == 'Em análise' ? 'selected' : '') . ">Em análise</option>
                <option value='Em andamento' " . ($status == 'Em andamento' ? 'selected' : '') . ">Em andamento</option>
                <option value='Concluido' " . ($status == 'Concluido' ? 'selected' : '') . ">Concluído</option>
                <option value='Arquivado' " . ($status == 'Arquivado' ? 'selected' : '') . ">Arquivado</option>
                </select>
                <br>
                <input type='submit' value='Salvar'>
            </form>
            <br>
            <a href='publicacao.php?id_solic=$id_solic'><button>voltar</button></a>
        </section>";
?>
    <script src="script.js"></script>
</body>
</html>
