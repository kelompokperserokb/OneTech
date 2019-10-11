<?php


class Account extends CI_Controller {

	public function loginAccount()
	{

	}

	public function authentication()
	{

	}

	public function searchAccount()
	{

	}

	public function setPassword()
	{

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
