<?php

    class IndexC extends CI_Controller{

        public function index(){
            $this->load->view("Admin/Index/index");
        }
    }