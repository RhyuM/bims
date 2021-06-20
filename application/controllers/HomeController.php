<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$this->load->view('home_view');
	}
	public function about()
	{
		$this->load->view('about_view');
	}
	public function services()
	{
		$this->load->view('services_view');
	}
	public function contact()
	{
		$this->load->view('contact_view');
	}
	public function invitation_to_bid()
	{
		$this->load->view('invitation-to-bid_view');
	}
	public function show_invitation_to_bid()
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
					<td> <a href='.base_url()."/".$projects->ITB_path.' rel="noopener noreferrer" target="_blank">CLICK TO DOWNLOAD</a></td>';
                }
       
        echo $table_data;
        die;
	}
}