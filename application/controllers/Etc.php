<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Etc extends CI_Controller {

	public function __construct() {
		parent::__construct();

		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';

	}

	public function editProfile()
	{

	}

	public function bilingual()
	{

	}

	public function sendEmail(){
		$name = $_POST['name'];
		$subject = $_POST['subject'];
		$body = $_POST['message'];
		$from = $_POST['from'];

		$status = $this->sendingEmail($name, $subject, $body, $from);
		echo $status ? "true" : "false";
	}

	private function sendingEmail($name, $subject, $body, $from)
	{
		// PHPMailer object
		$response = false;
		$mail = new PHPMailer();


		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'onetech.co.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'developer@onetech.co.id'; // user email
		$mail->Password = 'Minindo228'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('developer@onetech.co.id', $name); // user email

		// Add a recipient
		$mail->addAddress('business@onetech.co.id'); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = $subject; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "Email ini dikirimkan oleh ".$from." \n\n".$body; // isi email
		$mail->Body = $mailContent;

		return $mail->send();
	}
}
