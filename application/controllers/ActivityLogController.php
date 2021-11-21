<?php
class ActivityLogController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    
    function index()
    {
        $this->load->view('BAC/activity_log');
    }
    
    public function show_logs()
    {
        $sql="select * from activity_log
        ORDER BY date DESC"; 
        $query = $this->db->query($sql);
        
        $table_data ="";

        if($query){
            
                foreach ($query->result() as $logs)
                {
                    $sql2='select user_id, firstname, lastname from users
                        where user_id = "'.$logs->users_user_id.'" '; 

                    $query2 = $this->db->query($sql2);
                    $users = $query2->row();

                    $table_data .= '<tr class="gradeX odd" role="row"">
                                    
                    <td>'.$users->firstname.' '.$users->lastname.'</td>
                    <td>'. $logs->description.'</td>
                    <td>'.$logs->date.'</td>
                    
                </tr>';
                }
        }
       
        echo $table_data;
        die;
    }
}