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
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" ';

        $query = $this->db->query($sql);

        $docs1 = $docs2 = $docs3 =  $docs4 = $docs5 = $docs6 = $docs7 = $docs8 = $docs9 = $docs10 = $docs11 = $docs12 = $docs13 = $docs14 = $docs15 = $docs16 = $docs17 = $docs18 = $docs19 = $docs20 = '';
        

        foreach($query->result() as $technical_docs){
            if($technical_docs->description == 'DTI')
            {
               $docs1 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Valid and current Mayor’s permit/municipal license')
            {
                $docs2 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Tax Clearance')
            {
                $docs3 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Statement Completed Government and Private Construction Contract')
            {
                $docs4 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started')
            {
                $docs5 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Valid PCAB license')
            {
                $docs6 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Audited financial statements and current assets and liabilities')
            {
                $docs7 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Net Financial Contracting Capacity (NFCC)')
            {
                $docs8 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Bid Security/Bid Securing Declaration')
            {
                $docs9 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Contractor’s Organizational Chart for the contract')
            {
                $docs10 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'List of Qualification of Key Personnel Proposed to be Assigned to the Contract')
            {
                $docs11 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'List of Equipment, Owned or Leased and/or under purchased agreements')
            {
                $docs12 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Omnibus Sworn Statement')
            {
                $docs13 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Affidavit of Site Inspection')
            {
                $docs14 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'PhilGEPS Registration Certificate')
            {
                $docs15 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Safety and Health Program')
            {
                $docs16 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Income Tax Return (ITR)')
            {
                $docs17 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Construction Method')
            {
                $docs18 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Equipment Utilization Schedule')
            {
                $docs19 = $technical_docs->file_path;
            }
            else if($technical_docs->description == 'Manpower Utilization Schedule')
            {
                $docs20 = $technical_docs->file_path;
            }
        }
        
        $data = array(
            'tecnical_documents' => $query->result(),
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
            'session_user_id'=>   $this->session->userdata('user_id')
        );

        $this->load->view('BIDDER/user-management/my_documents_view',$data);
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
        echo $this->input->post('techdesc');
        die;
    }
    public function updatetechdocs()
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
        echo $this->input->post('techdesc');
        die;
    }
    

    // method from thisup to the bottom is for showing file in the technical
    public function technical_documents_1_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "DTI"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">1</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_2_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Valid and current Mayor’s permit/municipal license"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">2</td>
                                <td >'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_3_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Tax Clearance"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">3</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_4_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Statement Completed Government and Private Construction Contract"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">4</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_5_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">5</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_6_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Valid PCAB license"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">6</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_7_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Audited financial statements and current assets and liabilities"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">7</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_8_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Net Financial Contracting Capacity (NFCC)"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">8</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_9_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Bid Security/Bid Securing Declaration"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">9</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_10_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Contractor’s Organizational Chart for the contract"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">10</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_11_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "List of Qualification of Key Personnel Proposed to be Assigned to the Contract"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">11</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_12_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "List of Equipment, Owned or Leased and/or under purchased agreements"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">12</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_13_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Omnibus Sworn Statement"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">13</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_14_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Affidavit of Site Inspection"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">14</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_15_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "PhilGEPS Registration Certificate"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">15</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_16_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Safety and Health Program"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">16</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_17_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Income Tax Return (ITR)"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">17</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_18_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Construction Method"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">18</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_19_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Equipment Utilization Schedule"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">19</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
    public function technical_documents_20_show()
    {
        $users_user_id = $this->session->userdata('user_id');

        $sql='  SELECT * FROM technical_documents
                inner join technical_file on technical_documents.technical_documents_id = technical_file.technical_documents_technical_documents_id
                where users_user_id = "'.$users_user_id.'" 
                and description = "Manpower Utilization Schedule"';

        $query = $this->db->query($sql);

        $table_data ="";
            
                foreach ($query->result() as $technical_documents)
                {
                    $table_data .= '
                                <td class="sorting_1">20</td>
                                <td>'.$technical_documents->description.'</td>
                                <td><a class="btn img_button"href='.base_url()."".$technical_documents->file_path.' rel="noopener noreferrer" target="_blank">CLICK TO VIEW</a><br></td>
                                <td><a class="btn upload_btn" data-d_id="'.$technical_documents->description.'">replace</a></td>
                            ';
                }
        echo $table_data;
        die;
    }
   
}