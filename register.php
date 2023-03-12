<?php
    require_once('includes/nfcsdb.php');
    require_once('includes/functions.php');
    require_once('includes/form_functions.php');
 
?>
<!DOCTYPE html>
<html>
<head>
    <title> Member Registration </title>
    <link rel= "icon" href= "images/logo.png" type="image/x-icon">
    <meta property="og:url"           content="register.php" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="NFCS Uniport Registration" />
    <meta property="og:description"   content="Register as a member of the Nigeria Federation of Catholic Students, Uniport Chapter" />
    <meta property="og:image"         content="images/index-mobile.jpg" />
    <meta property="og:icon"         content="images/index-mobile.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type= "text/css" href= "css/style.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
</head>
<body>
    <div id= "fullbody">
        <div id= "backdrop"> </div>
        <div id= "l_bigloader"><div id="loading"><i>Saving Information...<br /><small>Please wait</small></i></div><div id= "bigloader"></div></div>
    <!--header -->
        <div class= "header row">
            <div class= "col-1 col-t-3 col-m-3">
                <img class= "logo" src= "images/logo.png" alt= "logo" />
            </div>
            <div class= "col-9 col-t-7 col-m-7 "> 
               <span id= "header-title"> NIGERIA FEDERATION OF CATHOLIC STUDENTS <br /> <small> UNIPORT CHAPTER </small> </span>
            </div>
            <div class= "col-2 col-t-2 no-mobile"> Already registered? Sign In </div>
            <div class= "col-m-2 mobile-only s-header"> Sign In </div>
        </div>
        <div class = "body row">
            <div id= "instruction_box">
                <p id="instruction_header" class= "center"> Welcome to the NFCS Uniport Registration Page </p>
                <p id="instruction_body"> Becoming a full member of NFCS Uniport requires the completion of three (3) steps: <br /> <br />
                    <strong> Step 1. </strong> Online Registration through this portal. <br /><br />
                    <strong> Step 2. </strong> Making of Registration and ID Card payment at the NFCS secretariat or any other designated point. <br /><br />
                    <strong> Step 3. </strong> Validation of registration by the appropriate faculty body president under the NFCS. <br /> <br />
                    Click Next to Begin!
                </p>
                <button class= "big-next" onclick= "hideinstructions()" > NEXT </button>
            </div>
            <div class = " col-3 col-m-1 col-t-2" > </div>
            <div id= "Form-box-1" class= "col-6 col-m-10 col-t-8" >
                <form>
                    <h3> Personal Details </h3>
                    <table style= "width: 100%;" >
                        <tr> <td> First Name <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "firstname" required /> </td> </tr>
                        <tr> <td> Middle Name </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "middlename"/> </td> </tr>
                        <tr> <td> Surname<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "surname" required/> </td> </tr>
                        <tr> <td> Sex<span class= "required">*</span> </td> <td class= "form-input"> <select class= "form-input" id= "sex" required> <option> Select </option> <option value= "M" > Male </option> <option value= "F" > Female </option> <select /> </td> </tr>
                        <tr> <td> Date of Birth<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "date" id= "dateofbirth" placeholder= "yyyy-mm-dd" required/> </td> <br /> <small> <i> Your Year of Birth is strictly confidential </i> </small> </tr>
                    </table>
                    <span id= "displayerror1"> </span>
                        <button type= "button" class= "form-input" onclick= "gotonext(2)" id= "continuebutton1"> Continue </button><div id= "loader1" class="loader"></div>
            <br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form> 
            </div>
            <div id = "Form-box-2" class= "col-6 col-m-10 col-t-8">
                <form>
                    <h3> Contact Details </h3>
                    <table>
                        <tr> <td> Email<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "email" id= "email" required/> </td> </tr>
                        <tr> <td> Phone Number<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id="phonenumber" /> </td> </tr>
                        <tr> <td> Alternate Phone Number </td> <td class= "form-input"> <input class= "form-input" type= "text" id="phonenumber2" /> </td> </tr>
                        <tr> <td> Place of Residence<span class= "required">*</span> </td> <td class= "form-input"> <textarea id="address" ></textarea></td> </tr>
                        <tr> <td> Home Diocese </td> <td class= "form-input"> <input class= "form-input" type= "text" id="homediocese" /> </td> </tr>
                    </table>
                    <span id= "displayerror2"> </span>
                        <button type= "button" class= "back-button" onclick= "showprevious1()"> Back </button>
                        <button type= "button" class= "form-input" onclick= "gotonext(3)" id= "continuebutton2"> Continue </button><div id= "loader2" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-3" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Membership Status </h3>
                    Please Select Status <br /> &nbsp; &nbsp; &nbsp;
                        <span> <button type= "button" class= "back-button" onclick= "gotonext(4)"> Basic/Certificate </button> </span>
                        <span> <button type= "button" class= "back-button" onclick= "gotonext(5)"> Undergraduate </button> </span>
                        <span> <button type= "button" class= "back-button" onclick= "gotonext(6)"> Alumnus </button> </span> <br /> <br />
                        <button type= "button" class= "back-button" onclick= "showprevious2()"> Back </button><div id= "loader3" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-4" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Admission Details </h3>
                    <table>
                        <tr> <td> Program <span class= "required">*</span> </td> <td class= "form-input">
                            <select id= "program" >
                                <option> Select </option>
                                <option value= "basic" > BASIC </option>
                                <option value= "certificate" > Certificate </option>
                            </select> </td> </tr>
                        <tr> <td> Desired Department<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "d_department"/> </td> </tr>
                    </table>
                    <span id= "displayerror4"> </span>
                        <button type= "button" class= "back-button" onclick= "showprevious3()"> Back </button>
                        <button type= "button" class= "form-input" onclick= "gotonext(71)" id= "continuebutton4"> Continue </button><div id= "loader4" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-5" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Admission Details </h3>
                    <table>
                        <tr> <td> Faculty<span class= "required">*</span> </td> <td class= "form-input">
                            <select id= "faculty" >
                                <option> Select </option>
                                <option value= "medical" > College of Medical Studies </option>
                                <option value= "sciences" > College of Sciences </option>
                                <option value= "agriculture" > Faculty of Agriculture </option>
                                <option value= "education" > Faculty of Education </option>
                                <option value= "engineering" > Faculty of Engineering </option>
                                <option value= "humanities" > Faculty of Humanities </option>
                                <option value= "management" > Faculty of Management Sciences </option>
                                <option value= "technology" > Faculty of Social Sciences </option>
                                <option value= "technology" > School of Science Laboratory Technology </option>
                            </select> </td> </tr>
                        <tr> <td> Department<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "department"/> </td> </tr>
                        <tr> <td> Year of Admission<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "year"/> </td> </tr>
                    </table>
                    <span id= "displayerror5"> </span>
                        <button type= "button" class= "back-button" onclick= "showprevious3()"> Back </button>
                        <button type= "button" class= "form-input" onclick= "gotonext(72)" id= "continuebutton5"> Continue </button><div id= "loader5" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-6" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Academic/Graduation Details </h3>
                    <table>
                        <tr> <td> Faculty <span class= "required">*</span> </td> <td class= "form-input">
                            <select id= "g_faculty" >
                                <option> Select </option>
                                <option value= "medical" > College of Medical Studies </option>
                                <option value= "sciences" > College of Sciences </option>
                                <option value= "agriculture" > Faculty of Agriculture </option>
                                <option value= "education" > Faculty of Education </option>
                                <option value= "engineering" > Faculty of Engineering </option>
                                <option value= "humanities" > Faculty of Humanities </option>
                                <option value= "management" > Faculty of Management Sciences </option>
                                <option value= "technology" > Faculty of Social Sciences </option>
                                <option value= "technology" > School of Science Laboratory Technology </option>
                            </select> </td> </tr>
                        <tr> <td> Department <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "g_department"/> </td> </tr>
                        <tr> <td> Year of Admission<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "g_a_year"/> </td> </tr>
                        <tr> <td> Year of Graduation<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "g_g_year"/> </td> </tr>
                    </table>
                    <h3> Post-University Details </h3>
                    <table>
                        <tr> <td> Marital Status </td> <td class= "form-input">
                            <select id= "marital" >
                                <option> Select </option>
                                <option value= "single" > Single </option>
                                <option value= "married" > Married </option>
                            </select> </td> </tr>
                    </table>
                    <span id= "displayerror6"> </span>
                        <button type= "button" class= "back-button" onclick= "showprevious3()"> Back </button>
                        <button type= "button" class= "form-input" onclick= "gotonext(73)" id= "continuebutton6"> Continue </button><div id= "loader3" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-7" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Next of Kin Details </h3>
                    <table>
                        <tr> <td> Full Name <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "nok_fullname" /></td> </tr>
                        <tr> <td> Relationship<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "nok_relationship" /></td> </tr>
                        <tr> <td> Phone Number<span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "nok_phonenumber" /></td> </tr>
                    </table>
                    <span id= "displayerror7"> </span>
                    <button type= "button" class= "back-button" onclick= "showprevious3()"> Back </button>
                    <button type= "button" class= "form-input" onclick= "gotonext(8)" id= "continuebutton7"> Continue </button><div id= "loader4" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div id= "Form-box-8" class= "col-6 col-m-10 col-t-8">
                <form action= "" method= "post">
                    <h3> Enter a Username and Password for Access to the Site </h3>
                    <table>
                        <tr> <td> Username <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "text" id= "username" /></td> </tr>
                        <tr> <td> Password <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "password" id= "password" onkeyup= "check_password(event)" /> <br /> <span id= "password_check_status"> </span></td> </tr>
                        <tr> <td> Confirm Password <span class= "required">*</span> </td> <td class= "form-input"> <input class= "form-input" type= "password" id= "password2" onkeyup= "confirm_password_match(event)"/> <br /> <span id= "password_match_status"> </span></td> </tr>
                    </table>
                    <span id= "displayerror8"> </span>
                    <button type= "button" class= "back-button" onclick= "showprevious7()" > Back </button>
                    <button class= "form-input" type= "button" onclick= "gotonext(9)" id= "continuebutton5"> Finish </button><div id= "loader8" class="loader"></div>
            <br /><br /><i> <small> Fields marked with <span class= "required">*</span> are required </small> </i>
                </form>
            </div>
            <div class = "clear col-3 col-m-1 col-t-2" > </div>
        </div>
    </div>
    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="js/ajaxrequests.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
<?php
    include("includes/footer.php");
?>