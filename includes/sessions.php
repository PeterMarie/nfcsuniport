<?php
    create_session('nfcssessvals');

     function create_session($session_name) {
        session_name($session_name);
        session_start();
        setcookie(session_name(),session_id());
   }
?>