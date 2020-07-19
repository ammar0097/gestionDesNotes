<?php
  class Pages extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
        // $this->view('users/login');
      }
    }
    
    public function index(){
      
      $this->view('pages/index');

    }

  }