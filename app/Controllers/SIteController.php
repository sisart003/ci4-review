<?php

    namespace App\Controllers;
    
    class SiteController extends BaseController{

        public function simple(){
            return view("simple/simple");
        }

        public function aboutUs(){

            return view('simple/about');
        
        }

        public function contact(){

            return view("simple/contact");
            
        }

    }