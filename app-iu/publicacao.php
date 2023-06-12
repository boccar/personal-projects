<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicacao</title>
    <style>
        .like i:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?
        include ('header.php');
        include('conn.php');
    ?>

    <!-- Section de Solicitações -->
    <section>
       
        <?php
    
        $id_solic = $_GET['id_solic'];
        echo " <h2>Solicitação $id_solic</h2>";

        $consulta_local = "SELECT * FROM `local` WHERE `ID_SOLIC` = $id_solic";
        $resultados_local = $conexao->query($consulta_local);
        while ($row = $resultados_local->fetch_assoc()) {

            $id_local = $row['ID'];
            $bairro = $row['BAIRRO'];
            $rua = $row['RUA'];
            $numero = $row['NUMERO'];
        }

        $consulta = "SELECT * FROM solicitacao WHERE `ID` = $id_solic";
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

                echo
                     "<section class='infos'>
                    <section class='titulo-cat-local'>
                        <h1 class='titulo' id='titulo'>
                            $titulo
                        </h1>
                        <p class='local' id='local'>
                             $rua  $bairro
                        </p>
                        <p class='cat-cat'>
                            $categoria
                        </p>
                    </section>
                    <section>
                        <p>
                            $descri
                        </p>
                    </section>
                    <secton class='foto-status-like'>
                       <!-- <img src='' alt=''> -->
                        <div class='status-box'>
                            <div class='status-btn'>
                                <p class='status-text'>
                                    $status
                                </p>
                            </div>
                        </div>
        
                        <div class='like'>
                        <i style='font-size: 40px' onclick='myFunction($id)' class='fa fa-thumbs-up'></i>
                            <p class='like-num'>
                                $curtida
                            </p>
                        </div>

                        <div>
                            <hr>
                            <h1>Comentáraios: </h1>";

                            ?>
                            <form action="salva_coment.php?id_solic=<?echo "$id_solic"?>" method="post">
                                <input placeholder="Comente:" name="comentario" id=""></input>
                                <button>Enviar</button>
                            </form>
                            
                            <br>
                            <?   
                            $consulta_coment = "SELECT * FROM comentario WHERE ID_SOLICITACAO = '$id_solic'";
                            $resultados_coment = $conexao->query($consulta_coment);
                               
                            if ($resultados_coment->num_rows > 0) {
                                while ($row = $resultados_coment->fetch_assoc()) {
                    
                                    $id_coment = $row['ID'];
                                    $descri_coment = $row['DESCRICAO'];
                                    $data_coment = $row['DATA_COMENTARIO'];
                                    $id_user = $row['ID_USUARIO'];

                                $consulta_coment_name = "SELECT * FROM usuario WHERE `ID` = '$id_user'";
                                    $resultados_coment_name = $conexao->query($consulta_coment_name);
                                    while ($row = $resultados_coment_name->fetch_assoc()) {
                                        $nome_user = $row['NOME'];

                                    };
                                    echo "<div style='border: 1px solid black;'>
                                            
                                            
                                            <p>usuario: $nome_user</p>
                                            <p>descrição: $descri_coment</p>
                                            <p>data: $data_coment</p>
                                            </div>
                                            
                                        </div>";
                    
                    
                                    //echo "<img src='$imagem_user'>";
                                    // echo "<img src='$foto'>";
                                }
                            } else {
                            echo 'Não há comentários';
                            }

                           echo "<hr>
                        </div>

                        <div class='adm-ops'>
                        <button onclick='mudarStatus($id)'>Mudar status</button>
                        </div>

                        <br>

                        <a href='feed.php'><button>voltar</button></a>

                    </secton>
                </section>";
                

                
                //echo "<img src='$imagem_user'>";
                // echo "<img src='$foto'>";
            }
        } else {
            echo "Não há solicitações.";
        }

        
        

        $conexao->close();
        ?>
    </section>
    <!-- <a href="publicar.php"><button>ADICIONAR</button></a> -->
    <script src="script.js"></script>
    <script>
        // var divElement = document.getElementById('meuBotao');
        // divElement.addEventListener('click', function() {
        //     alert('Você clicou no botão!');
        // });

        function myFunction(id_solic) {
            var urlDestino = 'like.php?id_solic=' + id_solic;

            window.location.href = urlDestino;
        }

        function mudarStatus(id_solic) {
            var urlDestino = 'status.php?id_solic=' + id_solic;

            window.location.href = urlDestino;
        }
    </script>
</body>
</html>