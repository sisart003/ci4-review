<?php

    namespace App\Controllers;
    
    class SiteController extends BaseController{

        public function __construct(){
            $this->db = \Config\Database::connect();
        }

        // Insert Data using raw query
        public function insertRaw(){

            $insert_query = "INSERT INTO userz(name, age, email) VALUE ('Gam', '24', 'gam@yahoo.com')";
            
            if($this->db->query($insert_query)){
                echo "Value has been inserted";
            }else{
                echo "Error";
            }
        
        }

        public function updateRaw(){

            $updateQuery = "UPDATE userz SET name = 'Chriz', email = 'chizz@gmail.com' WHERE id = 1";

            

            if($this->db->query($updateQuery)){
                echo "Value has been Updated";
            }else{
                echo "Error";
            }

        }

        public function deleteRaw(){

            $deleteQuery = "DELETE FROM userz WHERE id = 3";

            if($this->db->query($deleteQuery)){
                echo "Value has been Delete";
            }else{
                echo "Error";
            }

        }

        public function simple(){
            return view("simple/simple");
        }

        public function aboutUs(){

            return view('simple/about');
        
        }

        public function contact(){

            return view("simple/contact");
            
        }

        public function callMe($value = null, $value2 = null){
            
            echo "<h2>Call me Maybe??? $value $value2</h2>";
        
        }

        public function queryParam(){

            //echo "<h2>Welcome to Query String Value</h2>";
            //print_r($this->request->getVar());
            //echo $this->request->getVar("name");

            $values = $this->request->getVar();

            return view("view_file", [
                "name" => $this->request->getVar("name"),
                "age" => $this->request->getVar("age")
            ]);

        }

    }