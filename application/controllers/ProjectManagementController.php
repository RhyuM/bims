<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProjectManagementController extends CI_Controller
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
        $this->load->view('BAC/project-management/list_of_projects_view');
    }
    public function project_documents($id)
    {
        $this->session->set_userdata("projects_id", "$id");
        $this->load->view('BAC/project-management/project_documents_view');
    }

    public function technical_docs_show() 
    {

        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM bid_technical_documents
        inner join bids on bid_technical_documents.bids_bids_id = bids.bids_id
        where bids.status = "5" 
        and bids.projects_projects_id  ="'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
            foreach ($query->result() as $documents)
            {
                $table_data .= '<tr class="gradeX odd" role="row">
                                
                <td class="sorting_1 description_name">'.$documents->description.'</td>
                
                </iframe>
                <td>
                    <input type="hidden" name="images[]" class="docs_file" value="'.$documents->file_path.'" />
                    <a class="btn img_button" data-description="'.$documents->description.'" data-link='.base_url()."".$documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                ';
            }

        echo $table_data;
        die;
    }

    
    public function financial_docs_show() 
    {

        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM financial_documents
        inner join bids on financial_documents.bids_bids_id = bids.bids_id
        where bids.status = "5" 
        and bids.projects_projects_id="'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
            foreach ($query->result() as $documents)
            {
                $table_data .= '<tr class="gradeX odd" role="row">
                                
                <td class="sorting_1 description_name">'.$documents->description.'</td>
                
                </iframe>
                <td>
                    <input type="hidden" name="images[]" class="docs_file" value="'.$documents->file_path.'" />
                    <a class="btn img_button" data-description="'.$documents->description.'" data-link='.base_url()."".$documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                ';
            }

        echo $table_data;
        die;
    }
    public function other_docs_show() 
    {

        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM projects
        where projects_id="'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
            foreach ($query->result() as $documents)
            {
                $table_data .= '<tr class="gradeX odd" role="row">
                                
                <td class="sorting_1 description_name">Invitation To Bid</td>
                
                </iframe>
                <td>
                    <input type="hidden" name="images[]" class="docs_file" value="'.$documents->ITB_path.'" />
                    <a class="btn img_button" data-description="'.$documents->projects_description.'" data-link='.base_url()."".$documents->ITB_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                ';
            }

        echo $table_data;
        die;
    }


    function download()
    {
        if($this->input->post('images')){
            $this->load->library('zip');
            $images = $this->input->post('images');
            foreach($images as $image)
            {
                $this->zip->read_file($image);
            }
            $this->zip->download('documents '.time().'.zip');
        }
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
                $total_num_of_bids = $query2->num_rows();

                $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects->projects_id.'">
                                
                <td class="sorting_1">'.$start++.'</td>
                <td>'.$projects->projects_description.'</td>
                <td>'.$projects->project_location.'</td>
                <td>'.$projects->projects_type.'</td>
                <td>'. $projects->submission_deadline.'</td>
                <td>'. $projects->opening_date .'</td>
                <td> ₱ '.number_format($projects->approve_budget_cost).'</td>
                <td>'. $projects->projects_status.'</td>
                <td>'.$total_num_of_bids.'</td>
                ';
                    
                    if($usertype == "HEAD-BAC" || $usertype == "BAC-SECRETARIAT"){
                        $table_data .= '
                            <td class="td_button">  
                                <a class="btn evaluate-button button_green" type="button" href="'.base_url("projectmanagement/documents").'/'.$projects->projects_id.'">VIEW</a>';
                                if($usertype == "HEAD-BAC"){
                                    $table_data .= '<a href="javascript:void(0);"  data-projects_id="'.$projects->projects_id.'" data-projects_description="'.$projects->projects_description.'" data-projects_type="'.$projects->projects_type.'" data-opening_date="'. $projects->opening_date .'" data-submission_deadline="'. $projects->submission_deadline .'" data-project_location="'. $projects->project_location .'" data-approve_budget_cost="'. $projects->approve_budget_cost .'" class="editRecord btn btn-success" role="button">Update</a>';
                               
                                    if($total_num_of_bids == 0){
                                        $table_data .= '
                                            <a href="javascript:void(0);" class="btn btn-danger deleteRecord" data-projects_id="'.$projects->projects_id.'">Delete</a>
                                        </td></tr>';
                                    }
                                }
                        
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

        $sql2='SELECT * FROM users
        where user_type ="BIDDER"'; 

        $query2 = $this->db->query($sql2);
        foreach ($query2->result() as $res)
        {
            $notification_data = array( 
                'users_user_id' => $res->user_id, 
                'description' => 'New Project Created', 
                'status' => 0
            ); 
            $this->db->insert('notification', $notification_data);
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
        $project_location 	= $this->input->post('project_location');
        $approve_budget_cost 	= str_replace(',', '', $this->input->post('approve_budget_cost'));
        // $projects_status 	= $this->input->post('projects_status');

        
        $this->db->set('projects_description', $projects_description);
        $this->db->set('projects_type', $projects_type);
        $this->db->set('opening_date', $opening_date);
        $this->db->set('submission_deadline', $submission_deadline);
        $this->db->set('project_location', $project_location);
        
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