<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BidOpeningController extends CI_Controller
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

        $sql="select * from projects where delete_status != 1"; 
        $query = $this->db->query($sql);

        if($query){
            $data = array(
                'projects_data' => $query->result(),
                'session_user_id'=>   $this->session->userdata('user_id')
            );
        }
        
        $this->load->view('BAC/bid-opening/projects_view', $data);
        
    }
    

    public function bid_openers($id) 
    {
        $row = $this->db->query('select * from projects where projects_id = "'.$id.'"  ')->row();
        
        $sql='Select * from project_openers
                inner join users on project_openers.users_user_id = users.user_id
                and projects_projects_id = "'.$id.'" ';

        
        $query = $this->db->query($sql);
        // $query2 = $this->db->query($sql2);
      
        if ($row) {
            $data = array(
                'users_bid_opener' => $query->result(),

                'projects_id' => $row->projects_id,
                'projects_description' => $row->projects_description,
                'projects_type' => $row->projects_type,
                'opening_date' => $row->opening_date,
                'approve_budget_cost' => $row->approve_budget_cost,
                'projects_status' => $row->projects_status,
                
                'session_user_id'=>   $this->session->userdata('user_id')
            );

            $this->load->view('BAC/bid-opening/bid_openers_view', $data);
     
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bidopening'));
        }
    }

    public function bid_openers_ajax_show($id) 
    {

        $sql='Select * from project_openers
                inner join users on project_openers.users_user_id = users.user_id
                where projects_projects_id = "'.$id.'" ';

        $sql2='SELECT * FROM bims_db.project_openers
                where projects_projects_id  = "'.$id.'"
                and decrypt_status ="1"';
                
        
        $query = $this->db->query($sql);
        $query2 = $this->db->query($sql2);
      
        $openers_data = '<form class="form-horizontal contact-form" id="decryptForm" method="post"> ';
                foreach($query->result() as $openers){
                    $openers_data .= '
                                    <div class="userbox">
                                        <div class="">
                                            <div class="portlet-body bid-opener-box-body">
                                                <img class="profile" src="'.base_url().'assets/images/profile.svg" alt="Picture of Vivian Williams">';
                                                

                                                if($openers->decrypt_status === "1"){
                    $openers_data .=                '<div class="circle decript_unlock" id="'.$openers->user_id.'"></div>';
                                                }
                                                else{
                    $openers_data .=                '<div class="circle decript_lock" id="'.$openers->user_id.'"></div>';
                                                }
                                                
                    $openers_data .=            '<div class="u_name">
                                                    <h4 style="text-align: center; font-weight: 500; text-transform: capitalize;">'.$openers->firstname.' '.$openers->lastname.'</h4>
                                                </div>';
                                            
                                                if($openers->user_id == $this->session->userdata('user_id')){

                    $openers_data .=                '<div class="form-actions">
                                                        <input id="project_openers_id" style="margin: 10px 0;" type="hidden" value="'.$openers->project_openers_id.'">
                                                        <input id="project_id" style="margin: 10px 0;" type="hidden" value="'.$id.'">
                                                        <input id="opener_id" style="margin: 10px 0;" type="hidden" value="'.$this->session->userdata('user_id').'">';
                                                        if($openers->decrypt_status !== "1"){
                    $openers_data .=                        ' <button class="decrypt decrypt_user btn btn-primary" style="margin: 10px 0;"><i class="refresh_icon"></i>DECRYPT</button>';
                                                        }
                    $openers_data .=                '</div>';
                                                }
                    $openers_data .=        '</div>
                                        </div>
                                    </div>';
                }
            $openers_data .=    '</form>';

            if ( $query2->num_rows() == 2){
                $openers_data .=    '<div style="text-align: center; margin-top: 20px;"><a class="btn continue">CONTINUE</a></div>';
            }
        echo $openers_data;
        die;

    }

    

    public function decrypt_project() 
    {
			
        $decrypt_status = $this->input->post('decrypt_status');
        $project_openers_id  = $this->input->post('project_openers_id');

        $this->db->where('project_openers_id ', $project_openers_id );

        $this->db->set('decrypt_status', $decrypt_status);

        $this->db->update('project_openers');

    }



    public function check_opener_decrypt_project_status() 
    {

        $sql="Select * from project_openers where users_users_id='1' ";    
        $query = $this->db->query($sql);

    }

  
}