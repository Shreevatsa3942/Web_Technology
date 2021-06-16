const canvas = document.getElementById("canvas1");
const ctx=canvas.getContext("2d");
const display = document.getElementById("coordinates");
display.innerHTML = "X :  0   Y:  0"
canvas.width="600"
canvas.height="400"

function m_point(event){
    var rect = canvas.getBoundingClientRect();
    var x = event.clientX - rect.left;
    var y = event.clientY - rect.top;

    display.innerHTML = "X :  "+x+"   Y:  "+y;
}

function refresh(){
    display.innerHTML = "X :  0   Y:  0"
}