function meuEscopo() {
    const form = document.querySelector('.form');
    const resultado = document.querySelector('.resultado');
    const resultadoRed = document.querySelector('.resultadoRed');

    function recebeEventoForm(evento) {
        evento.preventDefault();

        const peso = form.querySelector('.input-peso');
        const altura = form.querySelector('.input-altura');
        const imc = peso.value / (altura.value * altura.value);
        const imcFormat = Math.round(imc);
        let resultadoText;

        if (imcFormat < 18.5) {
            resultadoText = 'Abaixo do peso';
        } else if (imcFormat >= 18.5 && imcFormat <= 24.9) {
            resultadoText = 'Peso normal';
        } else if (imcFormat >= 25 && imcFormat <= 29.9) {
            resultadoText = 'Sobrepeso';
        } else if (imcFormat >= 30 && imcFormat <= 34.9) {
            resultadoText = 'Obesidade 1';
        } else if (imcFormat >= 35 && imcFormat <= 39.9) {
            resultadoText = 'Obesidade 2';
        } else {
            resultadoText = 'Obesidade 3';
        }

        if (peso.value == '' && altura.value == '') {
            resultadoRed.innerHTML += `<p>Peso e altura não informado</p>`;
        } else if (peso.value == '') {
            resultadoRed.innerHTML += `<p>Peso não informado</p>`;
        } else if (altura.value == '') {
            resultadoRed.innerHTML += `<p>Altura não informado</p>`;
        } else if (peso.value < 20 || peso.value > 400) {
            resultadoRed.innerHTML += `<p>Os dados fornecidos são invalidos</p>`;
        } else if (altura.value < 0.80 || altura.value > 3.00) {
            resultadoRed.innerHTML += `<p>Os dados fornecidos são invalidos</p>`;
        } else {
            resultado.innerHTML += `<p>Seu IMC é de: <strong>${imcFormat.toFixed(1)}</strong> (${resultadoText})</p>`;
        }
    }

    form.addEventListener('submit', recebeEventoForm);
};

meuEscopo();
