<?
    // Conectar ao banco de dados
    $host = 'localhost';  // substitua pelo seu host
    $db   = 'sciencca'; // substitua pelo nome do seu banco de dados
    $user = 'sciencca'; // substitua pelo nome de usuário do banco de dados
    $pass = 'hEGRjRsFPRnfeHtb'; // substitua pela senha do banco de dados

    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
?>