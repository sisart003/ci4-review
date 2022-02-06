<?php

    if(!function_exists("get_users")){

        function get_users(){
            $db = \Config\Database::connect();

            $users = $db->query("SELECT * FROM userz")->getResult();

            return $users;
        }

    }

    if(!function_exists("print_my_message")){
        function print_my_message($message){
            echo "<h1>" . $message . "</h1>";
        }
    }

    if(!function_exists("find_my_length")){
        function find_my_length($spring){
            return strlen("$spring");
        }
    }