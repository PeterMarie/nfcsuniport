
function showprevious1(response){
        document.getElementById('Form-box-1').style.display = "block";
        document.getElementById('Form-box-2').style.display = "none";
        document.getElementById('continuebutton1').disabled = false;
        document.getElementById('loader1').style.display = "none";
        var error = document.getElementById('displayerror1');
        error.innerHTML = ""; 
}
function showprevious2(response){
        document.getElementById('Form-box-2').style.display = "block";
        document.getElementById('Form-box-3').style.display = "none";
        document.getElementById('continuebutton2').disabled = false;
        document.getElementById('loader2').style.display = "none";
        var error = document.getElementById('displayerror2');
        error.innerHTML = ""; 
}
function showprevious3(response){
        document.getElementById('Form-box-3').style.display = "block";
        document.getElementById('Form-box-4').style.display = "none";
        document.getElementById('Form-box-5').style.display = "none";
        document.getElementById('Form-box-6').style.display = "none";
        document.getElementById('Form-box-7').style.display = "none";
        document.getElementById('continuebutton4').disabled = false;
        document.getElementById('continuebutton5').disabled = false;
        document.getElementById('continuebutton6').disabled = false;
        document.getElementById('loader3').style.display = "none";
        document.getElementById('loader4').style.display = "none";
        document.getElementById('loader5').style.display = "none";
        document.getElementById('loader6').style.display = "none";
        document.getElementById('loader7').style.display = "none";
        var error = document.getElementById('displayerror3');
        error.innerHTML = ""; 
}
function showprevious7(response){
        document.getElementById('Form-box-7').style.display = "block";
        document.getElementById('Form-box-8').style.display = "none";
        document.getElementById('continuebutton7').disabled = false;
        document.getElementById('loader7').style.display = "none";
        var error = document.getElementById('displayerror7');
        error.innerHTML = ""; 
}

function hideinstructions(){
    var x = document.getElementById("instruction_box");
    x.style.display = "none";
}

function check_password(e){
    var val = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var status = document.getElementById('password_check_status');
    var status2 = document.getElementById('password_match_status');
    if (val.length < 6) {
        status.innerHTML = "<i style= \"color: red; font-size: 70%;\">  Too short </i>";
    }
    if (val.length >= 6 && val.length < 8) {
        status.innerHTML = "<i style= \"color: darkorange; font-size: 70%;\">  Weak </i>";
    }
    if (val.length >= 8) {
        status.innerHTML = "<i style= \"color: darkgreen; font-size: 70%;\">  Great </i>";
    }
    if((val != password2) && (password2 != "")){
        status2.innerHTML = "<i style= \"color: rgb(225,215,215); font-size: 70%;\">  Passwords don't match! </i>";
    }
    if((val == password2) && (password2 != "")){
        status2.innerHTML = "<i style= \"color: rgb(220,220,225); font-size: 70%;\">  Passwords Match! </i>";
    }
    return;
}

function confirm_password_match(e){
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var status = document.getElementById('password_match_status');
    if(password != password2){
        status.innerHTML = "<i style= \"color: rgb(225,215,215); font-size: 70%;\">  Passwords don't match! </i>";
    } else {
        status.innerHTML = "<i style= \"color: rgb(220,220,225); font-size: 70%;\">  Passwords Match </i>";
    }
}
