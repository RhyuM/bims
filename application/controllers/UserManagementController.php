<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserManagementController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
                    <td>
                        <a href="javascript:void(0);"  class="btn btn-success" role="button">View Profile</a>                    
                    </td>
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

                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$users->user_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$users->firstname.' '.$users->lastname.'</td>
                    <td>'.$users->companyname.'</td>
                    <td>'. $users->address.'</td>
                    <td>'.$status.'</td>
                    <td>'. $users->created.'</td>
                    <td>
                        <a href="javascript:void(0);"  data-imgpath="'.$users->imgpath.'" data-user_id="'.$users->user_id.'" class="btn btn-success view-certificate-button" role="button">View Cirtificate</a>
                        <a href="javascript:void(0);"  class="btn btn-success" role="button">View Full Details</a>                 
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