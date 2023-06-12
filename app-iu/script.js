// Abrir janela de menu
document.getElementById("menu-button").addEventListener("click", function () {
    document.getElementById("menu-overlay").style.display = "block";
});

// Fechar janela de menu
document.getElementById("close-menu").addEventListener("click", function () {
    document.getElementById("menu-overlay").style.display = "none";
});

// Função para capturar foto usando a câmera
function capturarFoto() {
    var input = document.getElementById('foto-input');
    var preview = document.getElementById('foto-preview');

    var reader = new FileReader();
    reader.onload = function (e) {
        preview.setAttribute('src', e.target.result);
    };

    input.addEventListener('change', function () {
        var file = input.files[0];
        reader.readAsDataURL(file);
    });
}