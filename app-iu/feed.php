<!DOCTYPE html>
<html>
<head>
    <title>Solicitações</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 

</head>
<body>
    <?
        include ('header.php');
    ?>

    <!-- Section de Solicitações -->
    <section>
        <h2>Solicitações</h2>
        <?php
       
        include('conn.php');

        // Consulta das solicitações
        $consulta = "SELECT * FROM solicitacao WHERE STATOS != 'arquivado' ORDER by CURTIDA DESC";
        $resultados = $conexao->query($consulta);

        if ($resultados->num_rows > 0) {
            while ($row = $resultados->fetch_assoc()) {

                $id = $row['ID'];
                $titulo = $row['TITULO'];
                $data_solicitacao = $row['DATA_SOLICITACAO'];
                $imagem_user = $row['IMAGEM-USER'];
                $foto = $row['FOTO'];
                $categoria = $row['CATEGORIA'];
                $status = $row['STATOS'];
                $descri = $row['DESCRI'];
                $curtida = $row['CURTIDA'];

                echo "<div onclick='redirecionarPagina($id)'>
                        <hr>
                        <h1>Titulo: $titulo</h1>
                        <p>Categoria: $categoria</p>
                        <p>Descrição: $descri</p>
                        <div><p>Status: $status</p></div>
                        <p>Data: $data_solicitacao</p>
                        <div class='like'>
                        <i style='font-size: 40px' onclick='myFunction($id)' class='fa fa-thumbs-up'></i>
                        <p class='like-num'> $curtida</p>
                        </div>
                        
                        <hr>
                    </div>";


                //echo "<img src='$imagem_user'>";
                // echo "<img src='$foto'>";
            }
        } else {
            echo "Não há solicitações.";
        }

        $conexao->close();
        ?>
        </section>
    <a href="publicar.php"><button>ADICIONAR</button></a>
    <script src="script.js"></script>
    <script>
        function redirecionarPagina(id_solic) {
            var urlDestino = 'publicacao.php?id_solic=' + id_solic;

            window.location.href = urlDestino;
        }
    </script>
</body>
</html>
