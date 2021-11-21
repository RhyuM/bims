<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('users',1);
    return $result;
  }

  public function get_user($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
  public function update_user($id, $userdata)
  {
      $this->db->where('user_id', $id);
      $this->db->update('users', $userdata);
  }
}