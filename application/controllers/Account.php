<?php
class Account extends CI_Controller {

    public function toLogin(){
        $this->load->helper('url');
        if (!isset($_SESSION["email"])) {
            $this->load->model("M_ProductDB");
            $data["cat"] = $this->getCategory();
            $data["suball"] = $this->getSubCategory();
            $this->load->view('V_header', $data);
            $this->load->view('V_login');
            $this->load->view('footer');
        } else {
            redirect(base_url());
        }
    }

	public function toRegister(){
		$this->load->helper('url');
		if (!isset($_SESSION["email"])) {
			$data["cat"] = $this->getCategory();
			$data["suball"] = $this->getSubCategory();
			$this->load->view('V_header',$data);
			$this->load->view('V_registerPage');
			$this->load->view('footer');
		} else {
			redirect(base_url());
		}
	}

    public function getCategory(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }

    public function getSubCategory(){
        $this->load->model("M_ProductDB");
        $data['data'] = $this->M_ProductDB->getAllSubCategory();
        return $data;
    }

	public function loginAccount()
	{
		$this->load->model('m_AccountDB');
		if($this->m_AccountDB->login($this->input->post('username'), $this->input->post('password'))==TRUE){
		    $query = $this->m_AccountDB->getAccount($this->input->post('username'));
		    $account = $query->result();
		    if ($account[0]->activeStatus == 1){
                $_SESSION["email"] = $this->input->post('username');
                $_SESSION["name"] = $account[0]->first_name;
                echo "true";
            } else {
		        echo "needverification";
            }
		}else{
            echo "false";
		}
	}

    public function loginAdmin()
    {
        $this->load->model('m_AccountDB');
        if($this->m_AccountDB->loginAdmin($this->input->post('password'))==TRUE){
            $_SESSION["admin-authorize"] = "true";
            echo "true";
        }else{
            echo "false";
        }
    }

	public function logout(){
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        header('Location:'.base_url());
    }

	public function searchAccount()
	{
        /*$this->load->helper('url');
		$hash = bin2hex(openssl_random_pseudo_bytes(16));
		$data = array(
			'hash' => $hash,
		);
		$this->load->model('M_login');
		$this->M_login->
		$this->M_login->*/
	}

	public function setPassword()
	{
		$this->load->helper('url');

		$hash = bin2hex(openssl_random_pseudo_bytes(16));
		$data = array(
			'hash' => $hash,
		);
		$this->load->model('M_login');
		//$this->M_login->
	}

	public function registData()
	{
        $this->load->model("M_AccountDB");
        $val = $this->M_AccountDB->getAccount($_POST["email"]);

        if ($val->num_rows() > 0) {
            echo "false";
        } else{
            try {$hash = bin2hex(openssl_random_pseudo_bytes(16));
                $email = $_POST["email"] == '' ? null : $_POST["email"];
                $data = array(
                    'email' => $email,
                    'password' => $_POST["password"],
                    'first_name' => $_POST["first_name"],
                    'last_name' => $_POST["last_name"],
                    'address' => $_POST["address"],
                    'phoneNumber' => $_POST["phone_number"],
                    'activeStatus' => '0',
                    'accountType' => $_POST["account_type"],
                    'typeOfInstitution' => $_POST["institution_type"],
                    'institutionName' => $_POST["institution_name"],
                    'institutionAddress' => $_POST["institution_address"],
                    'npwp' => $_POST["npwp"],
                    'hash' => $hash,
                );
                $this->M_AccountDB->registAccountToDB($data);

                echo "true";
            } catch (Exception $ex) {
                echo "error";
            }
        }
        /*if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["first_name"])&& isset($_POST["last_name"]) && isset($_POST["address"]) && isset($_POST["phone_number"])
            && isset($_POST["account_type"]) && isset($_POST["institution_type"]) && isset($_POST["institution_name"]) && isset($_POST["institution_address"])){

        } else {
            header('Location: '.base_url(''));
        }*/
	}

	public function checkVerify()
	{
        $this->load->model("M_AccountDB");
        $param1 = "";
        $param2 = "";

        $data["error"] = false;
        if ((($this->M_AccountDB->getVerify($_GET['email'], $_GET['hash']))[0])->activeStatus == 0) {
            $this->M_AccountDB->verifyAccount($_GET['email'], $_GET['hash']);
            $param1 = "Your Journey Starts Here...";
            $param2 = "Thank you for confirming your email address. Your sign-up is complete, but your devious journey has just begun... ";
        } else if ((($this->M_AccountDB->getVerify($_GET['email'], $_GET['hash']))[0])->activeStatus == 1) {
            $param1 = "Your account was Activated";
            $param2 = "Thank you for your registration";
        } else {
            $data["error"] = true;
            $param1  = "Upss There is somethig wrong!";
        }

        $data["param1"] = $param1;
        $data["param2"] = $param2;

        $this->load->view("V_activation", $data);
	}

}
