<?php
    require_once('includes/nfcsdb.php');
    require_once('includes/functions.php');
    require_once('includes/sessions.php');
    require_once('includes/form_functions.php');

    create_session('nfcssessvals');

    if(isset($_POST['send'])) {
        //start form validation
        $fields = all_prep($_POST);
        $_SESSION = $fields;

        $errors = array();
        $required = array();
        $max_length_fields = array();
        $min_length_fields = array();

        $required[] = 'email';
        $required[] = 'password';
        $errors = array_merge($errors, check_required($required));
        $min_length_fields['password'] = 6;
        $errors = array_merge($errors, check_min_length_fields($min_length_fields));

        if(empty($errors)){
            //check for the user in the database
            $query = "SELECT * FROM administrators WHERE email = \"{$fields['email']}\"";
            $get_user = mysqli_query($connection, $query);
            check_connect($get_user);
            if($get_user){
                if(mysqli_num_rows($get_user) > 0) { //email was found
                    $user = mysqli_fetch_array($get_user);
                    if($user['password'] === sha1($fields['password'])){ //password matches, log user in
                        setcookie("logged", $user['id'], time() + (60 * 60 *24 * 365), '/');
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['signin'] = 1;
                        header("location:staff.php");
                        exit;
                    } else { //password doesn't match'
                            $errors[] = "The email and Password you entered do not match!";
                            $_SESSION['errors'] = $errors;
                           // echo sha1($fields['password']);
                            header("location:stafflogin.php");
                            exit;
                    }
                } else { //email was not found in database
                        $errors[] = "This email was not found in our database!";
                        $_SESSION['errors'] = $errors;
                        header("location:stafflogin.php");
                        exit;
                }
            }
        } else {
                $_SESSION['errors'] = $errors;
                header("location:stafflogin.php");
                exit;
        } 
    }
?>