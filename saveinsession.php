<?php
    require_once('includes/nfcsdb.php');
    require_once('includes/functions.php');
    require_once('includes/sessions.php');
    require_once('includes/form_functions.php');

    //start form validation
    $fields = all_prep($_POST);

    //specific validations
    $fields['password'] = sha1($fields['password']);
    
    //save to session 
    foreach ($fields as $key => $value) {
        if(!empty($value)){
           $_SESSION[$key] = $value;
        } else {
            $_SESSION[$key] = "12";
        }
    }
?>