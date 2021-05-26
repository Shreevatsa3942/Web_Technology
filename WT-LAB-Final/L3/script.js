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
var ugtitle=document.getElementById('ugtitle');
var pgtitle=document.getElementById('pgtitle');
var prj1Name=document.getElementById('proj1_title');
var prj1Desc=document.getElementById('proj1_disc');


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

    var ugValue=ugtitle.value.trim();
    var pgValue=pgtitle.value.trim();
    var prj1NameValue=prj1Name.value.trim();
    var prj1DescValue=prj1Desc.value.trim();

    if(currentTab === 0 ){
        if((usernameValue !== ''&& passwordValue !== '' && confirm_passwordValue !== '')&&(isValidUserName() && isValidPassword() && passwordMatch())){
            nextTab();
        }
        else{
            alert('please fill in all the fields');

        }
    }
    else
        if(currentTab === 1){
            if((firstnameValue !== '' && lastnameValue !== '' && genderValue !== '' && nationalityValue !== '' && dobValue !== '')&& isNameValid()){

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
    else
        if(currentTab === 3){
            nextTab();
        }
    else
        if(currentTab === 4){
            if(ugValue !== '' && pgValue !== '' && prj1NameValue !== '' && prj1DescValue != ''){
                nextTab();
            }
            else{
                alert("please fill in all the fields")
            }
        }
    else
        if(currentTab === 5)
            //displayAll();
            nextTab()
    
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


//validation of username
function isValidUserName(){
    
    var user_name=username.value.trim();
    console.log(user_name)
    var msg=document.getElementById('msg1');
    if(!user_name.match(/^\w{8,}$/)){
        msg.style.display='block';
        return false;
    }
    else
    {
        msg.style.display='none';
        return true;
    }    
}
//Validation of password
function isValidPassword(){
    var password1=password.value.trim();
    //console.log(password1);
    var msg=document.getElementById('msg2');
    if(!password1.match(/^(?=.{10,})(?=.*\w)(?=.*[$&@]).*$/)){
        msg.style.display='block';
        return false;
    }  
    else
    {
        msg.style.display='none';
        return true;
    }
        
}
//Password match
function passwordMatch(){
    var password1=password.value.trim();
    var con_password1=confirm_password.value.trim();
    var msg=document.getElementById('msg3');
    if(password1 !== con_password1){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
        
}
//check whether first name's first charecter is capital or not
function isNameValid(){
    var firstname1=firstname.value.trim();
    var msg=document.getElementById('msg4');
    if(!firstname1.match(/^([A-Z])\w+$/)){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}

//validating email should end with @manipal.edu
function isEmailValid(){
    var email1=email.value.trim();
    var msg=document.getElementById('msg5');
    if(!email1.match(/^[a-zA-Z0-9]{1,}[._-]{0,}[a-zA-Z0-9]{1,}@manipal.edu/)){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}

//validating phone number
function phoneNumberValidation(){
    var phno1=phno.value.trim();
    var msg=document.getElementById('msg6');
    if(!phno1.match(/^[0-9]{10}/)){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}

//validating course title
function validateUGtitle(){
    var ugtitle1=ugtitle.value.trim();
    ugtitle1=ugtitle1.toUpperCase();
    console.log(ugtitle1);
    var msg=document.getElementById('msg7');
    if(!ugtitle1.match(/^BCA|BSC|BBM|BCOM/)){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}

//validating course CGPA
function validateCGPA(ele,t){
    var cgpa=ele.value.trim();
    var msg=document.getElementById('msg'+t);
    console.log(cgpa);
    if(cgpa > 10){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}
//validating PG course title
function validatePGtitle(){
    var pgtitle1=pgtitle.value.trim();
    pgtitle1=pgtitle1.toUpperCase();
    console.log(pgtitle1);
    var msg=document.getElementById('msg10');
    if(!pgtitle1.match(/^MCA|MCOM|MBA|MTECH|MSC/)){
        msg.style.display='block';
        return false;
    }
    else{
        msg.style.display='none';
        return true;
    }
}

//displayAll function

