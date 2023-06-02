
document.getElementById("form").addEventListener("submit", function() {
    
  alert(1)
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
  
    // Validar os campos (opcional)
    if (nome === '' || email === '') {
      alert("Por favor, preencha todos os campos.");
      return;
    }
  
    // Criar um objeto FormData com os dados do formulário
    var formData = new FormData();
    formData.append("nome", nome);
    formData.append("email", email);

    alert(2)
  
    // Enviar os dados para o servidor usando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "salvar_dados.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Tratar a resposta do servidor
        console.log(xhr.responseText);
      }
    };
    alert(3)
    xhr.send(formData);
    alert(4)
  }
);
