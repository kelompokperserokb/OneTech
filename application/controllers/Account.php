<?php


class Account extends CI_Controller {

    public function toLogin(){
        $this->load->helper('url');
        if (!isset($_SESSION["email"])) {
            $this->load->model("M_ProductDB");
            $data['data'] = $this->M_ProductDB->getCategory();
            $this->load->view('V_header', $data);
            $this->load->view('V_login');
            $this->load->view('footer');
        } else {
            redirect(base_url());
        }
    }

	public function loginAccount()
	{
        session_start();
		$this->load->model('m_AccountDB');
		if($this->m_AccountDB->login($this->input->post('username'), $this->input->post('password'))==TRUE){
		    $account = $this->m_AccountDB->getAccount($this->input->post('username'));
		    if ($account[0]->active_status == 1){
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
        session_start();
        $this->load->model('m_AccountDB');
        if($this->m_AccountDB->loginAdmin($this->input->post('password'))==TRUE){
            $_SESSION["admin-authorize"] = "true";
            echo "true";
        }else{
            echo "false";
        }
    }

	public function logout(){
	    session_start();
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
                    'phone_number' => $_POST["phone_number"],
                    'active_status' => '0',
                    'accountType' => $_POST["account_type"],
                    'institution_type' => $_POST["institution_type"],
                    'institution_name' => $_POST["institution_name"],
                    'institution_address' => $_POST["institution_address"],
                    'hash' => $hash,
                );
                $this->load->model("M_AccountDB");
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
        if ($this->M_AccountDB->verifyAccount($_GET['email'], $_GET['hash'])){
            echo "Account has Been Verify";
        } else echo "Uppss something wrong";

	}

}
