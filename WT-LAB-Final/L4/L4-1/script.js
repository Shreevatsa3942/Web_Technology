var interval = setInterval(display_time, 1000);

function display_time(){
    var time = new Date();
    var hours = time.getHours();
    var mins = time.getMinutes();
    var secs = time.getSeconds();
    //alert(hours+":"+mins+":"+secs)
    var am_pm="AM";

    if(hours > 12){
        hours-=12;
        am_pm="PM";
    }
    if(hours == 0){
        hours = 12;
        am_pm="AM";
    }

    hours = hours < 10 ? "0" + hours : hours;
    mins = mins < 10 ? "0" + mins : mins;
    secs = secs < 10 ? "0" + secs : secs;

    var curr_time = hours + " : "+mins + " : "+secs+" "+am_pm;
    clock=document.getElementById("clock");
    clock.innerHTML = curr_time;
}
display_time();

function start(){
    interval = setInterval(display_time, 1000);
    display_time();
    document.getElementById("clock").style.animation="none";
}
function stop(){
    var temp = clearInterval(interval);
    console.log(temp);
    document.getElementById("clock").style.animation="blinker 0.7s infinite";

}