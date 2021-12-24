<?php
class Page extends CI_Controller{
      function __construct()
      {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE)
        {
          redirect('login-register');
        }
      }
    
      function index(){
        //Allowing access to admin only
          if($this->session->userdata('user_type')==='admin')
          {
              $this->load->view('dashboard_view_admin');
          }
          else
          {
              echo "Access Denied";
          }
    
      }
    
      function staff(){

        

        //Allowing access to staff only
        if($this->session->userdata('type')==='BAC' || $this->session->userdata('type')==='HEAD-BAC' || $this->session->userdata('type')==='ADMIN')
        {
          $this->load->view('BAC/dashboard_view');
        }
        else if($this->session->userdata('type')==='TWG' || $this->session->userdata('type')==='HEAD-TWG')
        {
          $this->load->view('TWG/dashboard_view');
        }
        else
        {
            echo "Access Denied";
        }
      }
      function bidder(){
        //Allowing access to staff only
        if($this->session->userdata('type')==='BIDDER')
        {
          $this->load->view('BIDDER/dashboard_view');
        }
        else
        {
            echo "Access Denied";
        }
      }
}