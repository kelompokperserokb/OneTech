<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Account extends CI_Controller {

	public function __construct() {
		parent::__construct();

		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';

	}

    public function toLogin(){
        $this->load->helper('url');
        if (!isset($_SESSION["email"])) {
            $this->load->model("M_ProductDB");
            $data["cat"] = $this->getCategory();
            $data["suball"] = $this->getSubCategory();
            $this->load->view('V_header', $data);
            $this->load->view('V_login');
            $this->load->view('V_footer');
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
			$this->load->view('V_footer');
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

                if ($this->sendConfirmationRegist($email,$hash)) echo "true";
                else echo "error";
            } catch (Exception $ex) {
                echo "error";
            }
        }
	}

	public function sendConfirmationRegist($email, $hash){

		// PHPMailer object
		$response = false;
		$mail = new PHPMailer();


		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'onetech.co.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'business@onetech.co.id'; // user email
		$mail->Password = 'Minindo228'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('business@onetech.co.id', 'Onetech'); // user email

		// Add a recipient
		$mail->addAddress($email); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Test Codeigniter'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "
			<html>
			<head>
				<style>
					.site-btn {
						vertical-align: middle;
						display: inline-block;
						border: none;
						font-size: 14px;
						font-weight: 600;
						min-width: 167px;
						border-radius: 50px;
						text-transform: uppercase;
						background: #38b6c9;
						color: #fff !important;
						line-height: normal;
						cursor: pointer;
						text-align: center;
						padding: 10px 0px;
					}
					
					.site-btn:hover {
						color: #fff;
					}
					
					.site-btn.sb-white {
						background: #fff;
						color: #111111;
					}
					
					.site-btn.sb-line {
						background: transparent;
						color: #fff;
						-webkit-box-shadow: inset 0 0 0 1px #fff;
						box-shadow: inset 0 0 0 1px #fff;
					}
					
					.site-btn.sb-dark {
						background: #413a3a;
					}
					
					.site-btn.sb-dark.sb-line {
						background-color: transparent;
						color: #140e0e;
						-webkit-box-shadow: inset 0 0 0 1px #111111;
						box-shadow: inset 0 0 0 1px #111111;
					}
				</style>
			</head>
			<body>
				<img src='".base_url('Asset/img/Logo/OneTech.png')."' />
				<h2 style='margin:40px auto'>Terimakasih atas registrasi yang dilakukan</h2>
				<p>Selangkah lebih dekat dengan kami, segera lakukan konfirmasi pada link yang dilampirkan dibawah untuk mengaktifkan akun OneTech anda. Menjadi bagian dari kami
				untuk berbelanja dengan mudah dan aman.</p>
				<a style='margin:30px auto; text-decoration: none;' class='site-btn' href='https://onetech.co.id/account/verify?email=".$email."&hash=".$hash."'>Konfirmasi akun</a>
            </body>
            </html>
            "; // isi email
		$mail->Body = $mailContent;

		return $mail->send();
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
