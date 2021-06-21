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
                inner join financial_file on financial_documents.financial_documents_id = financial_file.financial_documents_financial_documents_id
                where description = "Financial Bid Form" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
                foreach ($query->result() as $financial_file)
                {
                    $financial_bid_file .= '<a class="btn img_button"href='.base_url()."".$financial_file->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br>';
                }

        echo $financial_bid_file;
        die;
    }

    public function bill_of_quantities_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                inner join financial_file on financial_documents.financial_documents_id = financial_file.financial_documents_financial_documents_id
                where description = "Bill Of Quantities" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
                foreach ($query->result() as $financial_file)
                {
                    $financial_bid_file .= '<a class="btn img_button"href='.base_url()."".$financial_file->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br>';
                }

        echo $financial_bid_file;
        die;
    }

    public function detailed_estimates_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                inner join financial_file on financial_documents.financial_documents_id = financial_file.financial_documents_financial_documents_id
                where description = "Detailed Estimates" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
                foreach ($query->result() as $financial_file)
                {
                    $financial_bid_file .= '<a class="btn img_button"href='.base_url()."".$financial_file->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br> ';
                }

        echo $financial_bid_file;
        die;
    }

    public function cash_flow_by_quarter_file_show($id)
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql=' SELECT * FROM financial_documents
                inner join financial_file on financial_documents.financial_documents_id = financial_file.financial_documents_financial_documents_id
                where description = "Cash Flow By Quarter" 
                and users_user_id ="'.$users_user_id.'"
                and projects_projects_id ="'.$id.'" ';

        $query = $this->db->query($sql);

        $financial_bid_file ="";
            
                foreach ($query->result() as $financial_file)
                {
                    $financial_bid_file .= '<a class="btn img_button"class="btn" href='.base_url()."".$financial_file->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br>';
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
                'projects_projects_id' => $this->input->post('projects_id')
            );

            $description = $this->input->post('financialdesc');
            $users_user_id = $this->session->userdata('user_id');
            $projects_projects_id = $this->input->post('projects_id');


            $sql=' SELECT * FROM financial_documents
                    where description = "'. $description.'" 
                    and users_user_id ="'.$users_user_id.'"
                    and projects_projects_id ="'.$projects_projects_id.'"';
    
            $query = $this->db->query($sql);
            $row = $query->row();

            
            if ( $query->num_rows() > 0 ) 
            {
                $financial_file_data = array(		
                    'financial_documents_financial_documents_id' =>  $row->financial_documents_id,
                    'file_path' => "assets/uploads/financial-docs/".$data['upload_data']['file_name'],
                );
               
                $this->db->insert('financial_file',$financial_file_data);
            } 
            else {

                $this->db->insert('financial_documents',$financial_documents_data);
                $last_id = $this->db->insert_id();
    
                $financial_file_data = array(		
                    'financial_documents_financial_documents_id' =>  $last_id,
                    'file_path' => "assets/uploads/financial-docs/".$data['upload_data']['file_name'],
                );
                $this->db->insert('financial_file',$financial_file_data);
            }
            
        }
        echo 'Success';
        die;
    }
}