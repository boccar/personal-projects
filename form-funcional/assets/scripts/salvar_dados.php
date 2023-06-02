<?
// Conectar ao banco de dados
$host = 'localhost';  // substitua pelo seu host
$db   = 'sciencca'; // substitua pelo nome do seu banco de dados
$user = 'sciencca'; // substitua pelo nome de usuário do banco de dados
$pass = 'hEGRjRsFPRnfeHtb'; // substitua pela senha do banco de dados

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

// Obter os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$existente = $stmt->fetchColumn();

if ($existente) {
    echo '<script>
    alert("Este e-mail já esta cadastrado!");
    window.location.href = "/form-funcional/index.html";
    </script>';
} else {
// Preparar e executar a consulta SQL para inserir os dados no banco de dados
$stmt = $conn->prepare("INSERT INTO users (nome, email) VALUES (:nome, :email)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->execute();


// Verificar se os dados foram salvos corretamente
if ($stmt->rowCount() > 0) {
    
} else {
    echo "Erro ao salvar os dados.";
    echo $nome;
    echo $email;
}

echo 
  '<script>
    alert("Dados salvos com sucesso!");
    window.location.href = "/form-funcional/index.html";
  </script>';
}?>