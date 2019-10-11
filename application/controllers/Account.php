<?php


class Account extends CI_Controller {

	public function loginAccount()
	{
		$this->load->model('m_login');
		if($this->m_login->login($this->input->post('email'), $this->input->post('password'))==TRUE){
			echo "<script>  
		 			alert('Login Success!');
                 </script>";
			$this->load->view('V_homePage');
		}else{
			echo "<script>
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
		$this->load->model('M_login');
	}

	public function registData()
	{

	}

	public function checkVerify()
	{
        $this->load->helper('url');
        $this->load->view('V_registerPage');
	}


}
