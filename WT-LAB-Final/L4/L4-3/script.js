window.addEventListener("load",() =>{

const canvas = document.getElementById("canvas");
const ctx=canvas.getContext("2d");
const clear=document.querySelector(".clear")
canvas.height=540
canvas.width=800
var paint = false;

function clearCanvas(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}
function startPosition(e)
{
    paint = true;
    drawLine(e);
}
function finishedPosition()
{
    paint=false;
    ctx.beginPath();
}
function drawLine(event){
    console.log(paint)
    if(!paint) return;
    var rect = canvas.getBoundingClientRect();
    var x = event.clientX - rect.left;
    var y = event.clientY - rect.top;
    //ctx.beginPath();
    ctx.lineWidth = 3;
    ctx.lineCap = "square";
    ctx.strokeStyle = "aqua";
	ctx.lineJoin = "round";
    ctx.lineTo(x,y);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(x,y);
}
canvas.addEventListener("mousedown",startPosition);
canvas.addEventListener("mouseup",finishedPosition);
canvas.addEventListener("mousemove",drawLine);
clear.addEventListener("click",clearCanvas);
});