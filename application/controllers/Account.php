<?php


class Account extends CI_Controller {

	public function loginAccount()
	{
		$this->load->model('m_AccountDB');
		if($this->m_AccountDB->login($this->input->post('email'), $this->input->post('password'))==TRUE){
			echo "<script>  
		 			alert('Login Success!');
                 </script>";
			session_start();
			$_SESSION["email"] = $this->input->post('email');
			$this->load->view('V_homePage');
		}else{
			echo "<script>
					//window.location.href='".base_url('hotel/checkOrder')."';
                    alert('Login Failed, Wrong Username or Password');
                 </script>";
		}
	}

	public function authentication()
	{

	}

	public function searchAccount()
	{

	}

	public function setPassword()
	{
		$this->load->helper('url');

		$hash = bin2hex(openssl_random_pseudo_bytes(16));
		$data = array(
			'hash' => $hash,
		);
		$this->load->model('M_login');
		$this->M_login->
	}

	public function registData()
	{

	}

	public function checkVerify()
	{
        $this->load->helper('url');

        $hash = bin2hex(openssl_random_pseudo_bytes(16));
        $data = array(
            'email' => $_POST["email"],
            'password' => $_POST["password"],
            'name' => $_POST["name"],
            'address' => $_POST["address"],
            'phoneNumber' => $_POST["phoneNumber"],
            'activeStatus' => '0',
            'accountType' => $_POST["accountType"],
            'typeOfInstitution' => $_POST["typeOfInstitution"],
            'institutionName' => $_POST["institutionName"],
            'institutionAddress' => $_POST["institutionAddress"],
            'hash' => $hash,
        );
        $this->load->model("M_AccountDB");
        $this->M_AccountDB->registAccountToDB($data);

        $this->load->view('V_registerPage');
	}

	public function verifyAccount(){
        $this->load->model("M_AccountDB");
        $this->M_AccountDB->verifyAccount($_GET['email'], $_GET['hash']);
        echo "Account has Been Verify";
    }

}
