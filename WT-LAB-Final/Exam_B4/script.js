const content = document.querySelector(".contents");
const empid = document.getElementById("empid");
const form = document.querySelector('form');
function validation(){
    var empidValue = empid.value.trim();
    empidValue = empidValue.toUpperCase();
    if(empidValue.match(/^(MAHE)[0-9]{4}$/)){
        form.submit();
    }
    else{
        content.innerHTML="";
        alert("Employee id is invalid!!");
    }
    
}