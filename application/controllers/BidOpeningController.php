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
    public function evaluation_result($id) 
    {
    
        $this->load->view('BAC/bid-opening/evaluation_result_view');
     
    }
    public function evaluation_result_bids_show($id) 
    {
        $sql='  SELECT * FROM bids
        inner join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        order by bid_price'; 


        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $bids)
                {

                    $sql2 ='  SELECT findings FROM bid_technical_documents
                    where projects_projects_id = "'.$id.'" 
                    and users_user_id = "'.$bids->user_id.'" '; 
                    $query2 = $this->db->query($sql2);

                    $sql3 ='  SELECT findings FROM financial_documents
                    where projects_projects_id = "'.$id.'" 
                    and users_user_id = "'.$bids->user_id.'" '; 
                    $query3 = $this->db->query($sql3);

                    $tech_findings = true;
                    $financial_findings = true;

                    foreach ($query2->result() as $tech_docs){
                        if($tech_docs->findings == '0' ){
                            $tech_findings = false;
                            break;
                        }
                    }
                    foreach ($query3->result() as $financial_docs){
                        if($financial_docs->findings == '0' ){
                            $financial_findings = false;
                            break;
                        }
                    }

                    if($tech_findings == true & $financial_findings == true){
                        $table_data .= '<tr class="gradeX odd" role="row">                    
                        <td class="sorting_1">'.$start++.'</td>
                        <td>'.$bids->companyname.'</td>
                        <td>₱'.$bids->bid_price.'</td>
                        <td>'.date("m/d/Y - H:m", strtotime($bids->created_on)).'</td>
                        <td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->user_id.'">VIEW EVALUATION RESULT</a></td>';
                    }

                }

        echo $table_data;
        
       
        die;
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
                    <td>'.date("m/d/Y - H:m", strtotime($bids->created_on)).'</td>';

                        $sql2 ='  SELECT findings FROM bid_technical_documents
                        where projects_projects_id = "'.$id.'" 
                        and users_user_id = "'.$bids->user_id.'" '; 
                        $query2 = $this->db->query($sql2);

                        $sql3 ='  SELECT findings FROM financial_documents
                        where projects_projects_id = "'.$id.'" 
                        and users_user_id = "'.$bids->user_id.'" '; 
                        $query3 = $this->db->query($sql3);

                        $tech_findings = false;
                        $financial_findings = false;
                        $tech_findings_result = true;

                        foreach ($query2->result() as $tech_docs){
                            if($tech_docs->findings == '1' ){
                                $tech_findings = true;
                                break;
                            }
                            else{
                                $tech_findings_result = false;
                            }
                        }
                        foreach ($query3->result() as $financial_docs){
                            if($financial_docs->findings == '1' ){
                                $financial_findings = true;
                                break;
                            }
                        }

                        if($tech_findings == true & $financial_findings == true){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->user_id.'">VIEW RESULT</a></td>';
                        }
                        else if($tech_findings_result == true & $financial_findings == false){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->user_id.'">FINANCIAL EVALUATION</a></td>';
                        }
                        else if($tech_findings_result == false){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->user_id.'">TECHNICAL EVALUATION RESULT</a></td>';
                        }
                        else{
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->user_id.'">EVALUATE BIDDER</a></td>';
                        }
                }

        echo $table_data;
        
       
        die;
    }

    public function evaluate_bidder($id) 
    {
        // add session_bidder_id to session
        $this->session->set_userdata("session_bidder_id", "$id");

        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM bid_technical_documents
            where users_user_id = "'.$id.'" 
            and projects_projects_id = "'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $data = array(
            'technical_docs_data' => $query->result(),
        );

        $this->load->view('BAC/bid-opening/evaluate_bidder_view',$data);
    }

    public function financial_evaluation($id) 
    {

         // add session_bidder_id to session
         $this->session->set_userdata("session_bidder_id", "$id");

         $session_projects_id = $this->session->userdata("projects_id");
 
         $sql='SELECT * FROM financial_documents
             where users_user_id = "'.$id.'" 
             and projects_projects_id = "'.$session_projects_id.'"'; 
 
         $query = $this->db->query($sql);
 
         $data = array(
             'financial_docs_data' => $query->result(),
         );
 
         $this->load->view('BAC/bid-opening/financial_evaluation_view',$data);
    }

    public function technical_checklist_show($id) 
    {
        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM bid_technical_documents
            where users_user_id = "'.$id.'"
            and projects_projects_id = "'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
                $index = 1;
                $id = 1;
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$technical_documents->description.'</td>
                    <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                    <td>
                        <div class="check-button">
                            <input id="radio'.$id.'" class="radio-custom" name="radio'.$index.'"  data-d_id="'.$technical_documents->bid_technical_documents_id.'" type="radio" value="1" required>
                            <label for="radio'.$id.'" class="radio-custom-label">PASS</label>
                        </div>
                        <div class="check-button">
                            <input id="radio'.++$id.'" class="radio-custom" name="radio'.$index.'" data-d_id="'.$technical_documents->bid_technical_documents_id.'" type="radio" value="0">
                            <label for="radio'.$id.'" class="radio-custom-label">FAIL</label>
                        </div>
                        <input  name="id'.$index.'" data-d_id="'.$technical_documents->bid_technical_documents_id.'" type="hidden" value="'.$technical_documents->bid_technical_documents_id.'">
                    </td>
                    ';
                    $id++;
                    $index++;
                }

        echo $table_data;
        die;
    }
    public function financial_checklist_show($id) 
    {
        $session_projects_id = $this->session->userdata("projects_id");

        $sql='SELECT * FROM financial_documents
            where users_user_id = "'.$id.'"
            and projects_projects_id = "'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
                $index = 1;
                $id = 1;
                foreach ($query->result() as $financial_documents)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$financial_documents->description.'</td>
                    <td><a class="btn img_button" data-url='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                    <td>
                        <div class="check-button">
                            <input id="radio'.$id.'" class="radio-custom" name="radio'.$index.'"  data-d_id="'.$financial_documents->financial_documents_id.'" type="radio" value="1" required>
                            <label for="radio'.$id.'" class="radio-custom-label">PASS</label>
                        </div>
                        <div class="check-button">
                            <input id="radio'.++$id.'" class="radio-custom" name="radio'.$index.'" data-d_id="'.$financial_documents->financial_documents_id.'" type="radio" value="0">
                            <label for="radio'.$id.'" class="radio-custom-label">FAIL</label>
                        </div>
                        <input  name="id'.$index.'" data-d_id="'.$financial_documents->financial_documents_id.'" type="hidden" value="'.$financial_documents->financial_documents_id.'">
                    </td>
                    ';
                    $id++;
                    $index++;
                }

        echo $table_data;
        die;
    }

    public function insert_technical_findings() 
    {
    
        $i = 1;

        $finding_result = true;
        foreach($this->input->post() as $data){

            $findings_val = $this->input->post('radio'.$i);
            $tech_docs_id = $this->input->post('id'.$i);

            $this->db->set('findings',$findings_val);
            $this->db->where('bid_technical_documents_id', $tech_docs_id);

            $this->db->update('bid_technical_documents');


            if($findings_val == '0'){
                $finding_result = false;
            }
           $i++;
        }
        if($finding_result == false){
            print json_encode(array("status"=>"fail","message"=>"fail"));
        }
        else{
            print json_encode(array("status"=>"success","message"=>"success"));
        }
    }

    public function insert_financial_findings() 
    {
    
        $i = 1;

        $finding_result = true;
        foreach($this->input->post() as $data){

            $findings_val = $this->input->post('radio'.$i);
            $financial_docs_id = $this->input->post('id'.$i);

            $this->db->set('findings',$findings_val);
            $this->db->where('financial_documents_id', $financial_docs_id);

            $this->db->update('financial_documents');

            if($findings_val == '0'){
                $finding_result = false;
            }
           $i++;
        }
        if($finding_result == false){
            print json_encode(array("status"=>"fail","message"=>"fail"));
        }
        else{
            print json_encode(array("status"=>"success","message"=>"success"));
        }
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