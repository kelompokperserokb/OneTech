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
		$this->load->model("M_AccountDB");
		$this->load->model("M_OrderDB");

		$data["usercount"] =  $this->M_AccountDB->count();
		$data["ordercount"] = $this->M_OrderDB->ordercount();
		$data["incomecount"] = $this->M_OrderDB->incomecount();
		$data["productcount"] = $this->M_OrderDB->productcount();

        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_index', $data);
        }
	}

    public function adminLogistic(){
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_orderLogistic');
        }
    }

	public function adminWaitingUploadOrder(){
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_orderWaitingUpload');
		}
	}

	public function adminVerify(){
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_orderVerify');
		}
	}

    public function adminDeliveryInput(){
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_orderDeliveryInput');
        }
    }

    public function adminOrderSuccess(){
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_orderSuccess');
        }
    }

	public function adminGetOrderItems($param1){
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
		    $param['param1'] = $param1;
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_orderItemPurchased',$param);
		}
	}

    public function product()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_product');
        }
    }

	public function discountproduct()
	{
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_discount');
		}
	}

	public function typeproduct()
	{
		$this->load->helper('url');
		if (!isset($_SESSION["admin-authorize"])) {
			redirect(base_url()."admin/admin/admin/login");
		} else {
			$this->load->view('V_admin_header');
			$this->load->view('V_admin_typeProduct');
		}
	}

    public function merk()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_merk');
        }
    }

    public function category()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
			$this->load->view('V_admin_header');
            $this->load->view('V_admin_category');
        }
    }

    public function subcategory()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["admin-authorize"])) {
            redirect(base_url()."admin/admin/admin/login");
        } else {
        	$this->load->view('V_admin_header');
            $this->load->view('V_admin_subCategory');
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

    public function logoutAdmin()
    {
        $this->load->helper('url');
        unset($_SESSION["admin-authorize"]);
        redirect(base_url()."admin/admin/admin/login");
    }

	/*END OF ADMIN PRIVILEGE*/


    public function about(){
        $this->load->helper('url');
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('V_aboutUs');
        $this->load->view('V_footer');
    }

	public function howToOrder()
	{
        $this->load->helper('url');
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('V_howToOrder');
        $this->load->view('V_footer');
	}

	public function payment()
	{
        $this->load->helper('url');
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('V_payment');
        $this->load->view('V_footer');
	}

	public function logistic()
	{
        $this->load->helper('url');
		$data["cat"] = $this->getCategory();
		$data["suball"] = $this->getAllSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('V_logistic');
        $this->load->view('V_footer');
	}

    public function getCategory(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }

	public function getAllSubCategory()
	{
		$this->load->model("M_ProductDB");
		$datas['data'] = $this->M_ProductDB->getAllSubCategory();
		return $datas;
	}

	public function page404() {
    	$this->load->helper('url');
    	$this->load->view('V_404');
}
}
