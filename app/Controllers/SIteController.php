<?php

    namespace App\Controllers;
    
    class SiteController extends BaseController{

        public function __construct(){
            $this->db = \Config\Database::connect();
        }

        public function insertData2(){

            $builder = $this->db->table("userz");

            $data = [
                [
                    "name" => "Gam",
                    "age" => 28,
                    "email" => "Gam@gmail.com"
                ],[
                    "name" => "bry",
                    "age" => 27,
                    "email" => "bry@gmail.com"
                ]
                
            ];

            print_r($builder->insertBatch($data));

        }

        public function deleteData2(){

            $builder = $this->db->table("userz");

            $id = 10;

            $builder->where([
                "id" => $id
            ]);

            $builder->delete();

            // Delete Operation
            // print_r($builder->delete([
            //     "id" => $id
            // ]));

            // echo $this->db->getLastQuery();

        }

        public function updateData2(){
            $builder = $this->db->table("userz");
            $updated_data = [
                "name" => "Cheszie",
                "age" => 27,
                "email" => "Cheszie03@hotmail.com"
            ];

            // Update Method
            // $builder->update($updated_data, [
            //     "id" => 2
            // ]);

            $builder->where(["id" => 2])->set($updated_data)->update();

            echo $this->db->getLastQuery();
        }

        public function getData2(){

            $builder = $this->db->table("userz");

            // Add WHERE condition

            $builder = $builder->where(array(
                "id" => 2,
                "name" => "Chess"
            ));

            $data = $builder->get()->getRowArray();

            echo "<pre>";
            print_r($data);

        }

        public function getData(){
            $data = $this->db->query("SELECT * FROM userz");
            $result = $data->getResult();

            if($result){
                echo "<pre>";
                print_r($result);
            }else{
                echo "Data not found";
            }
            
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