const inputTarefa = document.querySelector('.input-terefa');
const btnTarefa = document.querySelector('.btn-tarefa');
const tarefa = document.querySelector('.tarefa');

btnTarefa.addEventListener('click', function () {
    if (!inputTarefa.value) return;
    criaTarefa(inputTarefa.value);
});

inputTarefa.addEventListener('keypress', function (e) {
    if (e.keyCode === 13) {
        if (!inputTarefa.value) return;
        criaTarefa(inputTarefa.value);
    }
});

document.addEventListener('click', function (e) {
    const el = e.target;
    if (el.classList.contains('apagar')) {
        el.parentElement.remove();
    }
})

function criaTarefa(input) {
    const li = criaLi();
    li.innerHTML = input;
    tarefa.appendChild(li);
    limpaInput();
    criaBtnApagar(li);
    salvaTarefas();
}

function criaLi() {
    const li = document.createElement('li')
    return li;
}

function limpaInput() {
    inputTarefa.value = '';
    inputTarefa.focus();
}

function criaBtnApagar(li) {
    li.innerHTML += ' ';
    const btnApagar = document.createElement('button');
    btnApagar.innerHTML = 'Apagar'
    btnApagar.setAttribute('class', 'apagar');
    li.appendChild(btnApagar);
}

function salvaTarefas() {
    const liTarefas = tarefa.querySelectorAll('li');
    const listaDeTarefas = [];

    for (let tarefa of liTarefas) {
        let tarefaTexto = tarefa.innerText;
        tarefaTexto = tarefaTexto.replace('Apagar', '').trim();
        listaDeTarefas.push(tarefaTexto);
    }
    const tarefasJSON = JSON.stringify(listaDeTarefas);
    localStorage.setItem('tarefas', tarefasJSON);
}
