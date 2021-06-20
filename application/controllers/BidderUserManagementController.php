<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BidderUserManagementController extends CI_Controller
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
        $this->load->view('BIDDER/user-management/my_documents_view');
    }
    

    public function inserttechdocs()
    {
        $config['upload_path']="./assets/uploads/technical-docs/";
        $config['allowed_types']='pdf|jpg|png';
        $this->load->library('upload',$config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());

            $technical_documents_data = array(		
                'description' => $this->input->post('techdesc'),
                'users_user_id' => $this->session->userdata('user_id'),
            );

            $this->db->insert('technical_documents',$technical_documents_data);
            $last_id = $this->db->insert_id();


            $technical_file_data = array(		
                'technical_documents_technical_documents_id' =>  $last_id,
                'file_path' => "assets/uploads/technical-docs/".$data['upload_data']['file_name'],
            );
            $this->db->insert('technical_file',$technical_file_data);
        }
        echo 'Success';
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