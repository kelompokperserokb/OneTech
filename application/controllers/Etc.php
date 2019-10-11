<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etc extends CI_Controller {

	public function editProfile()
	{

	}

	public function bilingual()
	{

	}

	public function sendEmail($to, $subject, $body, $from)
	{
	    $headers = "From: $from";
	    mail($to, $subject, $body, $headers);
        //SendEmail($_POST['emailTo'], $_POST['emailSubject'], $_POST['emailBody'], $_POST['emailFrom']);
	}
}
