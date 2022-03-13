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
        if($this->session->userdata('type') == 'BIDDER'){
            redirect('loginregister');
        }
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
        ORDER BY bid_price DESC'; 
        $session_user_id = $this->session->userdata("user_id");

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $bids)
                {
                    $sql2 ='  SELECT * FROM evaluators
                    where users_user_id = "'.$session_user_id.'"
                    and bids_bids_id="'.$bids->bids_id.'"'; 

                    $query2 = $this->db->query($sql2);

                    $evaluators = $query2->row();

                    if(empty($query2->result())){
                        $table_data .= '<tr class="gradeX odd" role="row">
                                        
                        <td>'.$bids->companyname.'</td>
                        <td>₱'.number_format($bids->bid_price).'</td>
                        <td>'.date("Y/m/d - H:m", strtotime($bids->created_on)).'</td>';
                        $table_data .= '<td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">EVALUATE BIDDER</a></td>';
                    }
                        // else{
                        //     if($evaluators->status == '1' ){
                        //         $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">TECHNICAL EVALUATION</a></td>';
                        //     }
                            
                        //     if($evaluators->status == '2' ){
                        //         $table_data .= '<td><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                        //     }
                        //     if($evaluators->status == '4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' ){
                        //         $table_data .= '<td><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
                        //     }
                        // }


                }

        echo $table_data;
        
       
        die;
    }

    public function qualified_bids_show($id) 
    {
        $session_user_id = $this->session->userdata("user_id");

        $sql='  SELECT bids.bids_id, bids.users_user_id, bids.bid_price, bids.rank, bids.status, bids.created_on, users.companyname FROM bids
        left join users on bids.users_user_id = users.user_id
        where projects_projects_id = "'.$id.'" 
        and bids.status != 0
        ORDER BY bid_price DESC'; 
        $query = $this->db->query($sql);
    
        $table_data ="";
                $rank = 1;
                foreach ($query->result() as $bids)
                {

                    $sql2 ='  SELECT * FROM evaluators
                    where users_user_id = "'.$session_user_id.'"
                    and bids_bids_id="'.$bids->bids_id.'"'; 

                    $query2 = $this->db->query($sql2);

                    $evaluators = $query2->row();
                    if(!empty($query2->result())){

                        $this->db->set('rank',$rank);
                        $this->db->where('bids_id', $bids->bids_id);
                        $this->db->update('bids');

                        $table_data .= '<tr class="gradeX odd" role="row">
                        <td>'.$bids->companyname.'</td>
                        <td>'.$rank++.'</td> 
                        <td>₱'.number_format($bids->bid_price).'</td>';

                            if($evaluators->status == '2' ){
                                $table_data .= '<td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                            }
                            if($evaluators->status == '4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' || $evaluators->status == '-4'){
                                $table_data .= '<td class="td_button"><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
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
        AND bids.status = 0'; 
        $session_user_id = $this->session->userdata("user_id");

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $bids)
                {

                    $sql2 ='  SELECT * FROM evaluators
                    where users_user_id = "'.$session_user_id.'"
                    and bids_bids_id="'.$bids->bids_id.'"'; 

                    $query2 = $this->db->query($sql2);

                    $evaluators = $query2->row();
                    if(!empty($query2->result())){
                        $table_data .= '<tr class="gradeX odd" role="row">
                        <td>'.$bids->companyname.'</td>              
                        <td>₱'.number_format($bids->bid_price).'</td>';
                            if($evaluators->status == '1' ){
                                $table_data .= '<td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/evaluate_bidder").'/'.$bids->bids_id.'">TECHNICAL EVALUATION</a></td>';
                            }
                            
                            if($evaluators->status == '2' ){
                                $table_data .= '<td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation").'/'.$bids->bids_id.'">FINANCIAL EVALUATION</a></td>';
                            }
                            if($evaluators->status == '-4' || $evaluators->status == '3' || $evaluators->status == '-1' || $evaluators->status == '-2' ){
                                $table_data .= '<td class="td_button"><a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a></td>';
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
            $evaluated_count = 0;
            $evaluated_count_faild = 0;

            foreach ($query2->result() as $res){

                if($res->status == 3){
                   $evaluated_count++;
                }
                else{
                    $evaluated_count_faild++;
                    break;
                }
            }
            echo $evaluated_count;
            if($evaluated_count >= 3 && $evaluated_count > $evaluated_count_faild){
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
        $session_user_id = $this->session->userdata("user_id");
        $session_user_type = $this->session->userdata("type");

        if(!empty($query->result())){
            $table_data ="";

            $sql2 ='  SELECT * FROM evaluators
            where users_user_id = "'.$session_user_id.'"
            and bids_bids_id="'.$bids->bids_id.'"'; 

            $query2 = $this->db->query($sql2);

            $evaluators = $query2->row();

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
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Rank</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">Bid Price</th>';
                                    if($session_user_type == 'HEAD-TWG'){
                                        $table_data .= '<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">View/Evaluate</th>';
                                    }
                                    if($session_user_type == 'HEAD-BAC' && $bids->status == '4' ){
                                        $table_data .= '<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Status">View</th>';
                                    }
                                $table_data .= '</tr>
                            </thead>
                            <tbody class="lcb_data" >';

                                $table_data .= '<tr class="gradeX odd" role="row">
                                <td>'.$bids->companyname.'</td>
                                <td>'.$bids->rank.'</td>
                                <td>₱'.number_format($bids->bid_price).'</td>';
                                
                                    if($session_user_type == 'HEAD-TWG'){
                                        if($evaluators->status == '3' ){
                                            $table_data .= '<td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/post_qualification").'/'.$bids->bids_id.'">POST QUALIFICATION</a></td>';
                                        }
                                        else if($evaluators->status == '4' ){
                                            $table_data .= '<td>
                                                <a class="btn evaluate-button button_green" type="button" href="'.base_url("bidopening/evaluation_result").'/'.$bids->bids_id.'">EVALUATION RESULTS</a>
                                                <a class="btn evaluate-button button_green" type="button" href="'.base_url("post_qualification_report").'/'.$bids->bids_id.'">REPORT</a>
                                            </td>';
                                        }
                                    }
                                    else if($session_user_type == 'HEAD-BAC' || $session_user_type == 'BAC-SECRETARIAT'  && $bids->status == '4' ){
                                        $table_data .= '<td class="td_button">
                                            <a class="btn evaluate-button button_green" type="button" href="'.base_url("post_qualification_report").'/'.$bids->bids_id.'">REPORT</a>
                                        </td>';
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

    
    public function get_post_qualification($id) 
    {
        $sql='SELECT * FROM post_qualification
        inner join evaluators on post_qualification.evaluators_evaluators_id = evaluators.evaluators_id
        where bids_bids_id = "'.$id.'"'; 


       $query = $this->db->query($sql);

       $docs1 = $docs2 = $docs3 =  $docs4 = $docs5 = $docs6 = $docs7 = $docs8 = $docs9 = $docs10 = $docs11 = $docs12 = $docs13 = $docs14 = $docs15 = $docs16 = $docs17 = $docs18 = $docs19 = $docs20 = $docs21 = $docs22 = $docs23 ='';
       $cons1 = $cons2 = $cons3 =  $cons4 = $cons5 = $cons6 = $cons7 = $cons8 = $cons9 = $cons10 = $cons11 = $cons12 = $cons13 = $cons14 = $cons15 = $cons16 = $cons17 = $cons18 = $cons19 = $cons20 = $cons21 = $cons22 = $cons23 ='';
        $findings_result = true;
       foreach($query->result() as $post_qua_docs){

            if($post_qua_docs->findings == '0'){
                $findings_result = false;
            }

           if($post_qua_docs->description == 'DTI Business Name Registration of SEC')
           {
              $docs1 = $post_qua_docs->findings;
              $cons1 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Business Permit')
           {
               $docs2 = $post_qua_docs->findings;
               $cons2 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Tax Identification')
           {
               $docs3 = $post_qua_docs->findings;
               $cons3 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Statement of Non-Blacklisted')
           {
               $docs4 = $post_qua_docs->findings;
               $cons4 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Certification of No-Relationship')
           {
               $docs5 = $post_qua_docs->findings;
               $cons5 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Valid joint venture agreement')
           {
               $docs6 = $post_qua_docs->findings;
               $cons6 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Authorizing BAC to verify statements')
           {
               $docs7 = $post_qua_docs->findings;
               $cons7 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'On-going and awarded contracts')
           {
               $docs8 = $post_qua_docs->findings;
               $cons8 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Completed similar contracts')
           {
               $docs9 = $post_qua_docs->findings;
               $cons9 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Copies of end-user’s acceptance letters for completed contracts')
           {
               $docs10 = $post_qua_docs->findings;
               $cons10 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Specification of whether or not the prospective bidder is a manufacturer, supplier or distributor')
           {
               $docs11 = $post_qua_docs->findings;
               $cons11 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Audited Financial statements')
           {
               $docs12 = $post_qua_docs->findings;
               $cons12 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'NFCC or credit line or cash deposit certificate')
           {
               $docs13 = $post_qua_docs->findings;
               $cons13 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Bid security')
           {
               $docs14 = $post_qua_docs->findings;
               $cons14 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Authority of signatory')
           {
               $docs15 = $post_qua_docs->findings;
               $cons15 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Production/Delivery Schedule')
           {
               $docs16 = $post_qua_docs->findings;
               $cons16 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Manpower Requirements')
           {
               $docs17 = $post_qua_docs->findings;
               $cons17 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'After-sales service/parts, if applicable')
           {
               $docs18 = $post_qua_docs->findings;
               $cons18 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Technical Specifications')
           {
               $docs19 = $post_qua_docs->findings;
               $cons19 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Commitment to extend a credit line or cash deposit equivalent to 10% of the ABC')
           {
               $docs20 = $post_qua_docs->findings;
               $cons20 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Certification of compliance with labor laws')
           {
               $docs21 = $post_qua_docs->findings;
               $cons21 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Bid Prices in Bill of Quantities')
           {
               $docs22 = $post_qua_docs->findings;
               $cons22 = $post_qua_docs->parties_consulted;
           }
           else if($post_qua_docs->description == 'Recurring and Maintenance Costs')
           {
               $docs23 = $post_qua_docs->findings;
               $cons23 = $post_qua_docs->parties_consulted;
           }
       }
       
       $data = array(
            'docs1' =>  $docs1 ,
            'docs2' =>  $docs2 ,
            'docs3' =>   $docs3 ,
            'docs4' =>  $docs4,
            'docs5' =>   $docs5 ,
            'docs6' =>  $docs6 ,
            'docs7' =>   $docs7,
            'docs8' =>  $docs8 ,
            'docs9' =>  $docs9 ,
            'docs10' =>  $docs10 ,
            'docs11' =>  $docs11,
            'docs12' =>   $docs12 ,
            'docs13' =>   $docs13,
            'docs14' =>   $docs14 ,
            'docs15' =>   $docs15,
            'docs16' =>    $docs16,
            'docs17' =>   $docs17,
            'docs18' =>   $docs18,
            'docs19' =>   $docs19,
            'docs20' =>  $docs20,
            'docs21' =>  $docs21,
            'docs22' =>  $docs22,
            'docs23' =>  $docs23,

            'cons1' =>  $cons1 ,
            'cons2' =>  $cons2 ,
            'cons3' =>   $cons3 ,
            'cons4' =>  $cons4,
            'cons5' =>   $cons5 ,
            'cons6' =>  $cons6 ,
            'cons7' =>   $cons7,
            'cons8' =>  $cons8 ,
            'cons9' =>  $cons9 ,
            'cons10' =>  $cons10 ,
            'cons11' =>  $cons11,
            'cons12' =>   $cons12 ,
            'cons13' =>   $cons13,
            'cons14' =>   $cons14 ,
            'cons15' =>   $cons15,
            'cons16' =>    $cons16,
            'cons17' =>   $cons17,
            'cons18' =>   $cons18,
            'cons19' =>   $cons19,
            'cons20' =>  $cons20,
            'cons21' =>  $cons21,
            'cons22' =>  $cons22,
            'cons23' =>  $cons23,

            'findings_result' => $findings_result,
       );

       return $data;
    }
    public function post_qualification($id) 
    {
        // add session_projects_id to session
        $session_projects_id = $this->session->userdata("projects_id");
        $this->session->set_userdata("session_bids_id", "$id");

        $data =  $this->get_post_qualification($id) ;

        $this->load->view('BAC/bid-opening/post_qualification_view', $data);
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
                    
                    <td class="sorting_1 description_name">'.$technical_documents->description.'</td>
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
                                    
                    <td class="sorting_1 description_name">'.$financial_documents->description.'</td>
                  
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

        // activity log starts here
        $sql2='select projects_description, bids_id, firstname, lastname from bids
            inner join users on bids.users_user_id = users.user_id
            inner join projects on bids.projects_projects_id= projects.projects_id
            where bids_id = "'.$session_bids_id.'" '; 

        $query2 = $this->db->query($sql2);
        $row = $query2->row();
        $activity_log_data = array( 
            'users_user_id' => $session_user_id, 
            'description' => "Evaluated the technical docs from bidder $row->firstname $row->lastname on the project ($row->projects_description)", 
        ); 

        $this->db->insert('activity_log', $activity_log_data);
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

         // activity log starts here
         $sql2='select projects_description, bids_id, firstname, lastname from bids
         inner join users on bids.users_user_id = users.user_id
         inner join projects on bids.projects_projects_id= projects.projects_id
         where bids_id = "'.$session_bids_id.'" '; 

        $query2 = $this->db->query($sql2);
        $row = $query2->row();
        $activity_log_data = array( 
            'users_user_id' => $session_user_id, 
            'description' => "Evaluated the financial docs from bidder $row->firstname $row->lastname on the project ($row->projects_description)", 
        ); 

        $this->db->insert('activity_log', $activity_log_data);
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

        $findings_val = $this->input->post('radio');

        $evaluation_data = array(		
            'findings' 	=>  $findings_val , 
            'description' => $this->input->post('description'), 
            'parties_consulted' => $this->input->post('parties_consulted'), 
            'evaluators_evaluators_id' =>  $evaluators->evaluators_id
        );


        $this->db->insert('post_qualification',$evaluation_data);

        $this->check_post_qualification_findings_result($evaluators->evaluators_id);

    }

    public function check_post_qualification_findings_result($evaluator_id) 
    {
    
        $session_user_id = $this->session->userdata("user_id");
        $session_bids_id = $this->session->userdata("session_bids_id");

        $sql='SELECT * FROM post_qualification
        where evaluators_evaluators_id = "'.$evaluator_id.'"'; 

        $query = $this->db->query($sql);

        $passCount = $query->num_rows();

        if($passCount == 23){
            $this->db->set('status',5);
            $this->db->where('bids_id',  $session_bids_id);
            $this->db->update('bids');
        }

    }

    

    public function submit_post_qualification_findings() 
    {
    
        $session_user_id = $this->session->userdata("user_id");
        $session_bids_id = $this->session->userdata("session_bids_id");

        $sql='SELECT * FROM post_qualification
            inner join evaluators on post_qualification.evaluators_evaluators_id = evaluators.evaluators_id
            where users_user_id = "'.$session_user_id.'"
            and bids_bids_id = "'.$session_bids_id.'"'; 

            $query = $this->db->query($sql);

            $finding_result = true;
            foreach ($query->result() as $post_qua_findings)
            {
                $findings_val = $post_qua_findings->findings;
                if($findings_val == '0'){
                    $finding_result = false;
                }
                
            }
            if($finding_result == false){
                $this->db->set('status',-4);
                $this->db->where('bids_id', $session_bids_id);
                $this->db->update('bids');
    
                $this->db->set('status',-4);

                $this->db->where('users_user_id', $session_user_id);
                $this->db->where('bids_bids_id', $session_bids_id);
                $this->db->update('evaluators');
                print json_encode(array("status"=>"fail","message"=>"fail"));
            }
            else{
                if($query->num_rows() >= 23){
                    $this->db->set('status',4);
                    $this->session->set_userdata("session_bids_id", "$session_bids_id");
                    print json_encode(array("status"=>"success","message"=>"success"));

                    $this->db->where('users_user_id', $session_user_id);
                    $this->db->where('bids_bids_id', $session_bids_id);
                    $this->db->update('evaluators');
                }
                else{
                    print json_encode(array("status"=>"fail2","message"=>"Please complete the evaluation"));
                }
                
            }

             // activity log starts here
            $sql2='select projects_description, bids_id, firstname, lastname from bids
            inner join users on bids.users_user_id = users.user_id
            inner join projects on bids.projects_projects_id= projects.projects_id
            where bids_id = "'.$session_bids_id.'" '; 

            $query2 = $this->db->query($sql2);
            $row = $query2->row();
            $activity_log_data = array( 
                'users_user_id' => $session_user_id, 
                'description' => "Evaluated and submitted the post qualification result from bidder $row->firstname $row->lastname on the project ($row->projects_description)", 
            ); 

            $this->db->insert('activity_log', $activity_log_data);
            
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
                        <td class="td_button"><a class="btn evaluate-button"type="button" href="'.base_url("bidopening/technical_evaluation_result").'/'.$evaluators->evaluators_id.'">TECHNICAL EVALUATION RESULT</a>';

                        // echo '<script>console.log('.$evaluators->status.');</script>';
                        if($evaluators->status == '3' ){
                            $table_data .= '<a class="btn evaluate-button"type="button" href="'.base_url("bidopening/financial_evaluation_result").'/'.$evaluators->evaluators_id.'">FINANCIAL EVALUATION RESULT</a></td>';
                        }
                        if($evaluators->status == '4' || $evaluators->status == '-4' ){
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
                                    
                    <td class="sorting_1 description_name">'.$technical_documents->description.'</td>
                    <td><a class="btn img_button" data-link='.base_url()."".$technical_documents->file_path.' >VIEW</a></td>';
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
        
        $sql='SELECT * FROM post_qualification
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
                                    
                    <td class="sorting_1 description_name">'.$technical_documents->description.'</td>
                    <td>'.$technical_documents->parties_consulted.'</td>';
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
                                    
                    <td class="sorting_1 description_name">'.$financial_documents->description.'</td>
                    <td><a class="btn img_button" data-link='.base_url()."".$financial_documents->file_path.'>CLICK TO VIEW</a></td>';
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
                    <td>'.date("Y/m/d - H:m", strtotime($bids->created_on)).'</td>
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

    public function convertpdf($id){
        
        $sql='SELECT * FROM bims_db.bids
        inner join projects on bids.projects_projects_id = projects.projects_id
        inner join users on bids.users_user_id = users.user_id
        where bids_id = "'.$id.'" ';

        $query = $this->db->query($sql);
        $row = $query->row();

        $sql2='SELECT evaluators.bids_bids_id, users.user_type, users.firstname, users.user_id, users.lastname FROM evaluators
        inner join users on evaluators.users_user_id = users.user_id
        where bids_bids_id = "'.$id.'" 
        and users.user_type="HEAD-BAC"';

        $query2 = $this->db->query($sql2);
        $row2 = $query2->row();

        $sql3='SELECT evaluators.bids_bids_id, users.user_type, users.firstname, users.user_id, users.lastname FROM evaluators
        inner join users on evaluators.users_user_id = users.user_id
        where bids_bids_id = "'.$id.'" 
        and users.user_type="HEAD-TWG"';

        $query3 = $this->db->query($sql3);
        $row3 = $query3->row();
        

        $data2 = array(
            'head_bac_name' => $row2->firstname .' '.$row2->lastname,
            'head_twg_name' => $row3->firstname .' '.$row3->lastname,
            'project_location' => $row->project_location,
            'projects_description' => $row->projects_description,
            'projects_id' => $row->projects_id,
            'rank' => $row->rank,
            'bidder_name' => $row->firstname .' '.$row->lastname,
            'address' => $row->address,
            'bid_price' => $row->bid_price,
            
        );

        $data =  $this->get_post_qualification($id) ;

        $this->load->library('pdf');
        $this->pdf->load_view('BAC/bid-opening/post_qualification_report',array_merge($data, $data2));
    }

    public function check_opener_decrypt_project_status() 
    {

        $sql="Select * from project_openers where users_users_id='1' ";    
        $query = $this->db->query($sql);

    }

  
}