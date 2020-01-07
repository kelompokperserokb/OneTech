<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
        $this->load->helper('url');
        $this->homepage();
	}

    public function homepage(){
		$data["product"] = $this->getProductByLimit(0, 8);
		$data["cat"] = $this->getCategory();
        $data["suball"] = $this->getSubCategory();
        $this->load->view('V_header',$data);
        $this->load->view('index',$data);
        $this->load->view('V_footer');
    }

    public function getProductByLimit($start, $limit){
        $this->load->model("M_ProductDB");
        $datas['data'] = $this->M_ProductDB->getProductByLimit($start, $limit);
        return $datas;
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

    public function footer(){
        $this->load->view('V_footer');
    }

}
