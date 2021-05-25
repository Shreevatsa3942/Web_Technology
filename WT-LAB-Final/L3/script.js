var div=document.getElementsByTagName('div');
var button=document.getElementsByTagName('button');
var form=document.getElementsByTagName('form')[0];
var progress=document.getElementsByTagName('p');

//form contents 
//first tab
var username=document.getElementById('username');
var password=document.getElementById('pwd');
var confirm_password=document.getElementById('cpwd');
//second tab
var firstname=document.getElementById('firstname');
var lastname=document.getElementById('lastname');
var gender=document.getElementById('gender');
var nationality=document.getElementById('nationality');
var dob=document.getElementById('dob');
//third tab
var email=document.getElementById('email');
var phno=document.getElementById('phno');
var address=document.getElementById('address');
//fifth tab
var ug=document.getElementById('ug');
var pg=document.getElementById('pg');

main()
function main(){
    //automatically it is public because it is not declared
    currentTab=0;
    div[currentTab].style.display="block";
    //for the first div hiding the previous button
    if(currentTab == 0){
        button[1].style.display="none";
        progress[0].style.backgroundColor="aqua"
    }
        
}
function validation(){
    var usernameValue=username.value.trim();
    var passwordValue=password.value.trim();
    var confirm_passwordValue=confirm_password.value.trim();
    
    var firstnameValue=firstname.value.trim();
    var lastnameValue=lastname.value.trim();
    var genderValue=gender.value.trim();
    var nationalityValue=nationality.value.trim();
    var dobValue=dob.value.trim();

    var emailValue=email.value.trim();
    var phnoValue=phno.value.trim();
    var addressValue=address.value.trim();

    if(currentTab === 0 ){
        if(usernameValue !== '' && passwordValue !== '' && confirm_passwordValue !== ''){
            nextTab();
        }
        else{
            alert('please fill in all the fields');

        }
    }
    else
        if(currentTab === 1){
            if(firstnameValue !== '' && lastnameValue !== '' && genderValue !== '' && nationalityValue !== '' && dobValue !== ''){
                nextTab();
            }
            else{
                alert("please fill in all the fields")
            }
        }
    else
        if(currentTab === 2){
            if(emailValue !== '' && phnoValue !== '' && addressValue !== ''){
                nextTab();
            }
            else{
                alert("please fill in all the fields")
            }
        }
}
function nextTab(){
    console.log("nextTab clicked");
    currentTab++;
    backTab= currentTab - 1;
    if((currentTab > 0) && (currentTab < 7)){
        button[1].style.display="inline-block";
        div[currentTab].style.display="block";
        div[backTab].style.display="none";
        progress[backTab].style.backgroundColor="lightgreen"
        progress[currentTab].style.backgroundColor="aqua"

        //if its sixth tab then change button name to confirm
        if(currentTab == 5){
            button[0].innerHTML="Confirm";
        }

        //if its seventh tab then hide the buttons 
        if(currentTab == 6){
            button[1].style.display="none";
            button[0].style.display="none";
            div[currentTab].innerHTML="<h3>Registration Successful</h3>"
        }
    }
}
function prevTab(){
    console.log("Previous tab clicked");
    div[currentTab].style.display="none";
    progress[currentTab].style.backgroundColor="bisque"
    currentTab--;
    div[currentTab].style.display="block";
    progress[currentTab].style.backgroundColor="aqua"
    if(currentTab == 0){
        button[1].style.display="none";
    }

    if(currentTab !== 5){
        button[0].innerHTML="Next";
    }
    
}