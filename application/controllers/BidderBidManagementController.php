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
                    <td>'.$projects->approve_budget_cost.'</td>
                    <td> <a href=/'.$projects->ITB_path.' rel="noopener noreferrer" target="_blank">PDF</a></td>
                    <td>'. $projects->projects_status.'</td>
                    ';
                }

        echo $table_data;
        die;
    }
    public function create()
    {

     
    }

    public function update()
    {
        		
        
    }

    public function delete()
    {
     
    }
   
}