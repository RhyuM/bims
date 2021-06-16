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
    

    public function ajax_table_documents_show()
    {
        // $sql="select * from projects where delete_status != 1"; 
        // $query = $this->db->query($sql);

        $table_data ="";
            
                    $table_data .= '<tr>
                            <td class="sorting_1">1</td>
                            <td>DTI</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">2</td>
                            <td>Valid and current Mayor’s permit/municipal license</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">3</td>
                            <td>Tax Clearance</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">4</td>
                            <td>Statement Completed Government and Private Construction Contract</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">5</td>
                            <td>Statement of All Ongoing Government and Private Construction Contract including Contracts Awarded but Not Yet Started</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">6</td>
                            <td>Valid PCAB license</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">7</td>
                            <td>Audited financial statements and current assets and liabilities</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">8</td>
                            <td>Net Financial Contracting Capacity (NFCC)</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">9</td>
                            <td>Bid Security/Bid Securing Declaration</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">10</td>
                            <td>Contractor’s Organizational Chart for the contract</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">11</td>
                            <td>List of Qualification of Key Personnel Proposed to be Assigned to the Contract</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">12</td>
                            <td>List of Equipment, Owned or Leased and/or under purchased agreements</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">13</td>
                            <td>Omnibus Sworn Statement </td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">14</td>
                            <td>Affidavit of Site Inspection</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">15</td>
                            <td>PhilGEPS Registration Certificate</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">16</td>
                            <td>Safety and Health Program</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">17</td>
                            <td>Income Tax Return (ITR)</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">18</td>
                            <td>Construction Method </td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        <tr>
                            <td class="sorting_1">19</td>
                            <td>Equipment Utilization Schedule</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>
                        
                        <tr>
                            <td class="sorting_1">20</td>
                            <td>Manpower Utilization Schedule</td>
                            <td>empty!</td>
                            <td><a>upload</a></td>
                        </tr>';

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