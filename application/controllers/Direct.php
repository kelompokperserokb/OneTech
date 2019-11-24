<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct extends CI_Controller {

	public function home()
	{

	}

	public function search()
	{

	}

	public function cart()
	{

	}

	public function register()
	{

	}

	public function login()
	{

	}

	public function forgetPassword()
	{

	}

    public function about(){
        $this->load->helper('url');
        $data["merk"] = $this->getCategory();
        $this->load->view('V_header',$data["merk"]);
        $this->load->view('V_aboutUs');
        $this->load->view('footer');
    }

	public function howToOrder()
	{
        $this->load->helper('url');
        $data["merk"] = $this->getCategory();
        $this->load->view('V_header',$data["merk"]);
        $this->load->view('V_howToOrder');
        $this->load->view('footer');
	}

	public function payment()
	{
        $this->load->helper('url');
        $data["merk"] = $this->getCategory();
        $this->load->view('V_header',$data["merk"]);
        $this->load->view('V_payment');
        $this->load->view('footer');
	}

	public function logistic()
	{
        $this->load->helper('url');
        $data["merk"] = $this->getCategory();
        $this->load->view('V_header',$data["merk"]);
        $this->load->view('V_logistic');
        $this->load->view('footer');
	}

    public function getCategory(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }
}
