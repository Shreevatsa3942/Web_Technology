const btn = document.getElementById('submit');
const clgname=document.getElementById('collegename');
const email = document.getElementById('email');
const contact = document.getElementById('contact');
const accomodation = document.getElementById('accomodation');
const no_std = document.getElementById('no_std');
const no_days = document.getElementById('no_days');

btn.addEventListener('click',function(){
    let clgnameValue = clgname.value.trim();
    let emailValue=email.value.trim();
    let contactValue=contact.value.trim();
    let acmValue=accomodation.value;
    alert(acmValue);
    
    if(acmValue !== "yes"){
        console.log('field1')
        if(clgnameValue === '' || emailValue === '' || contactValue === '')
        alert("please fill in all the fields");
        else{
            validation();
        }
    }
    else if(acmValue === 'yes'){
        let no_stdValue=no_std.value.trim();
        let no_daysValue=no_days.value.trim();
        if(clgnameValue === '' || emailValue === '' || contactValue === '' || no_stdValue === '' || no_daysValue === '')
        alert("please fill in all the fields");
        else{
            console.log('field2')
            validation();
        }
    }
    
})

function visible(){
    document.querySelector('.hideField').style.display="block";
}

function hide(){
    document.querySelector('.hideField').style.display="none";
}

function validation(){
    if(!isMobileValid()){
        alert("Mobile number should accept only ten digits");
    }
    if(!isEmailValid()){
        alert("Atleast 5 alphabet and 2 numeric!");
    }
    if(!isCollegeNameValid())
        alert("Collegename invalid");

    if(isCollegeNameValid() && isEmailValid() && isMobileValid())
        alert("success");
}


function isCollegeNameValid(){
    let clgnameValue = clgname.value.trim();
    if(clgnameValue.match(/^(?=.*(college|institution)).*/))
        return true;
    else
        return false;
}
function isEmailValid(){
    let emailValue = email.value.trim();
    if(emailValue.match(/^([A-z]{5,}[0-9]{2,})\w*/)){
        return true;
    }   
    else
        return false;
}
function isMobileValid(){
    let contactValue = contact.value.trim();
    if(contactValue.match(/^[0-9]{10}/)){
        return true;
    }   
    else
        return false;
}