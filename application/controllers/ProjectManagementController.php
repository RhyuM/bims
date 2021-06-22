<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProjectManagementController extends CI_Controller
{
    // controller functions note
    // The head of Bid and Awards Committee is alowed to create , update and delete the project and only alowed  to update and delete if the project status is new
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
        $this->load->view('BAC/project-management/list_of_projects_view');
    }
    

    public function ajax_table_projects_show()
    {
        $sql="select * from projects where delete_status != 1"; 
        $query = $this->db->query($sql);

        $sql2 ="select user_type from users where user_type = 'HEAD-BAC' ";
        $query2 = $this->db->query($sql2);
        $user = $query2->result();
       

        $table_data ="";

        // if($query){
            
                $start = 1;
                foreach ($query->result() as $projects)
                {
                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects->projects_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$projects->projects_description.'</td>
                    <td>'.$projects->projects_type.'</td>
                    <td>'. $projects->opening_date .'</td>
                    <td> ₱ '.$projects->approve_budget_cost.'</td>
                    <td>'. $projects->projects_status.'</td>
                    ';
                        // var_dump($user[0]->user_type);
                        // exit();
                    
                        //  echo $user[0]->user_type;
                        // if($user[0]->user_type == "HEAD-BAC")
                        
                        if($this->session->userdata('type') == "HEAD-BAC")
                        {
                            $table_data .= '
                                <td>  
                                    <a href="javascript:void(0);"  data-projects_id="'.$projects->projects_id.'" data-projects_description="'.$projects->projects_description.'" data-projects_type="'.$projects->projects_type.'" data-opening_date="'. $projects->opening_date .'" data-approve_budget_cost="'. $projects->approve_budget_cost .'" class="editRecord btn btn-success" role="button">Update</a>
                                    <a href="javascript:void(0);" class="btn btn-danger deleteRecord" data-projects_id="'.$projects->projects_id.'">Delete</a>
                                </td>
                            </tr>';
                        }
                }
        // }
       
        echo $table_data;
        die;
    }
    public function create()
    {

        // ajax insert data
        $sql="Select user_id from users where user_type='HEAD-BAC' or user_type='HEAD-TWG'"; 
        $query = $this->db->query($sql)->result();

        $config['upload_path']="./assets/uploads/invitation-to-bid";
        $config['allowed_types']='pdf';
        $this->load->library('upload',$config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $project_data = array(		
                		
                'projects_description' 		=> $this->input->post('projects_description'), 
                'projects_type' 	=> $this->input->post('projects_type'), 
                'opening_date' 	=> $this->input->post('opening_date'), 
                'approve_budget_cost' 	=> $this->input->post('approve_budget_cost'), 
                'projects_status' 	=> $this->input->post('projects_status'), 
                'delete_status' 	=> '0', 
                'ITB_path' => "/assets/uploads/invitation-to-bid/".$data['upload_data']['file_name']
            );
        }

        $this->db->insert('projects',$project_data);
        $last_id = $this->db->insert_id();

        foreach($query as $user_data)
        {
            $data2 = array(				
                'decrypt_status' => '0',
                // the id from last insert project will get using below method
                'projects_projects_id ' => $last_id,
                'users_user_id' => $user_data->user_id,
            );
    
            $this->db->insert('project_openers',$data2);
            // echo $this->db->insert_id();

        }
    }

    public function update()
    {
        		
        $projects_id		= $this->input->post('projects_id');
        $projects_description 		= $this->input->post('projects_description');
        $projects_type	= $this->input->post('projects_type'); 
        $opening_date 	= $this->input->post('opening_date');
        $approve_budget_cost 	= $this->input->post('approve_budget_cost');
        $projects_status 	= $this->input->post('projects_status');


        $this->db->set('projects_description', $projects_description);
        $this->db->set('projects_type', $projects_type);
        $this->db->set('opening_date', $opening_date);
        $this->db->set('approve_budget_cost', $approve_budget_cost);
        $this->db->set('projects_status', $projects_status);
        $this->db->where('projects_id', $projects_id);

        $this->db->update('projects');
    }

    public function delete()
    {
        echo "<script>alert();</script>";
        $projects_id =$this->input->post('projects_id');
        $delete_status = '1';

        $this->db->set('delete_status', $delete_status);
        $this->db->where('projects_id', $projects_id);

        $this->db->update('projects');
        // $this->db->delete('projects');
    }
   
}