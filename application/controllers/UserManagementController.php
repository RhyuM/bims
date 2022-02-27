<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserManagementController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if($this->session->userdata('type') == 'BIDDER'){
            redirect('loginregister');
        }
        if ($this->session->userdata('logged_in')==false){
            redirect('login-register');
        }
    }

    public function index()
    {
        $sql="select * from users where user_type='BIDDER' and status='1'"; 
        $query = $this->db->query($sql);

        if($query){
            $data = array(
                'users_data' => $query->result(),
                'session_user_id'=>   $this->session->userdata('user_id')
            );
        }
       
        $this->load->view('BAC/user-management/list_of_bidder_view', $data);
        return $data;

        
    }
    public function index2()
    {
        $sql="select * from users where user_type='BIDDER' and status='0'"; 
        $query = $this->db->query($sql);

        if($query){
            $data = array(
                'users_data' => $query->result(),
                'session_user_id'=>   $this->session->userdata('user_id')
            );
        }
       
        $this->load->view('BAC/user-management/list_of_new_registration_view', $data);
        return $data;

        
    }
    public function accounts()
    {
        $this->load->view('BAC/user-management/accounts_view');
    }
    public function show_users()
    {
        $sql="SELECT * from users where user_type IN ('BAC-SECRETARIAT','HEAD-BAC','BAC','HEAD-TWG','TWG')";

        $query = $this->db->query($sql);
        $table_data ="";

        if($query){
            
            $start = 1;
                foreach ($query->result() as $users)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                        <td>'.$users->firstname.'</td>
                        <td>'.$users->lastname.'</td>
                        <td class="sorting_1">'.$users->user_type.'</td>
                        <td>'.$users->username.'</td>
                        <td>'.$users->email.'</td>
                        <td>'. $users->address.'</td>';

                    if($users->user_type == 'BAC' && $users->user_type != 'BAC-SECRETARIAT'){
                        $table_data .= '<td>
                                            <a data-user_id="'.$users->user_id.'" data-user_type="HEAD-BAC" type="submit" class="btn primary-button change_type">ASIGN AS HEAD BAC</a>
                                            <a data-user_id="'.$users->user_id.'" data-user_type="BAC-SECRETARIAT" type="submit" class="btn primary-button change_type">ASIGN AS SECRETARIAT</a>
                                        </td>';
                    }
                    else if($users->user_type == 'TWG'){
                        $table_data .= '<td>
                                            <a data-user_id="'.$users->user_id.'" data-user_type="HEAD-TWG" type="submit" class="btn primary-button change_type">ASIGN AS HEAD TWG</a>
                                        </td>';
                    }
                    else if($users->user_type == 'BAC-SECRETARIAT'){
                        $table_data .= '<td><p class="info-text">CURRENT BAC SECRETARIAT</p></td>';
                    }
                    else{
                        $table_data .= '<td><p class="info-text">CURRENT HEAD</p></td>';
                    }
                    $table_data .= '</tr>';
                }
        }
       
        echo $table_data;
        die;
    }
    public function create_user()
    {

        $data = array(				
            'user_type' 	=> $this->input->post('user_type'), 
            'firstname' 	=> $this->input->post('firstname'), 
            'lastname' 	=> $this->input->post('lastname'), 
            'email' 	=> $this->input->post('email'), 
            'username' 	=> $this->input->post('username'), 
            'address' 	=> $this->input->post('address'), 
            'password' => md5($this->input->post('password'))
        );

        $this->db->insert('users',$data);
    }

    public function change_user_type()
    {
        $user_type = $this->input->post('user_type');
        $user_id = $this->input->post('user_id');

        $sql='select * from users where user_type="'.$user_type.'" '; 
        $query = $this->db->query($sql);
        $users_data = $query->row();

        if (!empty($users_data)) {
            if($user_type == 'HEAD-BAC'){
                $this->db->set('user_type','BAC');
            }
            else if($user_type == 'BAC-SECRETARIAT'){
                $this->db->set('user_type','BAC');
            }
            else if($user_type == 'HEAD-TWG'){
                $this->db->set('user_type','TWG');
            }
    
            $this->db->where('user_id', $users_data->user_id);
            $this->db->update('users');
        }
       

        $this->db->set('user_type',$user_type);
        $this->db->where('user_id', $user_id);
        $this->db->update('users');
    }

    public function ajax_table_show_certified_users()
    {
        $sql="select * from users where user_type='BIDDER' and status='1' "; 
        $query = $this->db->query($sql);
        $table_data ="";

        if($query){
            
            $start = 1;
                foreach ($query->result() as $users)
                {
                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$users->user_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$users->firstname.' '.$users->lastname.'</td>
                    <td>'.$users->companyname.'</td>
                    <td>'. $users->address.'</td>
                </tr>';
                }
        }
       
        echo $table_data;
        die;
    }

    public function ajax_table_show_new_bidder_entry()
    {
        $sql="select * from users where user_type='BIDDER' and status='0' "; 
        $query = $this->db->query($sql);
        $table_data ="";

        if($query){
            
            $start = 1;
                foreach ($query->result() as $users)
                {
                    $status = '';
                    if($users->status == 0){
                        $status = 'Unconfirm';
                    }
                    else{
                        $status = 'Confirm';
                    }

                    $sql2="select file_path from technical_documents where users_user_id=".$users->user_id."
                            and description='PhilGEPS Registration Certificate' "; 
                    $query2 = $this->db->query($sql2);
                    $res = $query2->row();

                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$users->user_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$users->firstname.' '.$users->lastname.'</td>
                    <td>'.$users->companyname.'</td>
                    <td>'. $users->address.'</td>
                    <td>'.$status.'</td>
                    <td>'. $users->created.'</td>
                    <td>
                        <a href="javascript:void(0);"  data-link="'.base_url().$res->file_path.'" data-user_id="'.$users->user_id.'" class="btn btn-success img_button" role="button">View Cirtificate</a>            
                    </td>
                    
                </tr>';
                }
        }
       
        echo $table_data;
        die;
    }

    
    public function approve_certificate()
    {
        		
        $user_id = $this->input->post('user_id');
        $status = '1';

        $this->db->set('status', $status);
        $this->db->where('user_id', $user_id);

        $this->db->update('users');

        $sql='SELECT user_id, firstname, lastname FROM users
            where user_id = "'.$user_id.'" '; 
        $query = $this->db->query($sql);
        $users = $query->row();

        $activity_log_data = array( 
            'users_user_id' => $user_id, 
            'description' => "Approved User $users->firstname $users->lastname", 
        ); 

        $this->db->insert('activity_log', $activity_log_data);
    }
    
    public function create()
    {

        // ajax insert data
        $data = array(				
            'projects_description' 		=> $this->input->post('projects_description'), 
            'projects_type' 	=> $this->input->post('projects_type'), 
            'opening_date' 	=> $this->input->post('opening_date'), 
            'approve_budget_cost' 	=> $this->input->post('approve_budget_cost'), 
            'projects_status' 	=> $this->input->post('projects_status'), 
        );

        $this->db->insert('projects',$data);
    }

    public function delete()
    {
        $projects_id =$this->input->post('projects_id');
        $this->db->where('projects_id', $projects_id);
        $this->db->delete('projects');
    }
   
}