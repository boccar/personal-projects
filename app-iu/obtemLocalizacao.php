<!DOCTYPE html>

<? 
$id_solic = $_GET['id_solic'];

?>
<html>

<head>
    <title>Obter Localização do Usuário</title>
    <script>
        function obterLocalizacao() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Chama a função para obter os detalhes da localização
                    obterDetalhesLocalizacao(latitude, longitude);
                });
            } else {
                console.log("Geolocalização não suportada pelo navegador.");
            }
        }

        function obterDetalhesLocalizacao(latitude, longitude) {
            var url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" + latitude + "&lon=" + longitude;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var endereco = response.display_name;
                    var rua = response.address.road || '';
                    var bairro = response.address.neighbourhood || '';
                    var numero = response.address.house_number || '';

                    console.log(numero);

                    // Redireciona para a página "salvar_localizacao.php" com os parâmetros na URL
                    window.location.href = "salvar_localizacao.php?id_solic=<?echo $id_solic;?>" +
                        "&latitude=" + encodeURIComponent(latitude) +
                        "&longitude=" + encodeURIComponent(longitude) +
                        "&endereco=" + encodeURIComponent(endereco) +
                        "&rua=" + encodeURIComponent(rua) +
                        "&numero=" + encodeURIComponent(numero) +
                        "&bairro=" + encodeURIComponent(bairro);
                }
            };
            
            xhr.send();
        }
        
        obterLocalizacao();
    </script>


</head>



</html>