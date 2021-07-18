<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BidOpeningController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
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

        // add projects_id to session
        $this->session->set_userdata("projects_id", "$id");

        $sql='Select * from project_openers
                inner join users on project_openers.users_user_id = users.user_id
                and projects_projects_id = "'.$id.'" ';

        
        $query = $this->db->query($sql);
      
        $data = array(
            'users_bid_opener' => $query->result(),
            'session_user_id'=>   $this->session->userdata('user_id')
        );


        

        $this->load->view('BAC/bid-opening/bid_openers_view', $data);
     
    }

    public function show_project_details() 
    {
        $session_projects_id = $this->session->userdata("projects_id");
        

        $sql='  SELECT * FROM projects
        where projects_id = "'.$session_projects_id.'" '; 

        $query = $this->db->query($sql);

        $projects_data ="";
            
                $start = 1;
                foreach ($query->result() as $bids)
                {
                    $projects_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$bids->projects_description.'</td>
                    <td>'.$bids->projects_type.'</td>
                    <td>'.$bids->submission_deadline.'</td>
                    <td>'.$bids->opening_date.'</td>
                    <td>'.$bids->approve_budget_cost.'</td>
                    ';
                }

        echo $projects_data;
    }

    public function bids_opened($id) 
    {

        $this->load->view('BAC/bid-opening/bids_open_view');
     
    }

    public function bids_show($id) 
    {
        $sql='  SELECT * FROM bids
        inner join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $bids)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$bids->companyname.'</td>
                    <td>₱'.$bids->bid_price.'</td>
                    <td>'.date("m/d/Y - H:m", strtotime($bids->created_on)).'</td>
                    
                    <td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->user_id.'">EVALUATE BIDDER</a></td>
                    ';
                }

        echo $table_data;
        
       
        die;
    }

    public function evaluate_bidder($id) 
    {

        $this->load->view('BAC/bid-opening/evaluate_bidder_view');
    }

    public function bidder_show($id) 
    {

        $sql='  SELECT * FROM bids
            inner join users on bids.users_user_id = users.user_id
            where projects_projects_id = "'.$id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $bids)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$bids->companyname.'</td>
                    <td>'.date("m/d/Y - H:m", strtotime($bids->created_on)).'</td>
                    ';
                }

        echo $table_data;
        die;
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
            
            $openers_data .=    '<div style="text-align: center; margin-top: 20px;"><a href="'.base_url("bidopening/bids_opened").'/'.$id.'" class="btn continue">CONTINUE</a></div>';
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