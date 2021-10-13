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
            
                foreach ($query->result() as $bids)
                {
                    $projects_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$bids->projects_description.'</td>
                    <td>'.$bids->projects_type.'</td>
                    <td>'.$bids->submission_deadline.'</td>
                    <td>'.$bids->opening_date.'</td>
                    <td> ₱'.number_format($bids->approve_budget_cost).'</td>
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
        $sql='  SELECT bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank, bids.status, bids.created_on, users.companyname FROM bids
        left join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        ORDER BY bid_price ASC'; 


        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $bids)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td>'.$bids->companyname.'</td>
                    <td>₱'.number_format($bids->bid_price).'</td>
                    <td>'.date("m/d/Y - H:m", strtotime($bids->created_on)).'</td>';

                        $session_user_id = $this->session->userdata("user_id");

                        $sql2 ='  SELECT * FROM evaluators
                        where users_user_id = "'.$session_user_id.'"
                        and bids_bids_id="'.$bids->bids_id.'"'; 

                        $query2 = $this->db->query($sql2);

                        $evaluators = $query2->row();

                        if(empty($query2->result())){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">EVALUATE BIDDER</a></td>';
                        }
                        else{
                            if($evaluators->status == '1' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">TECHNICAL EVALUATION</a></td>';
                            }
                            
                            if($evaluators->status == '2' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                            }
                            if($evaluators->status == '4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' ){
                                $table_data .= '<td><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
                            }
                        }


                }

        echo $table_data;
        
       
        die;
    }

    public function qualified_bids_show($id) 
    {
        $sql='  SELECT bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank, bids.status, bids.created_on, users.companyname FROM bids
        left join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        and bids.status != 0
        ORDER BY bid_price ASC'; 


        $query = $this->db->query($sql);

        $table_data ="";
                $rank = 1;
                foreach ($query->result() as $bids)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                    <td>'.$bids->companyname.'</td>
                    <td>'.$rank++.'</td> 
                    <td>₱'.number_format($bids->bid_price).'</td>';

                        $session_user_id = $this->session->userdata("user_id");

                        $sql2 ='  SELECT * FROM evaluators
                        where users_user_id = "'.$session_user_id.'"
                        and bids_bids_id="'.$bids->bids_id.'"'; 

                        $query2 = $this->db->query($sql2);

                        $evaluators = $query2->row();

                        if(empty($query2->result())){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">EVALUATE BIDDER</a></td>';
                        }
                        else{

                            if($evaluators->status == '1' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">TECHNICAL EVALUATION</a></td>';
                            }
                            
                            if($evaluators->status == '2' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                            }
                            if($evaluators->status == '4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' ){
                                $table_data .= '<td><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
                            }
                        }


                }

        echo $table_data;
        
       
        die;
    }
    public function disqualified_bids_show($id) 
    {
        $sql='  SELECT bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank, bids.status, bids.created_on, users.companyname FROM bids
        left join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        and bids.status = 0'; 


        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $bids)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                    <td>'.$bids->companyname.'</td>              
                    <td>₱'.number_format($bids->bid_price).'</td>';

                        $session_user_id = $this->session->userdata("user_id");

                        $sql2 ='  SELECT * FROM evaluators
                        where users_user_id = "'.$session_user_id.'"
                        and bids_bids_id="'.$bids->bids_id.'"'; 

                        $query2 = $this->db->query($sql2);

                        $evaluators = $query2->row();

                        if(empty($query2->result())){
                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">EVALUATE BIDDER</a></td>';
                        }
                        else{

                            if($evaluators->status == '1' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">TECHNICAL EVALUATION</a></td>';
                            }
                            
                            if($evaluators->status == '2' ){
                                $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                            }
                            if($evaluators->status == '4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' ){
                                $table_data .= '<td><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
                            }
                        }


                }

        echo $table_data;
        
       
        die;
    }

    public function check_if_lowest_calculated_bid() 
    {

        $session_projects_id = $this->session->userdata("projects_id");

        $sql ='  SELECT * FROM bids
        where projects_projects_id = "'.$session_projects_id.'"'; 

        $query = $this->db->query($sql);
        foreach ($query->result() as $bids){

            $sql2 ='  SELECT * FROM evaluators
            where  bids_bids_id="'.$bids->bids_id.'"'; 

            $query2 = $this->db->query($sql2);

            $evaluation_passed = true;
            $evaluated_count = 1;

            foreach ($query2->result() as $res){

                if($res->status == 3){
                   $evaluated_count++;
                }
                else{
                    $evaluation_passed = false;
                    $evaluated_count = 0;
                    break;
                }
            }
            echo $evaluated_count;
            if($evaluated_count >= 3){
                $this->db->set('status',4);
                $this->db->where('bids_id', $bids->bids_id);
                $this->db->update('bids');
            }
        }
    }

    public function lowest_calculated_bid($id) 
    {
        $sql='  SELECT bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank, bids.status, bids.created_on, users.companyname FROM bids
        left join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        and bids.status = 4'; 


        $query = $this->db->query($sql);
        $bids = $query->row();

        if(!empty($query->result())){
            $table_data ="";

            $table_data .='
                <div id="lowest_bid" class="portlet box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Bidder With Lowest Calculated Bid
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Email">Company Name</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Bid Price</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Action</th>
                                </tr>
                            </thead>
                            <tbody class="lcb_data" >';
                                $rank = 1;

                                $table_data .= '<tr class="gradeX odd" role="row">
                                <td>'.$bids->companyname.'</td>
                                <td>₱'.number_format($bids->bid_price).'</td>';

                                    $session_user_id = $this->session->userdata("user_id");

                                    $sql2 ='  SELECT * FROM evaluators
                                    where users_user_id = "'.$session_user_id.'"
                                    and bids_bids_id="'.$bids->bids_id.'"'; 

                                    $query2 = $this->db->query($sql2);

                                    $evaluators = $query2->row();

                                    if(empty($query2->result())){
                                        $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">EVALUATE BIDDER</a></td>';
                                    }
                                    else{
                                        if($evaluators->status == '3' ){
                                            $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/post_qualification").'/'.$bids->bids_id.'">POST QUALIFICATION</a></td>';
                                        }
                                        if($evaluators->status == '4' ){
                                            $table_data .= '<td><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
                                        }
                                    }
                    $table_data .='
                            </tbody>
                        </table>
                    </div>
                </div>';

            echo $table_data;
            die;
        }
    }

    


    public function evaluate_bidder($id) 
    {
        // add session_projects_id to session
        $session_projects_id = $this->session->userdata("projects_id");

        $this->session->set_userdata("session_bids_id", "$id");

        $this->load->view('BAC/bid-opening/evaluate_bidder_view');
    }
    

    public function financial_evaluation($id) 
    {

         // add session_bidder_id to session
        //  $this->session->set_userdata("session_bidder_id", "$id");
        $this->session->set_userdata("session_bids_id", "$id");

         $this->load->view('BAC/bid-opening/financial_evaluation_view');
    }
    public function post_qualification($id) 
    {
        // add session_projects_id to session
        $session_projects_id = $this->session->userdata("projects_id");

        $this->session->set_userdata("session_bids_id", "$id");

        $this->load->view('BAC/bid-opening/post_qualification_view');
    }

    public function technical_checklist_show($id) 
    {
        // $session_projects_id = $this->session->userdata("projects_id");
        
        $sql='SELECT * FROM bid_technical_documents
            where bids_bids_id = "'.$id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";
        
                $index = 1;
                $id = 1;
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                    <tr class="gradeX odd" role="row">
                    
                    <td class="sorting_1">'.$technical_documents->description.'</td>
                    <td><a class="btn img_button" href="javascript:void(0)"  data-description="'.$technical_documents->description.'" data-link='.base_url().''.$technical_documents->file_path.' >CLICK TO VIEW</a></td>
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

        $sql='SELECT * FROM financial_documents
            where bids_bids_id = "'.$id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
        
                $index = 1;
                $id = 1;
                foreach ($query->result() as $financial_documents)
                {
                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$financial_documents->description.'</td>
                  
                    </iframe>
                    <td><a class="btn img_button" data-description="'.$financial_documents->description.'" data-link='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
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
        $session_user_id = $this->session->userdata("user_id");
        $session_bids_id = $this->session->userdata("session_bids_id");

        $sql='SELECT * FROM evaluators
        where users_user_id = "'.$session_user_id.'"
        and bids_bids_id = "'.$session_bids_id.'"'; 

        $query = $this->db->query($sql);
       

        if(empty($query->result())){
            $evaluator_data = array(		
                'bids_bids_id' 	=>  $session_bids_id, 
                'users_user_id' =>  $session_user_id ,
                'status' => 2
            );

            $this->db->insert('evaluators',$evaluator_data);
            $insert_id = $this->db->insert_id();
        }
        

        $finding_result = true;
        foreach($this->input->post() as $data){

            $findings_val = $this->input->post('radio'.$i);
            $tech_docs_id = $this->input->post('id'.$i);

            $evaluation_data = array(		
                'findings' 	=>  $findings_val , 
                'bid_technical_documents_bid_technical_documents_id ' => $tech_docs_id, 
                'evaluators_evaluators_id' =>  $insert_id
            );

            if(!empty($tech_docs_id))
            {
                $this->db->insert('technical_evaluation',$evaluation_data);
            }

            if($findings_val == '0'){
                $finding_result = false;
            }
           $i++;
        }
        if($finding_result == false){
            $this->db->set('status',-1);
            $this->db->where('users_user_id', $session_user_id);
            $this->db->where('bids_bids_id', $session_bids_id);
            $this->db->update('evaluators');

            $this->db->set('status',0);
            $this->db->where('bids_id', $session_bids_id);
            $this->db->update('bids');
            print json_encode(array("status"=>"fail","message"=>"fail"));
        }
        else{
            $this->session->set_userdata("session_bids_id", "$session_bids_id");
            
            print json_encode(array("status"=>"success","message"=>"success"));
        }
    }

    public function insert_financial_findings() 
    {
    
        $i = 1;
        $session_user_id = $this->session->userdata("user_id");
        $session_bids_id = $this->session->userdata("session_bids_id");

        $finding_result = true;


        $sql='SELECT * FROM evaluators
        where users_user_id = "'.$session_user_id.'"
        and bids_bids_id = "'.$session_bids_id.'"'; 

        $query = $this->db->query($sql);
        $evaluators = $query->row();

        foreach($this->input->post() as $data){

            $findings_val = $this->input->post('radio'.$i);
            $financial_docs_id = $this->input->post('id'.$i);

            $evaluation_data = array(		
                'findings' 	=>  $findings_val , 
                'financial_documents_financial_documents_id' => $financial_docs_id, 
                'evaluators_evaluators_id' =>  $evaluators->evaluators_id
            );

            if(!empty($financial_docs_id))
            {
                $this->db->insert('financial_evaluation',$evaluation_data);
            }

            if($findings_val == '0'){
                $finding_result = false;
            }
           $i++;
        }
        if($finding_result == false){
            $this->db->set('status',0);
            $this->db->where('bids_id', $session_bids_id);
            $this->db->update('bids');

            $this->db->set('status',-2);
            print json_encode(array("status"=>"fail","message"=>"fail"));
        }
        else{
            $this->db->set('status',3);
            print json_encode(array("status"=>"success","message"=>"success"));
        }

        $this->db->where('users_user_id', $session_user_id);
        $this->db->where('bids_bids_id', $session_bids_id);
        $this->db->update('evaluators');
    }




    public function insert_post_qualification_findings() 
    {
    
        $i = 1;
        $session_user_id = $this->session->userdata("user_id");
        $session_bids_id = $this->session->userdata("session_bids_id");

        $sql='SELECT * FROM evaluators
        where users_user_id = "'.$session_user_id.'"
        and bids_bids_id = "'.$session_bids_id.'"'; 

        $query = $this->db->query($sql);
        $evaluators = $query->row();

        $finding_result = true;
        foreach($this->input->post() as $data){

            $findings_val = $this->input->post('radio'.$i);
            $tech_docs_id = $this->input->post('id'.$i);

            $evaluation_data = array(		
                'findings' 	=>  $findings_val , 
                'bid_technical_documents_bid_technical_documents_id ' => $tech_docs_id, 
                'evaluators_evaluators_id' =>  $evaluators->evaluators_id
            );

            if(!empty($tech_docs_id))
            {
                $this->db->insert('post_qualification',$evaluation_data);
            }

            if($findings_val == '0'){
                $finding_result = false;
            }
           $i++;
        }
        if($finding_result == false){
            $this->db->set('status',-4);
            $this->db->where('bids_id', $session_bids_id);
            $this->db->update('bids');

            $this->db->set('status',-4);
            print json_encode(array("status"=>"fail","message"=>"fail"));
        }
        else{
            $this->db->set('status',4);
            $this->session->set_userdata("session_bids_id", "$session_bids_id");
            
            print json_encode(array("status"=>"success","message"=>"success"));
        }
        $this->db->where('users_user_id', $session_user_id);
        $this->db->where('bids_bids_id', $session_bids_id);
        $this->db->update('evaluators');
    }
    
    public function evaluation_result($id) 
    {
        $this->session->set_userdata("session_bids_id", "$id");
        $this->load->view('BAC/bid-opening/evaluation_result_view');
     
    }
    public function evaluation_result_evaluator_show($id) 
    {
        $sql='  SELECT evaluators.evaluators_id, evaluators.status, bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank,  bids.created_on, users.user_type, users.firstname, users.lastname FROM evaluators
        inner join users on evaluators.users_user_id = users.user_id
        inner join bids on evaluators.bids_bids_id = bids.bids_id
        where bids_bids_id = "'.$id.'" '; 


        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $evaluators)
                {
                        $table_data .= '<tr class="gradeX odd" role="row">                    
                        <td class="sorting_1">'.$start++.'</td>
                        <td>'.$evaluators->firstname.' '.$evaluators->lastname.'</td>
                        <td>'.$evaluators->user_type.'</td>
                        <td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/technical_evaluation_result").'/'.$evaluators->evaluators_id.'">TECHNICAL EVALUATION RESULT</a>';

                        // echo '<script>console.log('.$evaluators->status.');</script>';
                        if($evaluators->status == '3' ){
                            $table_data .= '<a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation_result").'/'.$evaluators->evaluators_id.'">FINANCIAL EVALUATION RESULT</a></td>';
                        }
                        if($evaluators->status == '4' ){
                            $table_data .= '<a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation_result").'/'.$evaluators->evaluators_id.'">FINANCIAL EVALUATION RESULT</a>
                                            <a class="btn evaluate-button"type="button" href="'.base_url("bidopening/post_qualification_evaluation_result").'/'.$evaluators->evaluators_id.'">POST QUALIFICATION RESULT</a></td>';
                        }

                }

        echo $table_data;
        die;
    }

    public function technical_evaluation_result($id) 
    {
        $this->session->set_userdata("session_evaluators_id", "$id");

        $this->load->view('BAC/bid-opening/technical_evaluation_result_view');
    }
    public function technical_evaluation_result_show($id) 
    {
        $session_evaluators_id = $this->session->userdata("session_evaluators_id");
        
        $sql='SELECT bid_technical_documents.bids_bids_id ,bid_technical_documents.bid_technical_documents_id , bid_technical_documents.description,bid_technical_documents.file_path , technical_evaluation.findings 
            FROM technical_evaluation
            inner join bid_technical_documents on technical_evaluation.bid_technical_documents_bid_technical_documents_id = bid_technical_documents.bid_technical_documents_id
            inner join evaluators on technical_evaluation.evaluators_evaluators_id = evaluators.evaluators_id
            where evaluators_id = "'.$session_evaluators_id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";

                $index = 1;
                $id = 1;
                foreach ($query->result() as $technical_documents)
                {
                    $findings = $technical_documents->findings;
                   

                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$technical_documents->description.'</td>
                    <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>';
                    if($findings == 1){
                        $table_data .= '<td class="passed">Passed</td>';
                    }
                    else{
                        $table_data .= '<td class="failed">Failed</td>';
                    }

                    
                    
                    $id++;
                    $index++;
                }

        echo $table_data;
        die;
    }
    public function post_qualification_evaluation_result($id) 
    {
        $this->session->set_userdata("session_evaluators_id", "$id");

        $this->load->view('BAC/bid-opening/post_qualification_evaluation_result_view');
    }
    public function post_qualification_evaluation_result_show($id) 
    {
        $session_evaluators_id = $this->session->userdata("session_evaluators_id");
        
        $sql='SELECT bid_technical_documents.bids_bids_id ,bid_technical_documents.bid_technical_documents_id , bid_technical_documents.description,bid_technical_documents.file_path , post_qualification.findings 
            FROM post_qualification
            inner join bid_technical_documents on post_qualification.bid_technical_documents_bid_technical_documents_id = bid_technical_documents.bid_technical_documents_id
            inner join evaluators on post_qualification.evaluators_evaluators_id = evaluators.evaluators_id
            where evaluators_id = "'.$session_evaluators_id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";

                $index = 1;
                $id = 1;
                foreach ($query->result() as $technical_documents)
                {
                    $findings = $technical_documents->findings;
                   

                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$technical_documents->description.'</td>
                    <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>';
                    if($findings == 1){
                        $table_data .= '<td class="passed">Passed</td>';
                    }
                    else{
                        $table_data .= '<td class="failed">Failed</td>';
                    }

                    
                    
                    $id++;
                    $index++;
                }

        echo $table_data;
        die;
    }
    public function financial_evaluation_result($id) 
    {
        $this->session->set_userdata("session_evaluators_id", "$id");

        $this->load->view('BAC/bid-opening/financial_evaluation_result_view');
    }
    public function financial_evaluation_result_show($id) 
    {
        $session_evaluators_id = $this->session->userdata("session_evaluators_id");
        
        $sql='SELECT financial_documents.bids_bids_id ,financial_documents.financial_documents_id , financial_documents.description,financial_documents.file_path , financial_evaluation.findings 
            FROM financial_evaluation
            inner join financial_documents on financial_evaluation.financial_documents_financial_documents_id = financial_documents.financial_documents_id
            inner join evaluators on financial_evaluation.evaluators_evaluators_id = evaluators.evaluators_id
            where evaluators_id = "'.$session_evaluators_id.'" '; 

        $query = $this->db->query($sql);

        $table_data ="";

                $index = 1;
                $id = 1;
                foreach ($query->result() as $financial_documents)
                {
                    $findings = $financial_documents->findings;
                   

                    $table_data .= '<tr class="gradeX odd" role="row">
                                    
                    <td class="sorting_1">'.$financial_documents->description.'</td>
                    <td><a class="btn img_button"href='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>';
                    if($findings == 1){
                        $table_data .= '<td class="passed">Passed</td>';
                    }
                    else{
                        $table_data .= '<td class="failed">Failed</td>';
                    }

                    
                    
                    $id++;
                    $index++;
                }

        echo $table_data;
        die;
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