<?php
class ProfileController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }
    
    function index()
    {
        $session_user_id = $this->session->userdata("user_id");
        $sql='select * from users
        where user_id="'.$session_user_id.'"'; 
        $query = $this->db->query($sql);

        $row = $query->row();

        $data = array( 
            'firstname' => $row->firstname,
            'lastname' => $row->lastname,  
            'companyname' => $row->companyname,
            'username' => $row->username,
            'email' => $row->email,
            'address' => $row->address,
            'profile_path' => $row->profile_path
        ); 

        $this->load->view('profile',$data);
    }

    

    public function update_personal_info(){ 
            $session_user_id = $this->session->userdata("user_id");

            $companyname    = $this->input->post('companyname');
            $firstname  	= $this->input->post('firstname');
            $lastname	    = $this->input->post('lastname'); 
            $username 	    = $this->input->post('username');
            $address 	    = $this->input->post('address');
        
            $this->db->set('companyname', $companyname);
            $this->db->set('firstname', $firstname);
            $this->db->set('lastname', $lastname);
            $this->db->set('username', $username);
            $this->db->set('address', $address);
            $this->db->where('user_id', $session_user_id);
            $this->db->update('users');            

            $this->session->set_userdata("username", "$username");
    } 

    public function insert_profile(){ 
            $session_user_id = $this->session->userdata("user_id");

            $config['upload_path']="./assets/uploads/profile/";
            $config['allowed_types']='jpg|png';
            $this->load->library('upload',$config);

            if($this->upload->do_upload("file")){
                $data = array('upload_data' => $this->upload->data());
              
                $profile_data = "assets/uploads/profile/".$data['upload_data']['file_name'];

                $this->db->set('profile_path', $profile_data);
                $this->db->where('user_id', $session_user_id);
                $this->db->update('users');

                $this->session->set_userdata("profile_image", "$profile_data");
            }
    } 

    private function logged_in()
    {
        if( ! $this->session->userdata('logged_in')){
            redirect('login-register');
        }
    }
    
    public function changePassword()
    {
        $this->logged_in();

        $data['title'] = 'Change Password';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            // $this->load->view('header', $data);
            print json_encode(array("status"=>"fail","message"=>"Passwords do not match"));
            // $this->load->view('BAC/profile', $data);
            // $this->load->view('footer', $data);
        }
        else {
            
            $id = $this->session->userdata('user_id');

            $newpass = $this->input->post('newpass');

            $this->login_model->update_user($id, array('password' => md5($newpass)));

            print json_encode(array("status"=>"success","message"=>"success"));
            // $this->session->sess_destroy();
            // redirect(site_url() . 'loginregister/logout','refresh');
        }
    }

    public function password_check($oldpass)
    {
        $id = $this->session->userdata('user_id');
        $user = $this->login_model->get_user($id);

        if($user->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }


}