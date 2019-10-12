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
        $this->load->helper('url');
        if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phoneNumber"])
            && isset($_POST["accountType"]) && isset($_POST["typeOfInstitution"]) && isset($_POST["institutionName"]) && isset($_POST["institutionAddress"])){
            try {
                $hash = bin2hex(openssl_random_pseudo_bytes(16));
                $email = $_POST["email"] == '' ? null : $_POST["email"];
                $data = array(
                    'email' => $email,
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

                $db_error = $this->db->error();
                if (!empty($db_error)) {
                    throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                    return false; // unreachable retrun statement !!!
                }
                return TRUE;
            } catch (Exception $ex) {
                header('Location: '.base_url(''));
            }
        } else {
            header('Location: '.base_url(''));
        }
	}

	public function checkVerify()
	{
        $this->load->model("M_AccountDB");
        if ($this->M_AccountDB->verifyAccount($_GET['email'], $_GET['hash'])){
            echo "Account has Been Verify";
        } else echo "Uppss something wrong";

	}

}
