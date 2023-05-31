const timer = document.querySelector('.timer');
const start = document.querySelector('.start');
const stopp = document.querySelector('.stop');
const reset = document.querySelector('.reset');
let seconds = 0;
let timerr;



function getSeconds(seconds) {
    const data = new Date(seconds * 1000);
    return data.toLocaleTimeString('pt-BR', {
        hour12: false,
        timeZone: 'UTC'
    });
}

function startTimer() {
    timerr = setInterval(function () {
        seconds++;
        timer.innerHTML = getSeconds(seconds)
    }, 1000);
}

function stopTimer() {
    clearInterval(timerr);
}

function resetTimer() {
    timer.innerHTML = '00:00:00'
    clearInterval(timerr);
    seconds = 0;
}



start.addEventListener('click', function (event) {
    clearInterval(timerr);
    startTimer()
});

stopp.addEventListener('click', function (event) {
    stopTimer();
})

reset.addEventListener('click', function (event) {
    resetTimer();
});