<?php
class M_AccountDB extends CI_Model
{
    public function registAccountToDB($data){
        $this->db->trans_start();
        $this->db->insert('user',$data);
        $this->db->trans_complete();
    }

    public function verifyAccount($email, $hash){
        $this->db->trans_start();
        $data = array(
            'activeStatus' => '1',
        );

        $this->db->where('email', $email);
        $this->db->where('hash', $hash);
        $this->db->where('activeStatus', '0');
        $this->db->update('user', $data);
        $this->db->trans_complete();
    }
}
?>