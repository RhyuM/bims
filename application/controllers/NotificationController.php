<?php
class NotificationController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    
    public function show_notifications()
    {
        $session_user_id = $this->session->userdata("user_id");

        $sql='select * from notification
        WHERE users_user_id="'.$session_user_id .'"
        AND status="0" 
        ORDER BY date DESC'; 
        $query = $this->db->query($sql);
        
        $table_data ="";
        $this->load->helper('date');
        $unreadCount = $query->num_rows();

        $table_data .= '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" >
            <i class="icon-bell"></i>';

            if(!empty($unreadCount)){
                $table_data .= ' <span class="badge badge-default primary-bg">'.$unreadCount.'</span>';
            }
            else{
                $table_data .= ' <span class="tooltiptext">You have no unread notifications</span>'; 
            }
            $table_data .= '</a>';

            if(!empty($unreadCount)){
                $table_data .= '<ul class="dropdown-menu">
                                    <li>
                                     <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">';

                date_default_timezone_set('Asia/Manila');
                if($query){
                
                    foreach ($query->result() as $notification)
                    {
                        $start = new DateTime(date($notification->date));
                        $end =  new DateTime(date("Y-m-d H:i:s"));
                        $interval = $start->diff($end);


                        $table_data .= '
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">';

                                    if($interval->d == 1) {
                                        $table_data .= ''.$interval->format('%d day').' ago</span>';
                                    }
                                    else if($interval->d > 1) {
                                        $table_data .= ''.$interval->format('%d days').' ago</span>';
                                    }
                                    else if($interval->h == 1){
                                        $table_data .= ''.$interval->format('%h hour').' ago</span>';
                                    }
                                    else if($interval->h > 1){
                                        $table_data .= ''.$interval->format('%h hours').' ago</span>';
                                    }
                                    else if($interval->d == 0  && $interval->h == 0 && $interval->i == 1) {
                                        $table_data .= ''.$interval->format('%i minute').' ago</span>';
                                    }
                                    else if($interval->d == 0  && $interval->h == 0 && $interval->i > 1) {
                                        $table_data .= ''.$interval->format('%i minutes').' ago</span>';
                                    }
                                    else if($interval->d == 0  && $interval->h == 0 && $interval->i === 0) {
                                        $table_data .= ' just now</span>';
                                    }
                        $table_data .= '<span class="details">
                                    <span class="label label-sm label-icon label-success green-bg">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    '.$notification->description.' </span>
                                    </a>
                                </li>
                           ';
                    }
                }
                
                $table_data .=      '</ul>
                                </li>
                            </ul>';
            }
        echo $table_data;
        die;
    }

    public function update_notifications()
    {
        $session_user_id = $this->session->userdata("user_id");

        $sql='select * from notification
        WHERE users_user_id="'.$session_user_id .'"
        AND status="0" 
        ORDER BY date DESC'; 

        $query = $this->db->query($sql);
            if($query){
            
                foreach ($query->result() as $notification)
                {
                    $this->db->set('status','1');
                    $this->db->where('notification_id', $notification->notification_id);
                    $this->db->update('notification');
                }
            }
    }
}