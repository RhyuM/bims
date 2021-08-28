<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BidderBidManagementController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')==false){
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('BIDDER/bid-management/list_of_projects_view');
    }
    

    public function ajax_table_projects_show()
    {
        $sql="select * from projects where delete_status != 1"; 
        $query = $this->db->query($sql);

        $table_data ="";
            
                $start = 1;
                foreach ($query->result() as $projects)
                {
                    $table_data .= '<tr class="gradeX odd" role="row" id="'.$projects->projects_id.'">
                                    
                    <td class="sorting_1">'.$start++.'</td>
                    <td>'.$projects->projects_description.'</td>
                    <td>'.$projects->projects_type.'</td>
                    <td>'. $projects->opening_date .'</td>
                    <td>Php'.$projects->approve_budget_cost.'</td>
                    <td> <a class="btn img_button"href='.base_url().$projects->ITB_path.' rel="noopener noreferrer" target="_blank">CLICK TO DOWNLOAD</a></td>
                    <td>'. $projects->projects_status.'</td>
                    <td><a class="btn img_button"type="button" href="'.base_url("BidderBidManagementController/bid_now") .'/'.$projects->projects_id .'">BID NOW</a></td>
                    ';
                }

        echo $table_data;
        die;
    }

    
    public function bid_now($id) 
    {
        $users_id = $this->session->userdata('user_id');

        $row = $this->db->query('select * from projects where projects_id = "'.$id.'"  ')->row();
        
        $sql='select * from financial_documents where projects_projects_id = "'.$id.'"
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

        
        // $this->financial_bid_form_file_show($id);
        $this->load->view('BIDDER/bid-management/bid_view', $data);
    }



    public function financial_bid_form_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                where description = "Financial Bid Form" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
        $financial_bid_file .= '<td class="financial_description">Financial Bid Form</td>';

        if ($query->num_rows()) {
            foreach ($query->result() as $financial_documents)
            {
                $financial_bid_file .=' <td><a class="btn img_button"href='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                                        <td style="vertical-align: middle;"><a class="btn replace_btn" data-d_id="Financial Bid Form">REPLACE</a></td> ';
            }
        } 
        else {
            $financial_bid_file .= '<td></td>
                                    <td style="vertical-align: middle;"><a class="btn upload_btn" data-financial_documents_id="<?php echo $financial_bid_form_id; ?>" data-d_id="Financial Bid Form">Add File</a></td> ';
        }

        echo $financial_bid_file;
        die;
    }

    public function bill_of_quantities_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                where description = "Bill Of Quantities" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
        $financial_bid_file .= '<td class="financial_description">Bill Of Quantities</td>';

        if ($query->num_rows()) {
            foreach ($query->result() as $financial_documents)
            {
                $financial_bid_file .=' <td><a class="btn img_button"href='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                                        <td style="vertical-align: middle;"><a class="btn replace_btn" data-d_id="Financial Bid Form">REPLACE</a></td> ';
            }
        } 
        else {
            $financial_bid_file .= '<td></td>
                                    <td style="vertical-align: middle;"><a class="btn upload_btn" data-financial_documents_id="<?php echo $bill_of_quantities_id; ?>" data-d_id="Bill Of Quantities">Add File</a></td> ';
        }

        echo $financial_bid_file;
        die;
    }

    public function detailed_estimates_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                where description = "Detailed Estimates" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";

        $financial_bid_file .= '<td class="financial_description">Detailed Estimates</td>';

        if ($query->num_rows()) {
            foreach ($query->result() as $financial_documents)
            {
                $financial_bid_file .=' <td><a class="btn img_button"href='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                                        <td style="vertical-align: middle;"><a class="btn replace_btn" data-d_id="Detailed Estimates">REPLACE</a></td> ';
            }
        } 
        else {
            $financial_bid_file .= '<td></td>
                                    <td style="vertical-align: middle;"><a class="btn upload_btn" data-financial_documents_id="<?php echo $detailed_estimates_id; ?>" data-d_id="Detailed Estimates">Add File</a></td> ';
        }
        echo $financial_bid_file;
        die;
    }

    public function cash_flow_by_quarter_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                where description = "Cash Flow By Quarter" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);
        
        $financial_bid_file ="";
       
        $financial_bid_file .= '<td class="financial_description">Cash Flow By Quarter</td>';

        if ($query->num_rows()) {
            foreach ($query->result() as $financial_documents)
            {
                $financial_bid_file .=' <td><a class="btn img_button"href='.base_url()."".$financial_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a></td>
                                        <td style="vertical-align: middle;"><a class="btn replace_btn" data-d_id="Cash Flow By Quarter">REPLACE</a></td> ';
            }
        } 
        else {
            $financial_bid_file .= '<td></td>
                                    <td style="vertical-align: middle;"><a class="btn upload_btn" data-financial_documents_id="<?php echo $cash_flow_by_quarter_id; ?>" data-d_id="Cash Flow By Quarter">Add File</a></td> ';
        }

        echo $financial_bid_file;
        die;
    }


    public function insertFinancialDocs()
    {
        $config['upload_path']="./assets/uploads/financial-docs/";
        $config['allowed_types']='pdf|jpg|png';
        // $config['max_size'] = 100;
        $this->load->library('upload',$config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());

            $financial_documents_data = array(		
                'description' => $this->input->post('financialdesc'),
                'users_user_id' => $this->session->userdata('user_id'),
                'projects_projects_id' => $this->input->post('projects_id'),
                'file_path' => "assets/uploads/financial-docs/".$data['upload_data']['file_name']
            );

            $this->db->insert('financial_documents',$financial_documents_data);
            
        }
        echo 'Success';
        die;
    }
    public function submit_bid()
    {
        $users_user_id = $this->session->userdata('user_id');
        $projects_id	= $this->input->post('projects_id');
        $sql=' SELECT * FROM financial_documents
                where users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$projects_id.'" ';

        $sql2='  SELECT * FROM technical_documents
                where users_user_id ="'.$users_user_id.'" ';
        
        $sql3 ='  SELECT * FROM bims_db.bids
                where  projects_projects_id ="'.$projects_id.'" 
                and users_user_id = "'.$users_user_id.'"
                and status = "1" '; 

        $query = $this->db->query($sql);
        $query2 = $this->db->query($sql2);
        $query3 = $this->db->query($sql3);

        if ( $query3->num_rows() == 0){
            if ( $query->num_rows() == 4 ){
                if ( $query2->num_rows() == 20 ){

                        $bid_data = array(		
                            'bid_price' 	=> $this->input->post('bid_price'), 
                            'projects_projects_id' 	=> $this->input->post('projects_id'), 
                            'users_user_id' => $this->session->userdata('user_id'),
                            'status' => 1
                        );
            
                    $this->db->insert('bids',$bid_data);
                    
                    // insert technical docs to bid_technical_documents table
                    $res = $this->db->query($sql2)->result();
                    foreach($res as $tech_file_data)
                    {
                        $technical_docs_data = array(				
                            'description' => $tech_file_data->description,
                            'file_path' => $tech_file_data->file_path,
                            'findings' => '0',
                            'users_user_id' => $tech_file_data->users_user_id,
                            'projects_projects_id' => $projects_id,
                        );
                
                        $this->db->insert('bid_technical_documents',$technical_docs_data);
                        // echo $this->db->insert_id();

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
                print json_encode(array("status"=>"fail","message"=>"Financial documents is incomplete!"));
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
                where users_user_id = "'.$users_user_id.'"
                and status = "1" '; 

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
                    <td>₱'.$projects_bid->approve_budget_cost.'</td>
                    <td>₱'.$projects_bid->bid_price.'</td>
                    <td><a class="btn img_button"type="button" href="#">WITHDRAW BID</a></td>
                    ';
                }

        echo $table_data;
        die;
    }
}