
        function ajax(url, cFunction) {
            if (window.XMLHttpRequest) {
                // code for modern browsers
                xhttp = new XMLHttpRequest();
            } else { 
                // code for old IE browsers
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                cFunction(this);
                }
            };
            xhttp.open("GET", url, true);
           /* xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");*/
            xhttp.send();
        }

        function ajaxpost(url, cFunction, formData){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url);
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    cFunction(this);
                }
            };
            xhr.send(formData);
        }

    function gotonext(n){
        var status = checkinput(n);
        if(status == 'true'){
            saveinput(n);
            return;
        }
        if(status == 'false'){
            displayerror(n);
            return;
        }
        if(status == 'password mismatch'){
            var error = document.getElementById('displayerror5');
            error.innerHTML = "Your passwords do not match!";
        }
    }
    function checkinput(n){
        var status2;
        switch (n) {
            case 2:
                var firstname = document.getElementById('firstname').value;
                var surname = document.getElementById('surname').value;
                var sex = document.getElementById('sex').value;
                var dateofbirth = document.getElementById('dateofbirth').value;

                if((firstname.length == 0) || (surname.length == 0) || (sex.length > 1) || (dateofbirth.length != 10)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 3:
                var email = document.getElementById('email').value;
                var phonenumber = document.getElementById('phonenumber').value;
                var address = document.getElementById('address').value;

                if((email.length == 0) || (phonenumber.length != 11) || (address.length == 0)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 4:
                status2 = 'true';
                break;
                
            case 5:
                status2 = 'true';
                break;
                
            case 6:
                status2 = 'true';
                break;
                
            case 71:
                var program = document.getElementById('program').value;
                var d_department = document.getElementById('d_department').value;

                if((program == 'select') || (d_department.length == 0)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 72:
                var faculty = document.getElementById('faculty').value;
                var department = document.getElementById('department').value;
                var year = document.getElementById('year').value;

                if((faculty.length < 7) || (department.length == 0) || (year.length != 4)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 73:
                var g_faculty = document.getElementById('g_faculty').value;
                var g_department = document.getElementById('g_department').value;
                var g_a_year = document.getElementById('g_a_year').value;
                var g_g_year = document.getElementById('g_g_year').value;

                if((g_faculty.length < 7) || (g_department.length == 0) || (g_a_year.length != 4) || (g_g_year.length != 4)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 8:
                var nok_fullname = document.getElementById('nok_fullname').value;
                var nok_phonenumber = document.getElementById('nok_phonenumber').value;
                var nok_relationship = document.getElementById('nok_relationship').value;

                if((nok_fullname.length < 6) || (nok_phonenumber.length != 11) || (nok_relationship.length == 0)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
                
            case 9:
                var username = document.getElementById('username').value;
                var password = document.getElementById('password').value;
                var password2 = document.getElementById('password2').value;

                if(password != password2) {
                    status2 = 'password mismatch';
                    break;
                }
                if((username.length == 0) || (password.length < 6)){
                    status2 = 'false';
                } else {
                    status2 = 'true';
                }
                break;
        
        
            default:
                break;
        }
        return status2;
    }
    function displayerror(n){
        if(n > 70){
            switch (n) {
                case 71:
                    n = 5; 
                    break;
                case 72:
                    n = 6;
                    break;
                case 73:
                    n = 7;
                    break;
            
                default:
                    break;
            }
        n = n - 1;
        var id = "displayerror" + n;
        var error = document.getElementById(id);
        error.innerHTML = "Please fill in all required fields before submitting!"; 
        }
    }

/*controller functions */
    function saveinput(n){
        var formData = new FormData();
        var url = "saveinsession.php";
        switch (n) {
            case 2:
                formData.append("firstname", document.getElementById('firstname').value);
                formData.append("middlename", document.getElementById('middlename').value);
                formData.append("surname", document.getElementById('surname').value);
                formData.append("sex", document.getElementById('sex').value);
                formData.append("date_of_birth", document.getElementById('dateofbirth').value);
                ajaxpost(url, shownext2, formData);
                document.getElementById('continuebutton1').disabled = "disabled";
                document.getElementById('loader1').style.display = "block";
                break;
            case 3:
                formData.append("email", document.getElementById('email').value);
                formData.append("phone", document.getElementById('phonenumber').value);
                formData.append("phone2", document.getElementById('phonenumber2').value);
                formData.append("place_of_residence", document.getElementById('address').value);
                formData.append("home_diocese", document.getElementById('homediocese').value);
                ajaxpost(url, shownext3, formData);
                document.getElementById('continuebutton2').disabled = "disabled";
                document.getElementById('loader2').style.display = "block";
                
                break;
            case 4:
                formData.append("status", "basic");
                ajaxpost(url, shownext4, formData);
                document.getElementById('loader3').style.display = "block";
                break;
                
            case 5:
                formData.append("status", "undergraduates");
                ajaxpost(url, shownext5, formData);
                document.getElementById('loader3').style.display = "block";
                break;
                
            case 6:
                formData.append("status", "alumni");
                ajaxpost(url, shownext6, formData);
                document.getElementById('loader3').style.display = "block";
                break;
                
            case 71:
                formData.append("program", document.getElementById('program').value);
                formData.append("department", document.getElementById('d_department').value);
                ajaxpost(url, shownext71, formData);
                document.getElementById('continuebutton4').disabled = "disabled";
                document.getElementById('loader4').style.display = "block";
                
                break;
            case 72:
                formData.append("faculty", document.getElementById('faculty').value);
                formData.append("department", document.getElementById('department').value);
                formData.append("year_of_admission", document.getElementById('year').value);
                ajaxpost(url, shownext72, formData);
                document.getElementById('continuebutton5').disabled = "disabled";
                document.getElementById('loader5').style.display = "block";
                
                break;
            case 73:
                formData.append("faculty", document.getElementById('g_faculty').value);
                formData.append("department", document.getElementById('g_department').value);
                formData.append("year_of_admission", document.getElementById('g_a_year').value);
                formData.append("year_of_graduation", document.getElementById('g_g_year').value);
                ajaxpost(url, shownext73, formData);
                document.getElementById('continuebutton6').disabled = "disabled";
                document.getElementById('loader6').style.display = "block";
                
                break;
            case 8:
                formData.append("nok_name", document.getElementById('nok_fullname').value);
                formData.append("nok_relationship", document.getElementById('nok_relationship').value);
                formData.append("nok_phonenumber", document.getElementById('nok_phonenumber').value);
                ajaxpost(url, shownext8, formData);
                document.getElementById('continuebutton7').disabled = "disabled";
                document.getElementById('loader7').style.display = "block";
                
                break;
            case 9:
                formData.append("username", document.getElementById('username').value);
                formData.append("password", document.getElementById('password').value);
                ajaxpost(url, finishregistration, formData);
                document.getElementById('continuebutton8').disabled = "disabled";
                document.getElementById('loader8').style.display = "block";
                
                break;
        
            default:
                break;
        }
        return;
    }

    function finishregistration(){
        var url = "saveindb.php";
        document.getElementById('backdrop').style.display = "block";
        document.getElementById('l_bigloader').style.display = "block";
        document.getElementById('bigloader').style.display = "block";
        ajax(url, complete); 
    }

/*action functions*/
function shownext2(response){
        document.getElementById('Form-box-1').style.display = "none";
        document.getElementById('Form-box-2').style.display = "block";
        return;
}
function shownext3(response){
        document.getElementById('Form-box-2').style.display = "none";
        document.getElementById('Form-box-3').style.display = "block";
}
function shownext4(response){
        document.getElementById('Form-box-3').style.display = "none";
        document.getElementById('Form-box-5').style.display = "none";
        document.getElementById('Form-box-6').style.display = "none";
        document.getElementById('Form-box-4').style.display = "block";
}
function shownext5(response){
        document.getElementById('Form-box-3').style.display = "none";
        document.getElementById('Form-box-4').style.display = "none";
        document.getElementById('Form-box-6').style.display = "none";
        document.getElementById('Form-box-5').style.display = "block";
}
function shownext6(response){
        document.getElementById('Form-box-3').style.display = "none";
        document.getElementById('Form-box-4').style.display = "none";
        document.getElementById('Form-box-5').style.display = "none";
        document.getElementById('Form-box-6').style.display = "block";
}
function shownext71(response){
        document.getElementById('Form-box-4').style.display = "none";
        document.getElementById('Form-box-7').style.display = "block";
}
function shownext72(response){
        document.getElementById('Form-box-5').style.display = "none";
        document.getElementById('Form-box-7').style.display = "block";
}
function shownext73(response){
        document.getElementById('Form-box-6').style.display = "none";
        document.getElementById('Form-box-7').style.display = "block";
}
function shownext8(response){
        document.getElementById('Form-box-7').style.display = "none";
        document.getElementById('Form-box-8').style.display = "block";
}

function complete(response){
    var div = document.getElementById('l_bigloader'); /*.style.display = "none";
   /* var div= document.createElement("DIV"); */
    div.innerHTML = "";
    div.setAttribute("class", "final-box");
    var data = JSON.parse(response.responseText);

    if(data.status == "success"){
        var br = document.createElement("BR");
        var br2 = document.createElement("BR");
        var br3 = document.createElement("BR");
        var br4 = document.createElement("BR");
        var h1 = document.createElement("h1");
        h1.setAttribute("style", "color: rgb(5, 10, 80); text-shadow: 1px 2px darkgray; text-align: center;")
        var header = document.createTextNode("Registration Complete!");
        var span = document.createElement("SPAN");
        var span2 = document.createElement("SPAN");
        var span3 = document.createElement("SPAN");
        var text = document.createTextNode("Your NFCS Census ID is ");
        span.setAttribute("style", "font-size: 140%; padding: 0.5em; text-align: center;");
        span.appendChild(text);
        span2.setAttribute("style", "color: #165db5; font-weight: 600; ");
        var t = document.createTextNode(data.census_reg_number);
        span2.appendChild(t);
        span.appendChild(span2);
        span3.setAttribute("style", "font-size: 100%; color: rgb(60, 35, 5); padding: 0.5em; text-align: center;");
        var t2 = document.createTextNode("Take this number along with you to the NFCS secretariat or any other designated point along with the registration fee for step two of the registration.");
        span3.appendChild(t2);
       /* var a = document.createElement('A');
        a.setAttribute("href", "profile.php");
        var button = document.createElement("BUTTON");
        var button_text = document.createTextNode("View Profile");
        button.appendChild(button_text);
        button.setAttribute("style", "height: 2.2em; width: 8em; margin-right: 1em; float: right; background-color: rgb(15, 30, 70); color: white; font-size: 130%;"); 
        a.appendChild(button); */
        h1.appendChild(header);
        div.appendChild(h1);
        div.appendChild(span);
        div.appendChild(br);
        div.appendChild(br2);
        div.appendChild(span3);
        div.appendChild(br3);
        div.appendChild(br4);
       /* div.appendChild(a);  
        document.body.appendChild(div); */
    } else {
        var header = document.createTextNode("Error!");
        var t = document.createTextNode("We're very sorry, but there has been an error in saving your details. Please try again.");
        div.appendChild(header);
        div.appendChild(t);
       /* document.body.appendChild(div); */
    }    
}