<?php

    namespace App\Controllers;
    use App\Models\UserModel;
    
    class SiteController extends BaseController{

        public function __construct(){
            $this->db = \Config\Database::connect();
        }

        public function userSession(){

            $session = \Config\Services::session();

            // Settings of User Session
            //$session->set("username", "chrishart");
            // $session->set("userdata", array(
            //     "name" => "Chris",
            //     "email" => "chris@hotmail.com",
            //     "id" => 69
            // ));

            // $session->push("userdata", array(
            //     "age" => "25"
            // ));

            // Reading Session Value
            // echo $session->get("username");
            
            // Removing a Session
            // $session->remove("username");

            $userdata = $session->get("userdata");

            echo "<pre>";
            print_r($userdata);

            $session->destroy();

        }

        public function getUsersData(){

            $userModel = new UserModel();

            $data = $userModel->findAll();

            // echo "<pre>";

            // print_r($data);

            return view("users-data", [
                "users" => $userModel->paginate(2),
                "pager" => $userModel->pager
            ]);

        }

        public function listCall(){

            print_my_message("Chrishart Estrada");

            $spring = "Chrishart Estrada";

            $length = find_my_length($spring);

            echo "Length = " . $length;

            $users = get_users();

            echo "<pre>";
            print_r($users);

        }

        public function myForm(){

            $userModel = new UserModel();

            if($this->request->getMethod() == "post"){
                $data = $this->request->getVar();

                // print_r($data);
                $form_data = [
                    "name" => $data['txt_name'],
                    "age" => $data['txt_age'],
                    "email" => $data['txt_email']
                ];

                $session = session();

                if($userModel->insert($form_data)){
                    $session->setFlashData("success", "Record Saved");
                }else{
                    $session->setFlashData("error", "Record Not Saved");
                }

                return redirect()->to(site_url("/myForm"));
            }
            return view("simple/myForm");

        }

        public function getData4(){

            $userModel = new UserModel();

            // Find All Data
            // $data = $userModel->findAll();
            $data = $userModel->where(["id" => 5])->first();
            // $userModel->select("id, name, email");
            // $userModel->whereIn("id", array(
            //     1, 2, 3, 4
            // ));
            // $userModel->orderBy("id", "Desc");
            // $data = $userModel->findAll();
            
            echo "<pre>";
            print_r($data);

        }

        public function deleteData3(){

            $userModel = new UserModel();

            $delete_id = 2;

            // $userModel->where([
            //     "id" => $delete_id
            // ])->delete();

            $userModel->delete([
                "id" => $delete_id
            ]);

        }

        public function updateData3(){

            $userModel = new UserModel();

            $update_data = array(
                "name" => "Khrissandra",
                "age" => 25,
                "email" => "sandra@gmail.com"
            );

            $update_id = 9;

            $userModel->where([
                "id" => $update_id
            ])->set($update_data)->update();

            // $userModel->update($update_data, ["id" => $update_id]); // Not Working Temporary

        }

        public function insertData3(){

            $userModel = new UserModel();

            // Create Some data
            $data = array(
                "name" => "Khris",
                "age" => 23,
                "email" => "khris@yahoo.com"                
            );

            // Insert Data
            $return_data = $userModel->insert($data);

            echo "<pre>";
            print_r($return_data);

        }

        public function getData3(){

            $userModel = new UserModel();
            $data = $userModel->findAll();

            echo "<pre>";
            print_r($data);

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