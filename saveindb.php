<?php
    require_once('includes/nfcsdb.php');
    require_once('includes/functions.php');
    require_once('includes/sessions.php');

    $count = 0;
    $fields = $_SESSION;
    $fields['timestamp'] = time();

    $email = $fields['email'];
    $username = $fields['username'];
    $status = $fields['status'];
    switch ($status) {
        case 'basic':
            $find = check_exists($email, 'email', 'basic_students', $username, 'username');
            if($find != 1){
                $query = "INSERT INTO basic_students (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 19){
                        $query .= $key . ", ";
                    } else {
                        $query .= $key;
                        $count = 0;
                    }
                }
                $query .= ") VALUES (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 19){
                        if(is_string($value)){
                            $query .= "'" . $value . "', ";
                        } else{
                            $query .= $value . ", ";
                        }
                    } else {
                        if(is_string($value)){
                            $query .= "'" . $value . "' " ;
                        } else{
                            $query .= $value;
                        }
                    }
                }
                $query .= ") ";

                $savedetails = mysqli_query($connection, $query);
                check_connect($savedetails);
                if($savedetails){
                    $id = mysqli_insert_id($connection);
                    if($id < 10){
                        $id2 = "000" . $id;
                    } elseif(($id > 9) && ($id < 100)){
                        $id2 = "00" . $id;
                    } elseif(($id > 99) && ($id < 1000)){
                        $id2 = "0" . $id;
                    }
                    $census_reg_number = "NFCS/Cen2018/B" . $id2;
                    $return['census_reg_number'] = $census_reg_number;
                    $return['status'] = "success";

                    $query = "UPDATE basic_students SET census_reg_number = '{$census_reg_number}' WHERE id = {$id} ";
                    $set_census_reg_number = mysqli_query($connection, $query);
                    check_connect($set_census_reg_number);

                    $query = "INSERT INTO members (status_id, status) VALUES ({$id}, 'basic')";
                    $insert_into_members = mysqli_query($connection, $query);
                    check_connect($insert_into_members);
                    if($insert_into_members){
                        $id = mysqli_insert_id($connection);
                        $directory = "member" . $id . "_societies";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, society 
                                    VARCHAR(50) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                        $directory = "member" . $id . "_payments";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, fee 
                                    VARCHAR(150) NOT NULL, amount INT(11) NOT NULL, time INT(11) NOT NULL,
                                    received_by INT(11) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                    }
                    session_unset($_SESSION);
                    echo json_encode($return); 

                } else {
                    $return['status'] = "failed";
                    echo json_encode($return); 
                }

                //log in user here 
        
            } else {
                $return['status'] = "failed";
                $return['error'] = "email already exists";
                echo json_encode($return);
            }

                
        
            break;
        
        case 'undergraduates':
            $find = check_exists($email, 'email', 'undergraduates', $username, 'username');
            if($find != 1){
                $query = "INSERT INTO undergraduates (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 20){
                        $query .= $key . ", ";
                    } else {
                        $query .= $key;
                        $count = 0;
                    }
                }
                $query .= ") VALUES (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 20){
                        if(is_string($value)){
                            $query .= "'" . $value . "', ";
                        } else{
                            $query .= $value . ", ";
                        }
                    } else {
                        if(is_string($value)){
                            $query .= "'" . $value . "' " ;
                        } else{
                            $query .= $value;
                        }
                    }
                }
                $query .= ") ";

                $savedetails = mysqli_query($connection, $query);
                check_connect($savedetails);
                if($savedetails){
                    $id = mysqli_insert_id($connection);
                    if($id < 10){
                        $id2 = "000" . $id;
                    } elseif(($id > 9) && ($id < 100)){
                        $id2 = "00" . $id;
                    } elseif(($id > 99) && ($id < 1000)){
                        $id2 = "0" . $id;
                    }
                    $census_reg_number = "NFCS/Cen2018/U" . $id2;
                    $return['census_reg_number'] = $census_reg_number;
                    $return['status'] = "success";

                    $query = "UPDATE undergraduates SET census_reg_number = '{$census_reg_number}' WHERE id = {$id} ";
                    $set_census_reg_number = mysqli_query($connection, $query);
                    check_connect($set_census_reg_number);

                    $query = "INSERT INTO members (status_id, status) VALUES ({$id}, 'undergraduate')";
                    $insert_into_members = mysqli_query($connection, $query);
                    check_connect($insert_into_members);
                    if($insert_into_members){
                        $id = mysqli_insert_id($connection);
                        $directory = "member" . $id . "_societies";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, society 
                                    VARCHAR(50) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                        $directory = "member" . $id . "_payments";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, fee 
                                    VARCHAR(150) NOT NULL, amount INT(11) NOT NULL, time INT(11) NOT NULL,
                                    received_by INT(11) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                    }
                    session_unset($_SESSION);
                    echo json_encode($return); 
                } else {
                    $return['status'] = "failed";
                    echo json_encode($return); 
                }

                //log in user here 
        
            } else {
                $return['status'] = "failed";
                $return['error'] = "email already exists";
                echo json_encode($return);
            }

                
        
            break;
        
        case 'alumni':
            $find = check_exists($email, 'email', 'alumni', $username, 'username');
            if($find != 1){
                $query = "INSERT INTO alumni (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 21){
                        $query .= $key . ", ";
                    } else {
                        $query .= $key;
                        $count = 0;
                    }
                }
                $query .= ") VALUES (";
                foreach ($fields as $key => $value) {
                    $count++;
                    if($count < 21){
                        if(is_string($value)){
                            $query .= "'" . $value . "', ";
                        } else{
                            $query .= $value . ", ";
                        }
                    } else {
                        if(is_string($value)){
                            $query .= "'" . $value . "' " ;
                        } else{
                            $query .= $value;
                        }
                    }
                }
                $query .= ") ";

                $savedetails = mysqli_query($connection, $query);
                check_connect($savedetails);
                if($savedetails){
                    $id = mysqli_insert_id($connection);
                    if($id < 10){
                        $id2 = "000" . $id;
                    } elseif(($id > 9) && ($id < 100)){
                        $id2 = "00" . $id;
                    } elseif(($id > 99) && ($id < 1000)){
                        $id2 = "0" . $id;
                    }
                    $census_reg_number = "NFCS/Cen2018/A" . $id2;
                    $return['census_reg_number'] = $census_reg_number;
                    $return['status'] = "success";

                    $query = "UPDATE alumni SET census_reg_number = '{$census_reg_number}' WHERE id = {$id} ";
                    $set_census_reg_number = mysqli_query($connection, $query);
                    check_connect($set_census_reg_number);

                    $query = "INSERT INTO members (status_id, status) VALUES ({$id}, 'alumnus')";
                    $insert_into_members = mysqli_query($connection, $query);
                    check_connect($insert_into_members);
                    if($insert_into_members){
                        $id = mysqli_insert_id($connection);
                        $directory = "member" . $id . "_societies";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, society 
                                    VARCHAR(50) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                        $directory = "member" . $id . "_payments";
                        $query = "CREATE TABLE {$directory} (id INT(11) NOT NULL auto_increment, fee 
                                    VARCHAR(150) NOT NULL, amount INT(11) NOT NULL, time INT(11) NOT NULL,
                                    received_by INT(11) NOT NULL, PRIMARY KEY (id)) ENGINE = MYISAM ";
                        $create = mysqli_query($connection, $query);
                        check_connect($create);
                    }
                    session_unset($_SESSION);
                    echo json_encode($return); 
                } else {
                    $return['status'] = "failed";
                    echo json_encode($return); 
                }

                //log in user here 
        
            } else {
                $return['status'] = "failed";
                $return['error'] = "email already exists";
                echo json_encode($return);
            }

                
        
            break;
        
        default:
            # code...
            break;
    }

        
?>