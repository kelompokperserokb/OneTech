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

	/*ADMIN PRIVILEGE*/

	public function adminHome()
	{
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
            $this->load->view('V_admin_main');
        }
	}

    public function product()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
            $this->load->view('V_admin_addProduct');
        }
    }

	public function typeproduct()
	{
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
			$this->load->view('V_admin_addTypeProduct');
		}
	}

    public function merk()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
            $this->load->view('V_admin_addMerk');
        }
    }

    public function category()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
            $this->load->view('V_admin_addCategory');
        }
    }

    public function subcategory()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
            $this->load->view('V_admin_addSubCategory');
        }
    }

	public function loginAdmin()
	{
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            $this->load->view('V_admin_loginAdmin');
        } else {
            redirect(base_url()."admin/admin/admin/home");
        }
	}

	/*END OF ADMIN PRIVILEGE*/


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
