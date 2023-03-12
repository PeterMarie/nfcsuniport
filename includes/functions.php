<?php

    function check_connect($query) {
        global $connection;
        if(!$query){
            die("error: " . mysqli_error($connection));
        }
   }

   function check_log_in(){
        session_name('nfcssessvals');
        session_start();
        setcookie(session_name(),session_id());

           // if(!isset($_SESSION['signin']) && ($_SESSION['signin'] != 1)) {
               // header("location:index.php");
            //}
     }

   function get_values_by_id($table, $id){ //returns array of attributes
         global $connection;
         $query = "SELECT * FROM ";
         $query .= $table;
         $query .= " WHERE id= " . $id;
         $get_values = mysqli_query($connection, $query);
        // check_connect($get_values, "142");
         $value = mysqli_fetch_array($get_values);
         return $value;
     }
     
    function trunc($phrase, $max_words) { //Open Source function! Tks guys!!!
        $phrase_array = explode(' ',$phrase);
        if(count($phrase_array) > $max_words && $max_words > 0)
            $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
        return $phrase;
    }

    function check_exists($value, $column, $table, $other_value = NULL, $other_column = NULL) {
        global $connection;
        global $return_id;
        $find = 0;
        if(($other_value == NULL) && ($other_column == NULL)){
            $query = "SELECT * FROM {$table} WHERE {$column} = \"{$value}\"";
            $check = mysqli_query($connection, $query);
            check_connect($check);
            if(mysqli_num_rows($check) != 0){
                $check_result = mysqli_fetch_array($check);
                $return_id = $check_result['id'];
                $find = 1;
            }
        } else {
            $query = "SELECT * FROM {$table} WHERE {$column} = \"{$value}\" AND {$other_column} = \"{$other_value}\"";
            $check = mysqli_query($connection, $query);
            check_connect($check);
            if(mysqli_num_rows($check) != 0){
                $check_result = mysqli_fetch_array($check);
                $return_id = $check_result['id'];
                $find = 1;
            }
        }
        return $find;
    }

?>