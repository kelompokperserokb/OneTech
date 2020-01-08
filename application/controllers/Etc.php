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

        $mail->setFrom('developer@onetech.co.id', 'User Question'); // user email

        // Add a recipient
        $mail->addAddress('developer.onetech@gmail.com'); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = $subject; //subject email

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
				<h2 style='margin:40px auto'>".$name." mengirimkan pertanyaan</h2>
				<p>Message : ".$body."</p>
				<a style='margin:30px auto; text-decoration: none;' class='site-btn' href='mailto:".$from."' target='_blank'>Reply This Email</a>
            </body>
            </html>"; // isi email
        $mail->Body = $mailContent;

        return $mail->send();
	}
}
