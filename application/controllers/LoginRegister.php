<?php
class LoginRegister extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        
    }
    
    function index()
    {
        if ($this->session->userdata('logged_in') !== false){
            $session_user_type = $this->session->userdata("type");
            // if($session_user_type === 'admin')
            // {
            //     redirect('page/admin');
            // }
             // access login for Bid and Awards Committe
            if($session_user_type == 'BAC' || $session_user_type == 'HEAD-BAC' || $session_user_type == 'Admin')
            {
                redirect('page/staff');
            }
             // access login for bidder
            elseif($session_user_type === 'BIDDER')
            {
                redirect('page/bidder');
            }
        }
        $this->load->helper('form');
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
            $profile_image = $data['profile_path'];
            $sesdata = array(
                'user_id'  => $user_id,
                'username'  => $name,
                'email'     => $email,
                'type'     => $type,
                'profile_image' => $profile_image,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);

            $activity_log_data = array( 
                'users_user_id' => $user_id, 
                'description' => 'Login', 
            ); 

            $this->db->insert('activity_log', $activity_log_data);

            // access login for admin
            // if($type === 'admin')
            // {
            //     redirect('page/admin');
            // }
             // access login for Bid and Awards Committe
            if($type === 'BAC' || $type === 'HEAD-BAC' || $type === 'ADMIN' )
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
            $config['upload_path']="./assets/uploads/technical-docs/";
            $config['allowed_types']='pdf|jpg|png';
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
                    'imgpath' => ""
                ); 

                $this->db->insert('users', $userData);
                $last_id = $this->db->insert_id();

                $certificate_data = array( 
                    'users_user_id' => $last_id, 
                    'description' => 'PhilGEPS Registration Certificate', 
                    'file_path' => "assets/uploads/technical-docs/".$data['upload_data']['file_name']
                ); 
                $this->db->insert('technical_documents', $certificate_data);


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

        $this->session->sess_destroy();

        redirect('login-register');
    }
    
   

    public function send()
    {
        $to =  $this->input->post('from');  // User email pass here
        $subject = 'Welcome To Elevenstech';

        $from = 'pass your email ID';              // Pass here your mail id

        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';


        $emailContent .= 'test';  //   Post message available here


        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
                    


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user']    = 'xxx';    //Important
        $config['smtp_pass']    = 'xxx';  //Important

        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 

        

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();

        $this->session->set_flashdata('msg',"Mail has been sent successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        return redirect('login-register');
    }
}