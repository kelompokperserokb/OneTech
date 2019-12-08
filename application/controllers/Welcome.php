<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
        $this->load->helper('url');
        $this->homepage();
	}

    public function homepage(){
		$data["product"] = $this->getProductByLimit(8);
		$data["cat"] = $this->getCategory();
        $data["sub"] = $this->getSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    public function getProductByLimit($limit){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getProductByLimit($limit);
        return $datas;
    }

    public function getCategory(){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getCategory();
        return $datas;
    }

    public function getSubCategory(){
		$this->load->model("M_ProductDB");
		$data['data'] = $this->M_ProductDB->getSubCategory();
		return $data;
	}

    public function register(){
        $this->load->helper('url');
        if (!isset($_SESSION["email"])) {
            $data["cat"] = $this->getCategory();
            $data["sub"] = $this->getSubCategory();
            $this->load->view('V_header',$data);
            $this->load->view('V_registerPage');
            $this->load->view('footer');
        } else {
            redirect(base_url());
        }
    }

    public function footer(){
        $this->load->view('footer');
    }

}
