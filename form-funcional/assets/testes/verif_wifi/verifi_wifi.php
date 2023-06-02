
<?php
$enderecoIP = $_POST['enderecoIP'];
//Wifi do escritório
if ($enderecoIP == '187.49.72.21') {
    
    echo "Ip correto";
} else {
    echo 'Endereço IP não recebido.';
}
?>
