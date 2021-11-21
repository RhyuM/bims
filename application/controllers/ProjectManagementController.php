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
        if($this->session->userdata('type') == 'BIDDER'){
            redirect('loginregister');
        }
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
        $sql="select * from projects where delete_status != 1  ORDER BY created DESC"; 
        $query = $this->db->query($sql);

        $table_data ="";

            
            $start = 1;
            foreach ($query->result() as $projects)
            {
                $usertype = $this->session->userdata('type');
                $sql2 ='  SELECT * FROM bids
                where projects_projects_id = "'.$projects->projects_id.'"'; 

                $query2 = $this->db->query($sql2);


                $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects->projects_id.'">
                                
                <td class="sorting_1">'.$start++.'</td>
                <td>'.$projects->projects_description.'</td>
                <td>'.$projects->project_location.'</td>
                <td>'.$projects->projects_type.'</td>
                <td>'. $projects->submission_deadline.'</td>
                <td>'. $projects->opening_date .'</td>
                <td> ₱ '.number_format($projects->approve_budget_cost).'</td>
                <td>'. $projects->projects_status.'</td>
                <td>'. $query2->num_rows().'</td>
                ';
                    
                    if($usertype == "HEAD-BAC" || $usertype == "ADMIN")
                    {
                        $table_data .= '
                            <td>  
                                <a href="javascript:void(0);"  data-projects_id="'.$projects->projects_id.'" data-projects_description="'.$projects->projects_description.'" data-projects_type="'.$projects->projects_type.'" data-opening_date="'. $projects->opening_date .'" data-submission_deadline="'. $projects->submission_deadline .'" data-approve_budget_cost="'. $projects->approve_budget_cost .'" class="editRecord btn btn-success" role="button">Update</a>
                                <a href="javascript:void(0);" class="btn btn-danger deleteRecord" data-projects_id="'.$projects->projects_id.'">Delete</a>
                            </td>
                        </tr>';
                    }
            }

       
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
                'submission_deadline' 	=> $this->input->post('submission_deadline'), 
                'approve_budget_cost' 	=> str_replace(',', '', $this->input->post('approve_budget_cost')), 
                'projects_status' 	=> 'Procurement', 
                'project_location' 	=> $this->input->post('project_location'), 
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

        $user_id = $this->session->userdata('user_id');
        $projects_description = $this->input->post('projects_description');

        $activity_log_data = array( 
            'users_user_id' => $user_id, 
            'description' => "Created New Project ($projects_description)", 
        ); 

        $this->db->insert('activity_log', $activity_log_data);
    }

    public function update()
    {
        		
        $projects_id		= $this->input->post('projects_id');
        $projects_description 		= $this->input->post('projects_description');
        $projects_type	= $this->input->post('projects_type'); 
        $opening_date 	= $this->input->post('opening_date');
        $submission_deadline 	= $this->input->post('submission_deadline');
       
        $approve_budget_cost 	= str_replace(',', '', $this->input->post('approve_budget_cost'));
        $projects_status 	= $this->input->post('projects_status');


        $this->db->set('projects_description', $projects_description);
        $this->db->set('projects_type', $projects_type);
        $this->db->set('opening_date', $opening_date);
        $this->db->set('submission_deadline', $submission_deadline);
        
        $this->db->set('approve_budget_cost', $approve_budget_cost);
        // $this->db->set('projects_status', $projects_status);
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