<?php
    require_once('includes/nfcsdb.php');
    require_once('includes/functions.php');
    require_once('includes/form_functions.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title> NFCS Uniport Chapter </title>
    <link rel= "stylesheet" href= "css/style.css" />
</head>
<body>
    <div id= "fullbody">
    <!--header -->
        <div class= "header row">
            <div class= "col-2 col-t-3 col-m-3">
                <img class= "logo" src= "" alt= "logo" />
            </div>
            <div class= "col-8 col-t-7 col-m-7 center"> 
                NIGERIAN FEDERATION OF CATHOLIC STUDENTS <br /> <small> UNIPORT CHAPTER </small>
            </div>
            <div class= "col-1 col-t-1 col-m-1"> Register </div>
            <div class= "col-1 col-t-1 col-m-1"> Sign In </div>
        </div>
        <div class= "menu row">
            <ul>
                <li> News </li>
            </ul>
        </div>
    </div>
<?php
    include("includes/footer.php");
?>