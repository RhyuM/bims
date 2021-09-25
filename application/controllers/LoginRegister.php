<?php
class LoginRegister extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
    }
    
    function index()
    {
        if ($this->session->userdata('logged_in') !== false){
            $session_user_type = $this->session->userdata("type");
            if($session_user_type === 'admin')
            {
                redirect('page/admin');
            }
             // access login for Bid and Awards Committe
            elseif($session_user_type === 'BAC' || $session_user_type === 'HEAD-BAC' )
            {
                redirect('page/staff');
            }
             // access login for Technical Working Group
            elseif($session_user_type === 'TWG' ||  $session_user_type === 'HEAD-TWG')
            {
                redirect('page/staff');
            }
             // access login for bidder
            elseif($session_user_type === 'BIDDER')
            {
                redirect('page/bidder');
            }
        }
        $this->load->view('login-register/login_register_view');
    }
    
    function auth(){
        $email    = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->login_model->validate($email,$password);

        if($validate->num_rows() > 0)
        {
            $data  = $validate->row_array();
            $user_id  = $data['user_id'];
            $name  = $data['username'];
            $email = $data['email'];
            $type = $data['user_type'];
            $sesdata = array(
                'user_id'  => $user_id,
                'username'  => $name,
                'email'     => $email,
                'type'     => $type,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($type === 'admin')
            {
                redirect('page/admin');
            }
             // access login for Bid and Awards Committe
            elseif($type === 'BAC' || $type === 'HEAD-BAC' )
            {
                redirect('page/staff');
            }
             // access login for Technical Working Group


            elseif($type === 'TWG' ||  $type === 'HEAD-TWG')
            {
                redirect('page/staff');
            }
             // access login for bidder
            elseif($type === 'BIDDER')
            {
                redirect('page/bidder');
            }

        }
        else
        {
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login-register');
        }
    }
    public function registration(){ 
            $config['upload_path']="./assets/uploads";
            $config['allowed_types']='gif|jpg|png';
            $this->load->library('upload',$config);

            if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
                $userData = array( 
                    'user_type' => 'BIDDER', 
                    'firstname' => $this->input->post('firstname'), 
                    'lastname' => $this->input->post('lastname'), 
                    'companyname' => $this->input->post('companyname'),      
                    'address' => $this->input->post('address'), 
                    'username' => $this->input->post('username'), 
                    'email' => $this->input->post('email'), 
                    'password' => md5($this->input->post('password')), 
                    'status' => '0', 
                    'imgpath' => "/assets/uploads/".$data['upload_data']['file_name']
                ); 

                $this->db->insert('users', $userData);

                $last_id = $this->db->insert_id();

                $user_id  =  $last_id;
                $name  = $this->input->post('username');
                $email = $this->input->post('email');
                $type = 'BIDDER';
                $sesdata = array(
                    'user_id'  => $user_id,
                    'username'  => $name,
                    'email'     => $email,
                    'type'     => $type,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($sesdata);

            }
    } 

    function logout()
    {
        // $user_data = $this->session->all_userdata();
        // foreach ($user_data as $key => $value) {
        //     if ($key != 'user_id' && $key != 'username' && $key != 'email' && $key != 'type'  && $key != 'logged_in') {
        //         $this->session->unset_userdata($key);
        //     }
        // }
        $this->session->sess_destroy();

        redirect('login-register');
    }
    
}