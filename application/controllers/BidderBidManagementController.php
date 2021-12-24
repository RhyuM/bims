<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BidderBidManagementController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')==false){
            redirect('loginregister');
        }
    }

    public function index()
    {
        $this->load->view('BIDDER/bid-management/list_of_projects_view');
    }
    

    public function ajax_table_projects_show()
    {
        $sql="select * from projects where delete_status != 1
        ORDER BY created DESC"; 
        $query = $this->db->query($sql);

        $session_user_id = $this->session->userdata("user_id");
        $sql2='SELECT * FROM users where user_id="'.$session_user_id.'"'; 
        $query2 = $this->db->query($sql2);
        $status_result = $query2->row();
        

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $projects)
                {

                    $deadline_date = $projects->submission_deadline;
                    $opening_date = $projects->opening_date;

                    $sched = explode(" ", $deadline_date);
                    $sched_opening = explode(" ", $opening_date);

                    date_default_timezone_set('Asia/Manila');

                    $sql3='SELECT * FROM bids where projects_projects_id="'.$projects->projects_id.'" 
                        And users_user_id="'.$session_user_id.'"'; 
                    $query3 = $this->db->query($sql3);
                    $result = $query3->row();

                    if($sched[0] >= date('Y/m/d') || !empty($result)){
                        $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects->projects_id.'">
                                        
                        <td class="sorting_1">'.$start++.'</td>
                        <td>'.$projects->projects_description.'</td>
                        <td>'.$projects->projects_type.'</td>
                        <td>'. $projects->opening_date .'</td>
                        <td>'. $projects->submission_deadline .'</td>
                        <td>₱ '.number_format($projects->approve_budget_cost).'</td>
                        <td>'. $projects->projects_status.'</td>
                        <td><a class="btn img_button" data-link="'.base_url()."". $projects->ITB_path.'" rel="noopener noreferrer" >VIEW ITB</a>';
                            if($sched[0] >= date('Y/m/d')){
                                if($status_result->status == '1' && empty($result)){
                                    $table_data .='<a class="btn bid_button"type="button" href="'.base_url("BidderBidManagementController/bid_now") .'/'.$projects->projects_id .'">BID NOW</a>';
                                }
                            }
                            if($sched_opening[0] <= date('Y/m/d') && empty($result)){
                                $table_data .='<a class="btn result"type="button" href="'.base_url("BidderBidManagementController/bid_now") .'/'.$projects->projects_id .'">RESULT</a>';
                            }
                        $table_data .='</td>';
                    }
                }

        echo $table_data;
        die;
    }

    
    public function bid_now($id) 
    {
        $users_id = $this->session->userdata('user_id');

        $row = $this->db->query('select * from projects where projects_id = "'.$id.'"  ')->row();
        
        $sql='select * from bids 
            inner join financial_documents on bids.bids_id = financial_documents.bids_bids_id
            where projects_projects_id = "'.$id.'"
            and users_user_id = "'.$users_id.'"'; 
        
        $query = $this->db->query($sql);
        
        $financial_bid_form_id = '';
        $bill_of_quantities_id = '';
        $detailed_estimates_id = '';
        $cash_flow_by_quarter_id = '';

        foreach($query->result() as $financial_docs){
            if($financial_docs->description == 'Financial Bid Form')
            {
                $financial_bid_form_id = $financial_docs->financial_documents_id;
            }
            else if($financial_docs->description == 'Bill Of Quantities')
            {
                $bill_of_quantities_id = $financial_docs->financial_documents_id;
            }
            else if($financial_docs->description == 'Detailed Estimates')
            {
                $detailed_estimates_id = $financial_docs->financial_documents_id;
            }
            else if($financial_docs->description == 'Cash Flow By Quarter')
            {
                $cash_flow_by_quarter_id = $financial_docs->financial_documents_id;
            }
        }

        $data = array(

            'financial_bid_form_id' =>  $financial_bid_form_id,
            'bill_of_quantities_id' =>  $bill_of_quantities_id,
            'detailed_estimates_id' =>  $detailed_estimates_id,
            'cash_flow_by_quarter_id' =>  $cash_flow_by_quarter_id,

            'projects_id' => $row->projects_id,
            'projects_description' => $row->projects_description,
            'projects_type' => $row->projects_type,
            'opening_date' => $row->opening_date,
            'approve_budget_cost' => $row->approve_budget_cost,
            'projects_status' => $row->projects_status,
            
            'session_user_id'=>   $this->session->userdata('user_id')
        );


        $this->load->view('BIDDER/bid-management/bid_view', $data);
    }


    public function insertFinancialDocs($post_name, $description, $bid_id)
    {
        $config['upload_path']="./assets/uploads/financial-docs/";
        $config['allowed_types']='pdf|jpg|png';
        // $config['max_size'] = 100;
        $this->load->library('upload',$config);

        if (!empty($post_name)) {
            if($this->upload->do_upload($post_name)){
                $data = array('upload_data' => $this->upload->data());  
    
                $financial_documents_data = array(		
                    'description' => $description,
                    'bids_bids_id ' => $bid_id,
                    'file_path' => "assets/uploads/financial-docs/".$data['upload_data']['file_name']
                );
    
                $this->db->insert('financial_documents',$financial_documents_data);
            }
        }
        
        // echo 'Success';
        // die;
    }
    
    public function submit_bid()
    {
        $users_user_id = $this->session->userdata('user_id');
        $projects_id	= $this->input->post('projects_id');


        $sql1 ='  SELECT * FROM bims_db.bids
        where  projects_projects_id ="'.$projects_id.'" 
        and users_user_id = "'.$users_user_id.'"
        and status = "1" '; 

        $sql2='  SELECT * FROM technical_documents
                where users_user_id ="'.$users_user_id.'" ';

        $query1 = $this->db->query($sql1);
        $query2 = $this->db->query($sql2);
        

        if ( $query1->num_rows() == 0){
                if ( $query2->num_rows() == 20 ){

                        $bid_data = array(		
                            'bid_price' 	=> str_replace(',', '', $this->input->post('bid_price')), 
                            'projects_projects_id' 	=> $this->input->post('projects_id'), 
                            'users_user_id' => $this->session->userdata('user_id'),
                            'status' => 1
                        );
            
                    $this->db->insert('bids',$bid_data);
                    $insert_id = $this->db->insert_id();

                    $docs1 = 'financial_bid_form';
                    $docs2 = 'bill_of_quantities';
                    $docs3 = 'detailed_estimates';
                    $docs4 = 'cash_flow_by_quarter';

                    $description1 = 'Financial Bid Form';
                    $description2 = 'Bill Of Quantities';
                    $description3 = 'Detailed Estimates';
                    $description4 = 'Cash Flow By Quarter';

                    // insert financial docs table using method above insertFinancialDocs
                    $this->insertFinancialDocs($docs1, $description1, $insert_id );
                    $this->insertFinancialDocs($docs2, $description2, $insert_id );
                    $this->insertFinancialDocs($docs3, $description3, $insert_id );
                    $this->insertFinancialDocs($docs4, $description4, $insert_id );

                    // insert technical docs to bid_technical_documents table
                    $res = $this->db->query($sql2)->result();
                    foreach($res as $tech_file_data)
                    {
                        $technical_docs_data = array(				
                            'description' => $tech_file_data->description,
                            'file_path' => $tech_file_data->file_path,
                            'bids_bids_id' => $insert_id,
                        );
                
                        $this->db->insert('bid_technical_documents',$technical_docs_data);
                    }
                    print json_encode(array("status"=>"success","message"=>"success"));
                }
                else{
                    // echo 'Technical documents not completed!';
                    print json_encode(array("status"=>"fail","message"=>"Technical documents is incomplete!"));
                }
        }
        else{
            // echo 'Financial documents not completed!';
            print json_encode(array("status"=>"fail","message"=>"You Already Bid To This Project"));
        }
    }

    
    public function my_active_bids()
    {   
        $this->load->view('BIDDER/bid-management/my_active_bids_view');
    }

    public function my_active_bids_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM bims_db.bids
                inner join projects on bids.projects_projects_id = projects.projects_id
                where users_user_id = "'.$users_user_id.'"'; 

        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $projects_bid)
                {
                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects_bid->projects_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$projects_bid->projects_description.'</td>
                    <td>'.$projects_bid->projects_type.'</td>
                    <td>'. $projects_bid->opening_date .'</td>
                    <td>₱'.number_format($projects_bid->approve_budget_cost).'</td>
                    <td>₱'.number_format($projects_bid->bid_price).'</td>';

                    // $table_data .= ' <td><a class="btn img_button"type="button" href="#">WITHDRAW BID</a></td>';
                }

        echo $table_data;
        die;
    }
}