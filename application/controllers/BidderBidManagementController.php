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
                    <td><a type="button" href="'.base_url("BidderBidManagementController/bid_now") .'/'.$projects->projects_id .'">open</a></td>
                    ';
                }

        echo $table_data;
        die;
    }
    public function bid_now($id) 
    {
        $row = $this->db->query('select * from projects where projects_id = "'.$id.'"  ')->row();
        
        // $sql='Select * from project_openers
        //         left join users on project_openers.users_user_id = users.user_id
        //         and projects_projects_id = "'.$id.'" ';

        
        // $query = $this->db->query($sql);
      
        if ($row) {
            $data = array(
                // 'users_bid_opener' => $query->result(),

                'projects_id' => $row->projects_id,
                'projects_description' => $row->projects_description,
                'projects_type' => $row->projects_type,
                'opening_date' => $row->opening_date,
                'approve_budget_cost' => $row->approve_budget_cost,
                'projects_status' => $row->projects_status,
                
                'session_user_id'=>   $this->session->userdata('user_id')
            );

            $this->load->view('BIDDER/bid-management/bid_view', $data);
     
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bidopening'));
        }
    }
   
}