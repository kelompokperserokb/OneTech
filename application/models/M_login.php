 <?php

class M_login extends CI_Model
{
    public function login($email, $password)
    {
        $cek = array('email' => $email, 'password' => $password);
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($cek);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function lupaPassword($email, $newPassword)
	{
		$this->db->trans_start();
		$data = array(
			'password' => $newPassword
		);
		$this->db->where('email',$email);
		$this->db->update('user', $data);
		$this->db->trans_complete();
	}

}

?>
