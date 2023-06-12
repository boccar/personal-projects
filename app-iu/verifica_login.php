<?php
session_start();

// Verifica se o usuário não está logado, redireciona para a página de login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}
?>
