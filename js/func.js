


function toggleLoginDisplay()
{
    var logelement = document.getElementById('userlog');
    logelement.classList.add('d-none');


}

function toggleRegisterDisplay()
{
    var regelement = document.getElementById('userreg');
    regelement.classList.add('d-none');


}

function toggleTimeBar()
{
    var element = document.getElementById('timebar');
    element.classList.remove('d-none');


}

function onTimerEnd()
{
    var delay = document.getElementById('time').innerHTML;
    var delayInSeconds = delay / 1000;
    //document.getElementById('time').innerHTML = delayInSeconds;
    setTimeout(TimerEnded,delayInSeconds);
    
}

function TimerEnded()
{
    console.log('Overtime!');
    window.location = '../lose.php';

    location.reload(true);

}

function backToMenu()
{
    window.history.replaceState( null, null, 'index.php');
    window.location = window.location.href;
    location.reload(true);
    //document.write(' <?php loadDifficulty(); ?> ');

}